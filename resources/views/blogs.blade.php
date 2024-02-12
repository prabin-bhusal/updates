@extends('layouts.blog')

@section('content')
    <div class= "flex justify-end items-start tile col-span-1 md:col-span-3 lg:col-span-4 bottom-1 px-4">
        <div class="w-5/6 md:w-5/6 lg:w-4/6 flex justify-center flex-col">
            @foreach ($blogs as $blog)
                <div class="mb-5 container bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="news-container">
                        <img src=" {{ asset('/storage/images/' . $blog->banner_image) }} " style="" />
                        <div class="px-3 mb-5">
                            <h2
                                class="my-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">
                                <a href="{{ route('blog', [$blog->id]) }}"> {{ $blog->title }}</a>
                            </h2>
                            <p>{{ Str::limit(strip_tags($blog->content), 150) }}</p>

                            <a class="text-blue-600">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
            @if ($blogs->hasPages())
                <div class="bg-white px-2 py-2">
                    <tr>
                        {{ $blogs->links() }}
                    </tr>
                </div>
            @endif
        </div>
    </div>
@endsection
