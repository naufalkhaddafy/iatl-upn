<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\User;

class AlumniExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        //
        return view('exports.alumni-export', [
            'allAlumni' => User::role('user')->where('status','verified')->latest()->get(),
        ]);
    }
}
