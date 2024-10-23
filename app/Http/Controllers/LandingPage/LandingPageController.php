<?php

namespace App\Http\Controllers\LandingPage;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class LandingPageController
{
    public function home()
    {
        $news = News::with('user')->latest()->where('status', 'publish')->paginate(3);
        $provinceWithCordinate = json_decode(file_get_contents(public_path('/json/provinces.json'))) ?? [];
        $user = User::with('addressNow')->where('status', 'verified')->get();

        $getProvinceIdByUser = $user->pluck('addressNow.province_id')->filter()->unique()->toArray();

        $filterProvinceById = array_filter($provinceWithCordinate, function ($province) use ($getProvinceIdByUser) {
            return in_array($province->id, $getProvinceIdByUser);
        });

        $sebaranAddTotalByProvince = collect($filterProvinceById)->map(function ($province) use ($user) {
            $toArrayProvince = (array) $province;
            return [...$toArrayProvince, 'total' => count($user->where('addressNow.province_id', $province->id))];
        })->toArray();

        // dd($sebaranAddTotalByProvince);
        return view('content.landing_page.home.index', ['news' => $news, 'sebaran' => $sebaranAddTotalByProvince]);
    }

    public function news()
    {
        return view('content.landing_page.news.index', ['news' => News::with('user')->latest()->where('status', 'publish')->paginate(3)]);
    }
}
