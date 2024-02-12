@extends('layouts.blog')

@section('content')
    <div class= "flex justify-end items-start tile col-span-1 md:col-span-3 lg:col-span-4 bottom-1 px-4">
        <div class="w-5/6 md:w-5/6 lg:w-4/6 flex justify-center flex-col">
            <div class="mb-5 container bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="news-container">
                    {{-- <img src=" {{ asset('/storage/images/' . $blog->banner_image) }} " style="" /> --}}
                    <div class="px-3 py-5 mb-5">
                        <ol class="relative border-s border-gray-200 dark:border-gray-700">
                            @foreach ($events as $event)
                                <li class="mb-10 ms-4">
                                    <div
                                        class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                                    </div>
                                    <time
                                        class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $event->start_date }}</time>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $event->title }}</h3>
                                    @if (Carbon\Carbon::now() > $event->start_date && Carbon\Carbon::now() > $event->end_date)
                                        <p class="text-red-500 font-bold">Event Closed</p>
                                    @elseif(Carbon\Carbon::now() > $event->start_date)
                                        <p class="text-green-500 font-bold">Event is running</p>
                                    @else
                                        <p class="text-blue-500 font-bold">Event has not started yet</p>
                                    @endif
                                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
                                        {{ Str::limit(strip_tags($event->content), 150) }}</p>
                                    <a href="{{ route('user-event', [$event->id]) }}"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">Learn
                                        more <svg class="w-3 h-3 ms-2 rtl:rotate-180" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg></a>
                                </li>
                            @endforeach
                        </ol>


                    </div>
                </div>
            </div>
            @if ($events->hasPages())
                <div class="bg-white px-2 py-2">
                    <tr>
                        {{ $events->links() }}
                    </tr>
                </div>
            @endif
        </div>
    </div>
@endsection
