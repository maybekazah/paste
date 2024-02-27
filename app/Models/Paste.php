<?php

namespace App\Models;

use App\Enums\PastaStatusEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paste extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'status',
        'user_id',
        'short_link',
        'expired_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        if (auth()->check()) {
            self::addGlobalScope(function (Builder $builder) {
                $builder
                    ->where('expired_at', '>', now())
                    ->orWhere('expired_at', NULL, NULL);
            });
        } else {

            self::addGlobalScope(function (Builder $builder) {
                $builder
                    ->where('expired_at', '>', now())
                    ->whereNot('status', '=', PastaStatusEnum::PRIVATE->value)
                    ->orWhere('expired_at', NULL, NULL);
            });
        }


    }
}
