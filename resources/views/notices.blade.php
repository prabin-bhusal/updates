@extends('layouts.blog')

@section('content')
    <div class= "flex justify-end items-start tile col-span-1 md:col-span-3 lg:col-span-4 bottom-1 px-4">
        <div class="w-5/6 md:w-5/6 lg:w-4/6 flex justify-center flex-col">
            <div class=" p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel"
                aria-labelledby="settings-tab">
                @forelse ($notices as $notice)
                    <div class="card my-2">
                        <div
                            class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                            <h5 class="mb-2 text-xl font-medium tracking-tight text-gray-700 dark:text-white">
                                {{ $notice->title }}</h5>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                {{ Str::limit(strip_tags($notice->content), 200, '...') }}</p>

                            <div class="flex justify-between items-center mt-3">
                                <p class="text-blue-500">Issued Date: {{ $notice->notice_date }}</p>
                                <a href="{{ route('download-notice', [$notice->id]) }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Download</a>
                            </div>

                        </div>
                    </div>
                @empty
                    <p class="text-sm text-gray-500 dark:text-gray-400">No content here.</p>
                @endforelse
            </div>
            @if ($notices->hasPages())
                <div class="bg-white px-2 py-2">
                    <tr>
                        {{ $notices->links() }}
                    </tr>
                </div>
            @endif
        </div>
    </div>
@endsection
