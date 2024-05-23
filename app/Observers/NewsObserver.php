<?php

namespace App\Observers;

use App\Models\News;

class NewsObserver
{
    //
    public function creating (News $news) : void
    {
        $news->slug = str()->slug($news->title);

    }
}
