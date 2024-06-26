<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends BaseController
{
    /**
   * Register api
   *
   * @return \Illuminate\Http\Response
   */
  public function register(Request $request)
  {
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required',
        'c_password' => 'required|same:password',
    ]);
    if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());     
    }
    $input = $request->all();
    $input['password'] = bcrypt($input['password']);
    $user = User::create($input);
    $success['token'] =  $user->createToken('MyApp')->plainTextToken;
    $success['name'] =  $user->name;
    return $this->sendResponse($success, 'User register successfully.');
  }

  /**
   * Login api
   *
   * @return \Illuminate\Http\Response
   */
  public function login(Request $request)
  {
    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        $user = Auth::user();
        $user->tokens()->delete();
        $user->remember_token=null;
        $user->save();
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;
        return $this->sendResponse($success, 'User login successfully.');
    }
    else{
        return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
    }
  }


  /**
   * Logout api
   *
   * @return \Illuminate\Http\Response
   */
  public function logout(Request $request)
  {
  
    $user = User::find($request->id);
    $user->tokens()->where('id', $request->token)->delete();
    $success['id'] =  $request->id;
    return $this->sendResponse($success, 'User logout successfully. Token cleared.');
        
   
  }


}


