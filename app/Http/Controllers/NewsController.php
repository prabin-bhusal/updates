<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use App\Repositories\NewsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
        // only admin can access this else 402 response is returned
        Gate::authorize('admin_authenticated');
        return view('news.create');
    }


    public function store(StoreNewsRequest $request)
    {
        // only admin can access this else 402 response is returned
        Gate::authorize('admin_authenticated');
        $newsData = $this->newsRepository->create($request);

        return redirect()->route('admin.news.index')->with('message', 'Successfully created');
    }

    public function show(News $news)
    {
        return view('news.show', ['news' => $news]);
    }


    public function edit(News $news)
    {
        // only admin can access this else 402 response is returned
        Gate::authorize('admin_authenticated');
        return view('news.edit', ['news' => $news]);
    }

    public function update(UpdateNewsRequest $request, News $news)
    {
        // only admin can access this else 402 response is returned
        Gate::authorize('admin_authenticated');
        $updatedData = $this->newsRepository->update($request, $news);

        return redirect()->route('admin.news.index');
    }

    public function destroy(News $news)
    {
        // only admin can access this else 402 response is returned
        Gate::authorize('admin_authenticated');
        $deletedData = $this->newsRepository->delete($news);

        return redirect()->route('admin.news.index');
    }
}
