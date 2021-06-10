<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function login(Request $request)
    {
      $loginData = validator()->make($request->all(), [
        'email' => 'required',
        'password' => 'required'
      ]);

      if ($loginData->fails()) {
        return response(['status' => '440', 'message' => $loginData->errors()->first(), 'errors' => $loginData->errors()]);
      }
      $user = User::where('email', $request->email)->first();

      if ($user && $user->active !== 0) {

        if (Hash::check($request->password, $user->password)) {

            if (!$token = Auth::login($user)) {
                return response()->json(['status' => '421', 'message' => 'Unauthorised']);
            }

            return $this->respondWithToken($token);
        } else {
            return response(['status' => '440', 'message' => 'password is wrong']);
        }
      } else {
        return response()->json(['status' => '401', 'message' => 'Unauthorised']);
      }

    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }



}
