<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\Api\AuthRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function auth(AuthRequest $request)
    {
        $user = User::where("email", $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => 'The password credentials are incorrect',
            ]);
        }

        // remove tokens if single sign-on is required
        // $user->tokens()->delete();

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'token' => $token,
        ]);
    }
}
