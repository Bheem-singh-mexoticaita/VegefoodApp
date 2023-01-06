<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Admin\Client;

class AdminLoginControllerSetup extends Controller
{
    public function AdminLogin(){
        return view('admin.admin-login');
      }
      public function loginstore(Request $request){
        try{
            // return "adsssadsad";
            $validator = \Validator::make($request->all(), [
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:6',
            ]);
            if ($validator->fails())
            {
                if ($validator->fails()) { return \Response::json(['code' => 400,'success' => false, 'errors' => $validator->getMessageBag()->toArray()], 400); }
            }

            if(\Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $request->session()->put('token',\Auth::user()->createToken("authToken")->plainTextToken);


                return \Response::json(['code' => 200,'success' => true, 'errors' =>'Login Successfully','token'=>\Auth::user()->createToken("authToken")->plainTextToken], 200);
            }else{
                return \Response::json(['code' => 401,'success' => false, 'errors' => 'Incorrect Email And Password Details'], 401);
            }

        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function AdminDashboard(){
        $response = Http::get('http://127.0.0.1:8000/api/v1/fetchAdminDetails');
        $headers = [
            'Authorization' => 'Bearer 1|BwpPD5ycZJLRykqKGOYMdxNAAZdy9XboAB9fAoHj'
          ];
          $response->header($headers);

        $jsonData = $response->json();

        dd($jsonData);


        $data=session('token');
        dd($data);


        // return view('admin.index');

    }
}
