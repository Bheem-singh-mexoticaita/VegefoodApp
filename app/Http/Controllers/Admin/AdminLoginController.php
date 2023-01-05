<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class AdminLoginController extends Controller
{
    public function Adminlogin(){ return view('admin.admin-login'); }
    public function loginstore(Request $request){
        try{
        $validator = \Validator::make($request->all(), [ 'email' => 'required|email','password' => 'required|min:6',]);
        if ($validator->fails()) { return \Response::json(['code' => 400,'success' => false, 'errors' => $validator->getMessageBag()->toArray()], 400); }
    if (\Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // $request->session()->flash('message', 'New customer added successfully.');
        //  $request->session()->flash('message-type', 'success');
        return \Response::json(['code' => 200,'success' => true, 'errors' =>'Login Successfully','token'=>\Auth::user()->createToken("authToken")->plainTextToken], 200);
    } else {
        return \Response::json(['code' => 401,'success' => false, 'errors' =>'Please Check your email and password again'], 401);
  }
        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
}

function profiledata(){
return "sadsadsad";
}
}
