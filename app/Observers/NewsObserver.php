<?php

namespace App\Observers;

use App\Models\News;

class NewsObserver
{
    //
    public function creating (News $news) : void
    {
        $news->slug = str()->slug($news->title). Str::random(3);

    }
    public function updating (News $news) : void
    {
        $news->slug = str()->slug($news->title). Str::random(3);

    }
}
