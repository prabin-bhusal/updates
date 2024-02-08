<?php

namespace App\Repositories;

interface NewsRepositoryInterface
{
    public function all();
    public function search($search_news);

    public function create($request);

    public function find($id);

    public function delete($news);

    public function update($request,  $news);
}
