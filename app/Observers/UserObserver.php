<?php

namespace App\Observers;
use Illuminate\Support\Str;
use App\Models\User;

class UserObserver
{
    //
    public function creating(User $user): void
    {
        !$user->image ? $user->register_code = 'REG-' . date('YmdHis-') . $user->nim : '';
    }
}
