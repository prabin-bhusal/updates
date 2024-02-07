@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="flex justify-between items-center bg-white my-3 p-5 mb-4">
        <h2
            class="text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-3xl dark:text-white">
            Resource File</h2>
        <a href="{{ route('download.index') }}" class="text-blue-600 hover:text-yellow-800 hover:cursor-pointer">Back</a>
    </div>
    <div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div>
                            <div class="">

                                <form method="post" action="{{ route('download.store') }}" enctype="multipart/form-data"
                                    class="max-w-md mx-auto">
                                    @csrf
                                    @method('post')
                                    <div class="mb-5">
                                        <label for="title" name="title" class="form-label"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                        <input type="text" name="title"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Enter title" class="form-control" value="{{ old('title') }}" />
                                        <span class="text-red-600">
                                            @error('title')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="mb-5">
                                        <label for="download_file" name="file"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            File</label>
                                        <input type="file" name="download_file" placeholder="Enter title"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />

                                        <span class="text-red-600">
                                            @error('download_file')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <br>
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
