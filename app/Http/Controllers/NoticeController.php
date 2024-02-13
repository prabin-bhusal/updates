<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoticeRequest;
use App\Http\Requests\UpdateNoticeRequest;
use App\Models\Notice;
use App\Repositories\NoticeRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class NoticeController extends Controller
{
    private $noticeRepository;

    public function __construct(NoticeRepositoryInterface $noticeRepository)
    {
        $this->noticeRepository = $noticeRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = $request->query('title') ?? '';
        $notice_date_greater_than = $request->query('notice_date')['gt'] ?? '0000-01-01';
        $notice_date_less_than = $request->query('notice_date')['lt'] ?? '3000-01-01';

        $notices = $this->noticeRepository->getAllNotices($title, $notice_date_greater_than, $notice_date_less_than);

        return view('notices.index', ['notices' => $notices]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // only admin can access this else 402 response is returned
        Gate::authorize('admin_authenticated');
        return view('notices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoticeRequest $request)
    {
        // only admin can access this else 402 response is returned
        Gate::authorize('admin_authenticated');

        $title = $request->title;
        $content = $request->content;
        $cover_image = $request->file('cover_image_upload');
        $download_file = $request->file('file_upload');
        $notice_date = $request->notice_date;


        $this->noticeRepository->storeNotice($title, $content, $cover_image, $download_file, $notice_date);

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
        // only admin can access this else 402 response is returned
        Gate::authorize('admin_authenticated');

        return view('notices.edit', ['notice' => $notice]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoticeRequest $request, Notice $notice)
    {
        // only admin can access this else 402 response is returned
        Gate::authorize('admin_authenticated');

        $title = $request->title;
        $content = $request->content;
        $cover_image = $request->file('cover_image_upload') ?? null;
        $download_file = $request->file('file_upload') ?? null;
        $notice_date = $request->notice_date;

        $this->noticeRepository->updateNotice($notice, $title, $content, $cover_image, $download_file, $notice_date);

        return redirect(route('notices.show', ['notice' => $notice->id]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice)
    {
        // only admin can access this else 402 response is returned
        Gate::authorize('admin_authenticated');

        $this->noticeRepository->destroyNotice($notice);

        return redirect(route('notices.index'));
    }

    /**
     * Download the specified resource from storage.
     */
    public function download(Notice $notice)
    {
        return Storage::download('public/notices_downloads/' . $notice->notice_file);
    }
}
