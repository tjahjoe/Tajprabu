<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest;
// use Tymon\JWTAuth\Facades\JWTAuth;
// use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function index(){
        if (Auth::check()) {
            return redirect();
        }
        return view();
    }

    public function login(AuthRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($credentials)) {
            return redirect();
        } else {
            return redirect();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect();
    }
    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (!$token = Auth::attempt($credentials)) {
    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }

    //     return response()->json([
    //         'access_token' => $token,
    //         'token_type' => 'bearer',
    //         'expires_in' => auth('api')->factory()->getTTL() * 60
    //     ]);
    // }

    // public function me()
    // {
    //     return response()->json(auth()->user());
    // }

    // public function logout()
    // {
    //     auth('api')->logout();

    //     return response()->json(['message' => 'Successfully logged out']);
    // }

    // public function image(Request $request)
    // {
    //     if ($request->hasFile('image')) {
    //         $file = $request->file('image');
    //         $path = Storage::disk('s3')->put('Chilz', $file);

    //         return response()->json(['path' => $path], 201);
    //     }

    //     return response()->json(['error' => 'No image uploaded'], 400);
    // }


}
