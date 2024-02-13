@extends('layouts.blog')

@section('content')
    <div class= "flex justify-end items-start tile col-span-1 md:col-span-3 lg:col-span-4 bottom-1 px-4">
        <div class="w-6/6 md:w-5/6 lg:w-4/6 flex justify-center flex-col">

            <div class="mb-5 container bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="news-container">

                    <div class="px-3 mb-5">
                        <h2
                            class="my-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">
                            {{ $blog->title }}
                        </h2>
                        <img src="{{ asset('/storage/images/' . $blog->banner_image) }}" class="mt-3 p-2" />
                        <p>{!! nl2br($blog->content) !!}</p>
                    </div>
                </div>

            </div>


        </div>
    </div>
@endsection
