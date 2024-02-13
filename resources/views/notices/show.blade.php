@extends('layouts.dashboard')

@section('dashboard-content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between items-center bg-white my-3 p-5 mb-4">
            <h2 class="text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-3xl dark:text-white">
                Notices</h2>
            <a href="{{ route('admin.notices.index') }}" class="text-blue-600 hover:text-yellow-800 hover:cursor-pointer">Back</a>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-evenly">
            <div class="p-6 text-gray-900">
                <h1 class="pb-4 mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl border-b-2 border-gray-100">
                    {{ $notice->title }}
                </h1>
                <img src="{{ asset('storage' . '/notices_banners/' . $notice->notice_banner) }}" class="h-96" alt="banner" />
                <p class="mb-6 text-lg font-normal text-gray-500 max-w-4xl">
                    {{ $notice->content }}
                </p>
            </div>
            <div class="p-6 text-gray-900 basis-1/4">
                <h2 class="text-4xl font-extrabold pb-4 mb-4 border-b-2 border-gray-100">Notice details</h2>
                <p class="mb-6 text-lg font-normal text-gray-500">
                    <span class="font-semibold">Posted on:</span> {{ $notice->notice_date }}
                    <br />
                    <span class="font-semibold">Posted by:</span> {{ $notice->admin->name }}
                </p>
            </div>
        </div>
    </div>
</div>
@endcontent