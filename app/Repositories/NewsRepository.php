<?php

namespace App\Repositories;

use App\Models\News;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsRepository implements NewsRepositoryInterface
{
    public function all()
    {
        return News::paginate(5);
    }

    public function search($search_news)
    {
        return News::where('title', 'LIKE', '%' . $search_news . '%')->paginate(5);
    }

    public function create(Request $request)
    {
        if ($request->has('banner_image')) {
            $file = $request->file('banner_image');
            $name = $file->getClientOriginalName();
            $name = substr($name, 0, strpos($name, '.'));
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

        return News::create($data);
    }

    public function find($id)
    {
        return News::find($id);
    }

    public function delete($news)
    {
        try {
            Storage::delete("public/images/" . $news->banner_image);
            News::destroy($news->id);
            return "Success";
        } catch (Exception $E) {
            return "Failed";
        }
    }

    public function update($request, $news)
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
    }
}
