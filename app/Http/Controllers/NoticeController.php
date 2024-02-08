<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoticeRequest;
use App\Http\Requests\UpdateNoticeRequest;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /**
         * TODOS:
         * 1. title check
         * 2. notice date greater than
         * 3. notice date less than
         */
        $title = '';
        $notice_date_greater_than = '0000-01-01';
        $notice_date_less_than = '3000-01-01';

        if ($request->query('title')) {
            $title = $request->query('title');
        }
        if ($request->query('notice_date')) {
            $notice_date_query = $request->query('notice_date');

            if (isset($notice_date_query['gt'])) {
                $notice_date_greater_than = $notice_date_query['gt'];
            }

            if (isset($notice_date_query['lt'])) {
                $notice_date_less_than = $notice_date_query['lt'];
            }
        }

        $notices = Notice::where('title', 'LIKE', '%' . $title . '%')
            ->whereDate('notice_date', '>=', $notice_date_greater_than)->whereDate('notice_date', '<=', $notice_date_less_than)->paginate(5);

        return view('notices.index', ['notices' => $notices]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoticeRequest $request)
    {
        DB::transaction(function () use ($request) {
            $cover_image_path = $request->file('cover_image_upload')->store('public/notices_banners');
            $download_file_path = $request->file('file_upload')->store('public/notices_downloads');

            // trim the path
            $cover_image_path = Str::substr($cover_image_path, 23,);
            $download_file_path = Str::substr($cover_image_path, 25,);

            Notice::create([
                'title' => $request->title,
                'content' => $request->content,
                'notice_file' => $download_file_path,
                'notice_banner' => $cover_image_path,
                'notice_date' => $request->notice_date,
                'user_id' => Auth::user()->id,
            ]);
        });

        return redirect(route('notices.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Notice $notice)
    {
        return view('notices.show', ['notice' => $notice]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notice $notice)
    {
        return view('notices.edit', ['notice' => $notice]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoticeRequest $request, Notice $notice)
    {
        DB::transaction(function () use ($request, $notice) {
            $params = [
                'title' => $request->title ?? $notice->title,
                'content' => $request->content ?? $notice->content,
                'notice_date' => $request->notice_date ?? $notice->notice_date,
            ];

            if ($request->hasFile('cover_image_upload')) {
                Storage::delete('public/notices_banners' . $notice->cover_image_upload);
                $cover_image_path = $request->file('cover_image_upload')->store('public/notices_banners');
                $cover_image_path = Str::substr($cover_image_path, 23,);

                $params['notice_banner'] = $cover_image_path;
            }
            if ($request->hasFile('file_upload')) {
                Storage::delete('public/notices_downloads' . $notice->cover_image_upload);
                $download_file_path = $request->file('file_upload')->store('public/notices_downloads');
                $download_file_path = Str::substr($cover_image_path, 25,);

                $params['notice_file'] = $download_file_path;
            }

            $notice->update($params);
        });

        return redirect(route('notices.show', ['notice' => $notice->id]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice)
    {
        DB::transaction(function () use ($notice) {
            Storage::delete('public/notices_banners' . $notice->cover_image_upload);
            Storage::delete('public/notices_downloads' . $notice->cover_image_upload);

            Notice::destroy($notice->id);
        });

        return redirect(route('notices.index'));
    }
}
