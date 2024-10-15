<?php

namespace App\Http\Controllers\LandingPage;

use Illuminate\Http\Request;
use App\Models\News;

class LandingPageController
{
    public function home(){
        return view('content.landing_page.home.index', ['news' => News::with('user')->latest()->where('status', 'publish')->paginate(3)]);
    }

    public function news(){
        return view('content.landing_page.news.index', ['news' => News::with('user')->latest()->where('status', 'publish')->paginate(3)]);
    }

}
