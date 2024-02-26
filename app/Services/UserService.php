<?php

namespace App\Services;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\Abstract\IUserService;

class UserService implements IUserService
{
    public function loginProcess(AuthRequest $request)
    {
        if (auth()->attempt($request->validated())) {
            session()->flash('message', 'Вы успешно вошли в аккаунт');
        }
        session()->flash('message', 'Ошибка входа');
    }

    public function registerProcess($request)
    {
        $user = User::query()->create($request->validated());
        if ($user) {
            auth()->login($user);
            session()->flash('message', 'Вы успешно зарегистрировались');
        }

    }

    public function logout()
    {
        auth()->logout();
        session()->flash('message', 'вы вышли из аккаунта');
    }
}
