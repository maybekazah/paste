<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\Abstract\IUserService;
use App\Traits\PasteTrait;

class UserController extends Controller
{

    public function __construct(
        protected IUserService $userService
    )
    {
    }

    public function loginForm()
    {

        $pastes = $this->userService->getPastes();
        return view('users.login', compact('pastes'));
    }

    public function loginProcess(AuthRequest $request)
    {
        $this->userService->loginProcess($request);
        return redirect()->route('pastes.index');
    }

    public function registerForm()
    {
        $pastes = $this->userService->getPastes();

        return view('users.register', compact('pastes'));
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
