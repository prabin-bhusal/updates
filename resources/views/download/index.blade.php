@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="flex justify-between items-center bg-white my-3 p-5 mb-4">
        <h2
            class="text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-3xl dark:text-white">
            Download</h2>
        <a href="{{ route('download.create') }}" class="text-blue-600 hover:text-yellow-800 hover:cursor-pointer">Create New
            Download</a>
    </div>

    <div class="w-full">

        <table id="myTable"
            class="table table-bordered w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Link</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </div>
@endsection

{{-- 

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    S.N.
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Link
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>

            @forelse ($downloads as $download)
                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $loop->iteration }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $download->title }}
                    </td>

                    <td class="px-6 py-4">
                        <a href="{{ route('download.download', ['id' => $download->id]) }}">
                            {{ $download->download_file }}
                        </a>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('download.edit', $download->id) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('download.destroy', $download->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <input style="cursor: pointer" type="submit" value="Delete"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline" />
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    No content here
                </tr>
            @endforelse
        </tbody>
    </table>
</div> --}}
