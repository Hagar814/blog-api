<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ApiResponse; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'=>['required','email','max:255'],
            'password'=>['required',],
            
            
        ]);
        if ($validator->fails())
        {
            return ApiResponse::sendResponse(422,'Login Validation Errors', $validator->errors());
        }
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $currentUser = Auth::guard('user')->user();
            $token = $currentUser->createToken('user')->plainTextToken;
            return ApiResponse::sendResponse(200, 'User Logged In Successfully', ['token' => $token]);
        
        } else {
            // Return invalid credentials message
            return ApiResponse::sendResponse(401, 'Invalid credentials', null);
        }
    }
    /**
     * Logout
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        
        return ApiResponse::sendResponse(200,'User Logged Out Successfully', []);
    
       
}
}
