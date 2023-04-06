<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Hash;
use Auth;
use Validator;

class AuthController extends Controller
{
    public function register(){
        return view('front.auth.register');
    }

    // user rigester 
    public function storeuser(Request $request)
    {
        // validation 
        try{

            $validator = Validator::make($request->all(),[
                'user_name'=> 'required',
                'user_email'=> 'required|email',
                'password'=> 'required|min:8',
                'confirmPassword' => 'required_with:password|same:password|min:8'
            ]);
    
            if($validator->fails()){
                return response()->json(['ResponseCode'=>0,'ResponseText'=>'Validation fail','ResponseData'=>[
                    'errors' => $validator->errors()->all()
                ]],422);
            }

            $user = new User;
            $user->fullName = $request->user_name;
            $user->email = $request->user_email;
            $user->password = Hash::make($request->password);
            $user->status = 1;
            $user->assignRole(Role::where('name','user')->first());
            
            if($user->save()){
                // Auth::login($user);
                return response()->json(['ResponseCode'=>1,'ResponseText'=>'User register succefully.'], 200);
            }else{
                return response()->json(['ResponseCode'=>0,'ResponseText'=>'Something went wrong.'], 500);
            }
        }catch (JWTException $e) {
            return response()->json(['ResponseCode'=>0,'ResponseText'=>'Something went wrong.'], 500);
        }
    }

    // login form view 
    public function login(){
        return view('front.auth.login');
    }

    // user login 
    public function userlogin(Request $request)
    {
        try{
            $validator = Validator::make($request->all(),[
                'user_email'=>'required',
                'password'=>'required',
            ]);
    
            if($validator->fails()){
                return response()->json(['ResponseCode'=>0,'ResponseText'=>'Validation fail','ResponseData'=>[
                    'errors' => $validator->errors()->all()
                ]],422);
            }

            if(Auth::attempt(['email' => $request->user_email, 'password' => $request->password])){
                return response()->json(['ResponseCode'=>1,'ResponseText'=>'User login succefully.'], 200);
                
            }else{
                return response()->json(['ResponseCode'=>0,'ResponseText'=>'Email Or Password Not Match.'], 200);
            }

        }catch (JWTException $e) {
            return response()->json(['ResponseCode'=>0,'ResponseText'=>'Something went wrong.'], 500);
        }
    }

    // logout user 
    public function logout() {
		Auth::logout();
		return redirect('/login');
	}
}
