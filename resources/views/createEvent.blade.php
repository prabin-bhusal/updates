<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @stack('styles')
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('layouts.navigation')

    <!-- @section('content') -->
    <div class="py-12">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js" defer></script>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="post" action="{{ route('user-store-event') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Create a event</h2>
                                <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly
                                    so be careful what you share.</p>

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-4">
                                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                                        <div class="mt-2">
                                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="text" name="title" id="title" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Blood donation program">
                                            </div>
                                        </div>
                                        @error('title')
                                        <span class="mt-2 text-sm text-red-500">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="sm:col-span-4">
                                        <label for="venue" class="block text-sm font-medium leading-6 text-gray-900">Venue</label>
                                        <div class="mt-2">
                                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="text" name="venue" id="venue" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Barstow Heights, CA, United States">
                                            </div>
                                        </div>
                                        @error('venue')
                                        <span class="mt-2 text-sm text-red-500">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-span-full">
                                        <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Content</label>
                                        <div class="mt-2">
                                            <textarea id="content" name="content" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                        </div>
                                        <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about this
                                            event for context.</p>
                                        @error('content')
                                        <span class="mt-2 text-sm text-red-500">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                                    <div class="col-span-full flex flex-row gap-16">
                                        <div class="mt-2">
                                            <label for="datepicker" class="block text-sm font-medium leading-6 text-gray-900">Event start
                                                date</label>
                                            <input id="datepicker" name="start_date" class="border-2 border-gray-300 rounded px-3 py-2 w-56" type="text" placeholder="Select a date">
                                        </div>
                                        @error('start_date')
                                        <span class="mt-2 text-sm text-red-500">
                                            {{ $message }}
                                        </span>
                                        @enderror

                                        <div class="mt-2">
                                            <label for="datepicker" class="block text-sm font-medium leading-6 text-gray-900">Event end
                                                date</label>
                                            <input id="datepicker" name="end_date" class="border-2 border-gray-300 rounded px-3 py-2 w-56" type="text" placeholder="Select a date">
                                        </div>
                                        @error('end_date')
                                        <span class="mt-2 text-sm text-red-500">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            flatpickr("#datepicker", {});
        </script>
    </div>
    <!-- @endcontent -->