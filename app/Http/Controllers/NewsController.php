<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\NewsRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Enums\NewsStatusEnum;
use Illuminate\Support\Facades\Storage;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $paginate = $request->query('paginate') ?? 5;
        $status = $request->query('status');

        if($status){
            $newss = News::query()->with('user')
            ->whereAny(['title', 'slug', 'status', 'description', 'created_at', 'updated_at'], 'like', '%' . $request->search . '%')
            ->where('status',$status)
            ->latest()
            ->paginate($paginate)->withQueryString();
        }else{
            $newss = News::query()->with('user')
            ->whereAny(['title', 'slug', 'status', 'description', 'created_at', 'updated_at'], 'like', '%' . $request->search . '%')
            ->latest()
            ->paginate($paginate)->withQueryString();
        }

        $title = 'Hapus Berita!';
        $text = "Apakah anda yakin menghapus data berita?";
        confirmDelete($title, $text);

        return view('content.admin.news.index', ['newss' => $newss, 'search' => $request->search]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('content.admin.news.form', [
            'news' => new News(),
            'page_meta' => [
                'title' => 'Tambah News/Artikel',
                'description' => 'Tambahkan Data News/Artikel',
                'method' => 'post',
                'url' => route('news.store'),
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request)
    {
        $file = $request->file('image');
        $request
            ->user()
            ->news()
            ->create([...$request->validated(), 'image' => $file?->store('images/news')]);

        Alert::toast('Berhasil menambahkan berita', 'success');
        return to_route('news.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('content.admin.news.form', [
            'news' => $news,
            'page_meta' => [
                'title' => 'Update News/Artikel',
                'description' => 'Mengubah Data News/Artikel ' .$news->title,
                'method' => 'put',
                'url' => route('news.update', $news->id),
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsRequest $request, News $news)
    {
        $file = $request->file('image');

        if($file){
            if (Storage::exists($news->image)) {
                Storage::delete($news->image);
            }
            $news->update([$request->validated(),'image'=> $file?->store('images/news')]);
        }else{
            $news->update($request->validated());
        }

        Alert::toast('Berhasil merubah berita', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        if (Storage::exists(!$news->image))
        {
            Storage::delete($news->image);
        }
        $news->delete();
        Alert::toast('Berhasil menghapus data '. $news->title , 'success');
        return to_route('news.index');
    }
}
