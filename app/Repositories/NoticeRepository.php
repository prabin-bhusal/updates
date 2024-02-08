<?php

namespace App\Repositories;

use App\Models\Notice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NoticeRepository implements NoticeRepositoryInterface
{
    public function getAllNotices($title, $notice_date_greater_than, $notice_date_less_than)
    {
        return Notice::where('title', 'LIKE', '%' . $title . '%')
            ->whereDate('notice_date', '>=', $notice_date_greater_than)->whereDate('notice_date', '<=', $notice_date_less_than)->paginate(5);
    }

    public function storeNotice($title, $content, $cover_image, $download_file, $notice_date)
    {
        DB::transaction(function () use ($title, $content, $cover_image, $download_file, $notice_date) {
            $cover_image_path = $cover_image->store('public/notices_banners');
            $download_file_path = $download_file->store('public/notices_downloads');

            // trim the path
            $cover_image_path = Str::substr($cover_image_path, 23,);
            $download_file_path = Str::substr($download_file_path, 25,);

            Notice::create([
                'title' => $title,
                'content' => $content,
                'notice_file' => $download_file_path,
                'notice_banner' => $cover_image_path,
                'notice_date' => $notice_date,
                'admin_id' => Auth::guard('admin')->user()->id,
            ]);
        });
    }

    public function updateNotice($notice, $title, $content, $cover_image, $download_file, $notice_date)
    {
        DB::transaction(function () use ($notice, $title, $content, $cover_image, $download_file, $notice_date) {
            $params = [
                'title' => $title,
                'content' => $content,
                'notice_date' => $notice_date,
            ];

            if ($cover_image) {
                Storage::delete('public/notices_banners' . $notice->cover_image_upload);
                $cover_image_path = $cover_image->store('public/notices_banners');
                $cover_image_path = Str::substr($cover_image_path, 23,);

                $params['notice_banner'] = $cover_image_path;
            }
            if ($download_file) {
                Storage::delete('public/notices_downloads' . $notice->notice_file);
                $download_file_path = $download_file->store('public/notices_downloads');
                $download_file_path = Str::substr($download_file_path, 25,);

                $params['notice_file'] = $download_file_path;
            }

            $notice->update($params);
        });
    }

    public function destroyNotice($notice)
    {
        DB::transaction(function () use ($notice) {
            Storage::delete('public/notices_banners' . $notice->cover_image_upload);
            Storage::delete('public/notices_downloads' . $notice->cover_image_upload);

            Notice::destroy($notice->id);
        });
    }
}
