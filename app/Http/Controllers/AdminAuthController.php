<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        if (!Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => 'Invalid email or password!'
            ]);
        };

        return redirect('/admin/notices');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/');
    }
}
