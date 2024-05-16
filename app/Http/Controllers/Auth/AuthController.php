<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class AuthController extends Controller
{
    protected $model;

    public function __construct() {
        $this->model = new User();
    }

    public function index(Request $request)
    {
        $request->validate([
            'userEmail' => 'required|email',
            'userPassword' => 'required',
        ]);

        $user = $this->model::where('userEmail', $request->userEmail)->first();

        if (! $user || ! Hash::check($request->userPassword, $user->userPassword)) {
            throw ValidationException::withMessages([
                'userEmail' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken($user->userName)->plainTextToken;
    }

    public function logout(Request $request)
    {
        // Attempt to delete the current access token
        $result = $request->user()->currentAccessToken()->delete();

        // Check the result and provide a message
        if ($result) {
            return response()->json(['message' => 'ok'], 200);
        } else {
            return response()->json(['message' => 'gagal'], 500);
        }
    }

    public function profile()
    {
        return response()->json(Auth::user());
    }
}
