<?php

namespace App\Models;

use App\Enums\NewsStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use App\Observers\NewsObserver;

#[ObservedBy(NewsObserver::class)]

class News extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status' => NewsStatusEnum::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
