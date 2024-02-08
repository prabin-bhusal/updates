<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use App\Repositories\NewsRepositoryInterface;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $newsRepository;

    public function __construct(NewsRepositoryInterface $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function index(Request $request)
    {
        if (isset($request->search_news)) {

            $news = $this->newsRepository->search($request->search_news);
            return view('news.index', ['news' => $news]);
        }

        $news = $this->newsRepository->all();
        return view('news.index', ['news' => $news]);
    }


    public function create()
    {
        return view('news.create');
    }


    public function store(StoreNewsRequest $request)
    {
        $newsData = $this->newsRepository->create($request);

        return redirect()->route('news.index')->with('message', 'Successfully created');
    }

    public function show(News $news)
    {
        return view('news.show', ['news' => $news]);
    }


    public function edit(News $news)
    {
        return view('news.edit', ['news' => $news]);
    }

    public function update(UpdateNewsRequest $request, News $news)
    {
        $updatedData = $this->newsRepository->update($request, $news);

        return redirect()->route('news.index');
    }

    public function destroy(News $news)
    {
        $deletedData = $this->newsRepository->delete($news);

        return redirect()->route('news.index');
    }
}
