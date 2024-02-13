@extends('layouts.blog')

@section('content')
    <div class= "flex justify-end items-start tile col-span-1 md:col-span-3 lg:col-span-4 bottom-1 px-4">
        <div class="w-6/6 md:w-5/6 lg:w-4/6 flex justify-center flex-col">

            <div class="mb-5 container bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="news-container">

                    <div class="px-3 mb-5">
                        @if (Carbon\Carbon::now() > $event->start_date && Carbon\Carbon::now() > $event->end_date)
                            <p class="text-white font-bold bg-red-500 py-2 px-2 my-4 me-4">Event Closed</p>
                        @elseif(Carbon\Carbon::now() > $event->start_date)
                            <p class="text-gray-800 font-bold bg-green-500 py-2 px-2 my-4 me-4">Event is running</p>
                        @else
                            <p class="text-white font-bold bg-blue-500 py-2 px-2 my-4 me-4">Event has not started yet</p>
                        @endif
                        <h2
                            class="my-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">
                            {{ $event->title }}
                        </h2>
                        <p>{{ $event->venue }}</p>
                        <p>{{ $event->start_date }}</p>
                        <p>{{ $event->end_date }}</p>
                        {{-- <img src="{{ asset('/storage/images/' . $event->banner_image) }}" class="mt-3 p-2" /> --}}
                        <p>{!! nl2br($event->content) !!}</p>
                    </div>
                </div>

            </div>


        </div>
    </div>
@endsection
