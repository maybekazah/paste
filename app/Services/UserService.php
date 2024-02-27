<?php

namespace App\Services;

use App\Enums\PastaStatusEnum;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Paste;
use App\Models\User;
use App\Services\Abstract\IUserService;
use App\Traits\PasteTrait;

class UserService implements IUserService
{
    use PasteTrait;
//    public function getPastes()
//    {
//        return Paste::query()
//            ->where('status', '=', PastaStatusEnum::PUBLIC->value)
//            ->orderBy('created_at', 'DESC')
//            ->paginate(10);
//
//    }
    public function loginProcess(AuthRequest $request)
    {
        if (auth()->attempt($request->validated())) {
            session()->flash('message', 'Вы успешно вошли в аккаунт');
        }

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
