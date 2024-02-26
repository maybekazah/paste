<?php

namespace App\Http\Controllers\Paste;

use App\Enums\PastaStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasteStoreRequest;
use App\Models\Paste;
use App\Services\Abstract\IPasteService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Mockery\Exception;

class PasteController extends Controller
{
    public function __construct(
        protected IPasteService $pasteService,
    )
    {
    }

    public function index()
    {
        $pastes = $this->pasteService->getPastes();

        $authShowPastes = $this->pasteService->getAuthShowPastes();

        return view('home', compact('pastes', 'authShowPastes'));
    }

    public function MyPastes()
    {
        $authShowPastes = $this->pasteService->getMyPastes();

        return view('pastes.index', compact('authShowPastes'));
    }

    public function show($link)
    {
        $pastaShow = $this->pasteService->show($link);

        return view('pastes.show', compact('pastaShow'));
    }

    public function create()
    {
        return view('home');
    }

    public function store(PasteStoreRequest $request)

    {
        $this->pasteService->store($request);

        return redirect()->route('pastes.index');
    }
}
