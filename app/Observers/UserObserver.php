<?php

namespace App\Observers;
use Illuminate\Support\Str;
class UserObserver
{
    //
    public function creating(User $user): void
    {
        $user->register_code = 'REG-' . date('YmdHis') . Str::random(3);
    }
}
