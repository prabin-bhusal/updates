@extends('layouts.blog')

@section('content')
    <div class= "flex justify-end items-start tile col-span-1 md:col-span-3 lg:col-span-4 bottom-1 px-4">
        <div class="w-6/6 md:w-5/6 lg:w-4/6 flex justify-center flex-col">
            <div class="mb-5 container bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <form method="GET" action="{{ route('user-events') }}">
                            <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                                <div class="flex flex-col">
                                    <label for="title" class="text-stone-600 text-sm font-medium">Title</label>
                                    <input type="text" id="title" name="title"
                                        placeholder="New movie releasing on monday"
                                        class="mt-2 block w-full rounded-md border border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                                </div>

                                <div class="flex flex-col">
                                    <label for="from-date" class="text-stone-600 text-sm font-medium">From date</label>
                                    <input type="date" id="from-date" name="event_date[gt]"
                                        class="mt-2 block w-full rounded-md border border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                                </div>

                                <div class="flex flex-col">
                                    <label for="to-date" class="text-stone-600 text-sm font-medium">To date</label>
                                    <input type="date" id="to-date" name="event_date[lt]"
                                        class=" mt-2 block w-full rounded-md border border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                                </div>

                                <!-- <div class="flex flex-col">
                                                        <label for="status" class="text-stone-600 text-sm font-medium">Status</label>
                        
                                                        <select id="status" class="mt-2 block w-full rounded-md border border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                                            <option>Dispached Out</option>
                                                            <option>In Warehouse</option>
                                                            <option>Being Brought In</option>
                                                        </select>
                                                    </div> -->
                                <div class="mt-6 grid w-full grid-cols-2 justify-end space-x-4 md:flex">
                                    {{-- <button
                                        class="active:scale-95 rounded-lg bg-gray-200 px-8 py-2 font-medium text-gray-600 outline-none focus:ring hover:opacity-90">Reset</button> --}}
                                    <button
                                        class="active:scale-95 rounded-lg bg-blue-600 px-8 py-2 font-medium text-white outline-none focus:ring hover:opacity-90">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
