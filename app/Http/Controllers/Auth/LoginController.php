<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $auth = Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);

        if ($auth)
        {
            return redirect()->home()->with('success', __('auth.login_success'));
        }
        else {
            return redirect()->back()->with('danger', __('auth.failed'));
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('home')
            ->with('success', __('auth.logout_success'));
    }
}
