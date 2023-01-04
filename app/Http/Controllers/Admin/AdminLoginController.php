<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{

    public function Adminlogin(){ return view('admin.admin-login'); }

    public function loginstore(Request $request){
        $validator = \Validator::make($request->all(), [ 'email' => 'required|email','password' => 'required|min:6',]);
        if ($validator->fails()) {
            return response()->json(['status'=>false,'error'=>$validator->errors()->all()]);
          } else {
            if (\Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return response()->json(['status'=>true,'error'=>$validator->errors()->all()]);
            } else {
                return response()->json(['status'=>false,'error'=>['Sorry User not found.']]);            }

          }
         return response()->json($req);


    }


}
