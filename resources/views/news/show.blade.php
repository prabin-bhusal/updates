@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="flex justify-between items-center bg-white my-3 p-5 mb-4">
        <h2
            class="text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-3xl dark:text-white">
            News</h2>
        <a href="{{ route('news.index') }}" class="text-blue-600 hover:text-yellow-800 hover:cursor-pointer">Back To News
            Dashboard</a>
    </div>
    <div class="relative overflow-x-auto">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg container py-4 px-4">
            <h2 class="py-3 text-4xl font-extrabold dark:text-white">{{ $news->title }}</h2>
            <div class="my-2">
                <img src="{{ asset('/storage/images/' . $news->banner_image) }}" />
            </div>
            <div class="py-3" id="newsContent">
                {!! $news->content !!}
            </div>
        </div>
    </div>
@endsection
