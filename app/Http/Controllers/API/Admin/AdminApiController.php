<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class AdminApiController extends Controller
{
   function loginWithAPI(Request $request){
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
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (\Hash::check($request->password, $user->password)) {
                return \Response::json(['code' => 200,'success' => true, 'errors' =>'Login Successfully','token'=>$user->createToken("authToken")->plainTextToken], 200);
            } else {
                return \Response::json(['code' => 402,'success' => false, 'errors' => 'Incorrect Password'], 402);
            }

            // $mailData = [
            //     'title' => 'Mail from ItSolutionStuff.com',
            //     'body' => 'This is for testing email using smtp.'
            // ];

            // Mail::to('your_email@gmail.com')->send(new AdminMails($mailData));

            // dd("Email is sent successfully.");


        }else{
            return response(['code'=>422,'success' => false,'errors'=>'unauthorized user login'], 422);
        }

    }catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage()
        ], 500);
    }
   }
}
