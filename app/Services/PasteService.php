<?php

namespace App\Services;

use App\Enums\PastaStatusEnum;
use App\Http\Requests\PasteStoreRequest;
use App\Models\Paste;
use App\Services\Abstract\IPasteService;

class PasteService implements IPasteService
{
    public function getPastes()
    {
        return Paste::query()
            ->where('status', '=', PastaStatusEnum::PUBLIC->value)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

    }

    public function getAuthShowPastes()
    {
        return Paste::query()
            ->where('user_id', '=', auth()->id())
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

    }

    public function getMyPastes()
    {
        return Paste::query()
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
    }

    public function show($link)
    {
        $pastaShow = Paste::all()->where('short_link', $link)->first();
        if (empty($pastaShow)) {
            abort(404);
        }
        return $pastaShow;
    }


    public function store($request)
    {
        Paste::query()->create($request->validated());
        session()->flash('message', 'паста создана');
    }
}
