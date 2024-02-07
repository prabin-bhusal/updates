<?php

namespace App\Http\Controllers;

use App\DataTables\NewsDataTable;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        if (isset($request->search_news)) {

            $news = News::where('title', 'LIKE', '%' . $request->search_news . '%')->paginate(1);
            return view('news.index', ['news' => $news]);
        }

        $news = News::paginate(1);
        return view('news.index', ['news' => $news]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {


        if ($request->has('banner_image')) {
            $file = $request->file('banner_image');
            $name = $file->getClientOriginalName();
            $name = substr($name, 0, strpos($name, '.'));
            // dd($name);
            $extension = $file->getClientOriginalExtension();
            $filename = $name . time() . '.' . $extension;
            $path = public_path("storage/") . "images/";
            $file->move($path, $filename);
        }


        $data = [
            "title" => $request->title,
            "content" => $request->content,
            "banner_image" => $filename,
            'user_id' => Auth::user()->id,
        ];
        // dd($data);

        $newsData = News::create($data);

        return redirect()->route('news.index')->with('message', 'Successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //

        return view('news.show', ['news' => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
        return view('news.edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $name = $file->getClientOriginalName();
            $name = substr($name, 0, strpos($name, '.'));
            $extension = $file->getClientOriginalExtension();
            $filename = $name . time() . '.' . $extension;
            $path = public_path("storage/") . "images/";
            $file->move($path, $filename);
            Storage::delete("public/images/" . $news->banner_image);
            $news->update([
                'title' => $request->title,
                'content' => $request->content,
                'banner_image' => $filename,
            ]);
        } else {
            $news->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);
        }

        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
        Storage::delete("public/images/" . $news->banner_image);
        News::destroy($news->id);

        return redirect()->route('news.index');
    }
}
