<?php

namespace App\Traits;

use App\Enums\PastaStatusEnum;
use App\Models\Paste;

trait PasteTrait
{

    public function getPastes()
    {
        return Paste::query()
            ->where('status', '=', PastaStatusEnum::PUBLIC->value)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

    }
}
