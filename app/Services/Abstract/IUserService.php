<?php

namespace App\Services\Abstract;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;

interface IUserService
{
    public function loginProcess(AuthRequest $request);

    public function registerProcess(RegisterRequest $request);

    public function logout();
}
