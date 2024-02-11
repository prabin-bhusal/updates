<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface NewsRepositoryInterface
{
    public function all();
    public function search($search_news);

    public function create(Request $request);

    public function find($id);

    public function delete($news);

    public function update($request,  $news);
}
