<?php

namespace App\Http\Controllers\Paste;

use App\Enums\PastaStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasteStoreRequest;
use App\Models\Paste;
use App\Services\Abstract\IPasteService;
use App\Traits\PasteTrait;
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

    public function getAuthShowPastes()
    {
        $pastes = $this->pasteService->getPastes();

        $authShowPastes = $this->pasteService->getAuthShowPastes();

        return view('pastes.index', compact('authShowPastes', 'pastes'));
    }

    public function show($link)
    {
        $pastes = $this->pasteService->getPastes();
        $authShowPastes = $this->pasteService->getAuthShowPastes();
        $pastaShow = $this->pasteService->show($link);

        return view('pastes.show', compact('pastaShow', 'pastes', 'authShowPastes'));
    }

    public function create()
    {
        $pastes = $this->pasteService->getPastes();

        return view('home', compact('pastes'));
    }

    public function store(PasteStoreRequest $request)

    {
        $this->pasteService->store($request);

        return redirect()->route('pastes.index');
    }
}
