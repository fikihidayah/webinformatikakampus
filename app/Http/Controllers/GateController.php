<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class GateController extends Controller
{
    public function login()
    {
        return view('gate.login', ['title' => 'Login']);
    }

    public function authenticate(Request $request)
    {
        $validate = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($validate, $request->remember)) {
            $request->session()->regenerate();
            $request->session()->flash('success', 'Berhasil Login');
            return redirect()->intended('/dashboard');
        }

        return back()->with('error', 'Email atau Password Salah');
    }

    public function logout(Request $request)
    {
        $id = Auth::id();

        $user = User::find($id);
        $remember_token = $user->remember_token;

        Auth::logout();

        if (isset($remember_token)) {
            $user->remember_token = NULL;
            $user->save();
        }

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/gate/auth');
    }
}
