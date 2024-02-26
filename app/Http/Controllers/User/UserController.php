<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\Abstract\IUserService;

class UserController extends Controller
{
    public function __construct(
        protected IUserService $userService,
    )
    {
    }

    public function loginForm()
    {
        return view('users.login');
    }

    public function loginProcess(AuthRequest $request)
    {
        $this->userService->loginProcess($request);
        return redirect()->route('pastes.index');
    }

    public function registerForm()
    {
        return view('users.register');
    }

    public function registerProcess(RegisterRequest $request)
    {
        $this->userService->registerProcess($request);
        return redirect()->route('pastes.index');

    }

    public function logout()
    {
        $this->userService->logout();
        return redirect()->route('pastes.index');

    }
}
