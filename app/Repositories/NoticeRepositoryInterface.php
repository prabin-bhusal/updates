<?php

namespace App\Repositories;

interface NoticeRepositoryInterface
{
    public function getAllNotices($title, $notice_date_greater_than, $notice_date_less_than);

    public function storeNotice($title, $content, $cover_image, $download_file, $notice_date);

    public function updateNotice($notice, $title, $content, $cover_image, $download_file, $notice_date);

    public function destroyNotice($notice);
}
