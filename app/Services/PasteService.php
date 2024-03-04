<?php

namespace App\Services;

use App\Enums\PastaStatusEnum;
use App\Http\Requests\PasteStoreRequest;
use App\Models\Paste;
use App\Services\Abstract\IPasteService;
use App\Traits\PasteTrait;

class PasteService implements IPasteService
{
use PasteTrait;

    public function getAuthShowPastes()
    {
        return Paste::query()
            ->where('user_id', '=', auth()->id())
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

    }

    public function show($link)
    {

        $pastaShow = Paste::all()->where('short_link', $link)->first();
        if (empty($pastaShow)) {
            abort(404);
        }

        elseif ($pastaShow->status == PastaStatusEnum::PRIVATE->value && $pastaShow->user_id != auth()->id()) {
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
