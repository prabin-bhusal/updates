@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="container m-auto gap-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        <div>

            <a href="#"
                class="block max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">News</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Create, Read, Update and Delete Your
                    News Article</p>
            </a>
        </div>
        <div>
            <a href="#"
                class="block max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Events</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Create, Read, Update and Delete Your
                    Events</p>
            </a>
        </div>
        <div>
            <a href="#"
                class="block max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Notices
                </h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Create, Read, Update and Delete Your
                    Notices</p>
            </a>
        </div>
        <div>
            <a href="#"
                class="block max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Downloads
                </h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Create, Read, Update and Delete
                    Your
                    Downloads</p>
            </a>
        </div>

    </div>
@endsection
