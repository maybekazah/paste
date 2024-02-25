<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function loginForm()
    {
        return view('users.login');
    }

    public function loginProcess(AuthRequest $request)
    {
        if (auth()->attempt($request->validated())) {
            session()->flash('success', 'Вы успешно вошли в аккаунт');
            return redirect()->route('pastes.index');
        }
        session()->flash('error', 'Ошибка входа');
        return redirect()->back();
    }

    public function registerForm()
    {
        return view('users.register');
    }

    public function registerProcess(RegisterRequest $request)
    {
        $user = User::query()->create($request->validated());
        if ($user) {
            auth()->login($user);
            session()->flash('success', 'Вы успешно зарегистрировались');
            return redirect()->route('pastes.index');
        }
        session()->flash('error', 'Ошибка регистрации');
        return redirect()->back();
    }

    public function logout()
    {
        auth()->logout();
        session()->flash('success', 'вы вышли из аккаунта');
        return redirect()->route('pastes.index');
    }
}
