<?php

namespace App\Models;

use App\Enums\NewsStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
