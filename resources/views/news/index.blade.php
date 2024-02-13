@extends('layouts.dashboard')

@section('dashboard-content')
<div class="flex justify-between items-center bg-white my-3 p-5 mb-4">
    <h2 class="text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-3xl dark:text-white">
        News</h2>
    <a href="{{ route('admin.news.create') }}" class="text-blue-600 hover:text-yellow-800 hover:cursor-pointer">Create New
        Article</a>
</div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="bg-white p-2">
        <div>
            <form class="flex items-center" method="get" action="{{ route('admin.news.index') }}">
                @csrf
                @method('get')
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                        </svg>
                    </div>
                    <input type="text" id="simple-search" name="search_news" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search..." required>
                </div>
                <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    S.N.
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Content
                </th>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>

            @forelse ($news as $newsArticle)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4">
                <a href="{{ route('admin.news.show', $newsArticle->id) }}">{{ $newsArticle->title }}</a>
                </td>
                <td class="px-6 py-4">
                    {!! substr($newsArticle->content, 0, 50) . '...' !!}
                </td>
                <td class="px-6 py-4">
                    <img src="{{ asset('/storage/images/' . $newsArticle->banner_image) }}" alt="images" style="height:50px;" />
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.news.edit', $newsArticle->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <form action="{{ route('admin.news.destroy', $newsArticle->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input style="cursor: pointer" type="submit" value="Delete" class="font-medium text-red-600 dark:text-red-500 hover:underline" />
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                No content here
            </tr>
            @endforelse
        </tbody>

    </table>
    <div class="bg-white px-2">
        <tr>
            {{ $news->links() }}
        </tr>
    </div>
</div>
@endsection