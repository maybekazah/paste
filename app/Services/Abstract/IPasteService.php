<?php

namespace App\Services\Abstract;

use App\Http\Requests\PasteStoreRequest;
use Carbon\Laravel\ServiceProvider;

interface IPasteService
{
    public function getPastes();

    public function getAuthShowPastes();

    public function getMyPastes();

    public function show($link);

    public function store($request);

}
