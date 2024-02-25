<?php

namespace App\Http\Controllers\Paste;

use App\Enums\PastaStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasteStoreRequest;
use App\Models\Paste;

class PasteController extends Controller
{
    public function index()
    {
        $pastes = Paste::query()
            ->where('status', '=', PastaStatusEnum::PUBLIC->value)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $authShowPastes = Paste::query()
            ->where('user_id', '=', auth()->id())
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('home', compact('pastes', 'authShowPastes'));
    }

    public function myPastes()
    {
        $authShowPastes = Paste::query()
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('users.pastes', compact('authShowPastes'));
    }

    public function show()
    {

    }

    public function create()
    {
        return view('home');
    }


    public function store(PasteStoreRequest $request)

    {

        Paste::query()->create($request->validated());

        session()->flash('success', 'паста создана');



        return redirect()->route('pastes.index');

    }
}
