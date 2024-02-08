<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notices') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form method="GET" action="{{ route('notices.index') }}">
                            <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                                <div class="flex flex-col">
                                    <label for="title" class="text-stone-600 text-sm font-medium">Title</label>
                                    <input type="text" id="title" name="title" placeholder="Call for inaguration" class="mt-2 block w-full rounded-md border border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                                </div>

                                <div class="flex flex-col">
                                    <label for="from-date" class="text-stone-600 text-sm font-medium">From date</label>
                                    <input type="date" id="from_date" name="notice_date[gt]" class="mt-2 block w-full rounded-md border border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                                </div>

                                <div class="flex flex-col">
                                    <label for="to-date" class="text-stone-600 text-sm font-medium">To date</label>
                                    <input type="date" id="to-date" name="notice_date[lt]" class=" mt-2 block w-full rounded-md border border-gray-200 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
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
                                    <button class="active:scale-95 rounded-lg bg-gray-200 px-8 py-2 font-medium text-gray-600 outline-none focus:ring hover:opacity-90">Reset</button>
                                    <button class="active:scale-95 rounded-lg bg-blue-600 px-8 py-2 font-medium text-white outline-none focus:ring hover:opacity-90">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Date
                                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                        </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Download
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($notices as $notice)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                                <a href="{{ route('notices.show', ['notice' => $notice->id]) }}" class="hover:underline">
                                    <h2 class="mb-4 text-lg font-extrabold leading-none tracking-tight text-gray-900 md:text-md">{{ $notice->title }}</h2>
                                </a>
                                <p class="text-sm text-gray-500">{{ Str::limit($notice->content, 60, '...') }}</p>
                            </th>
                            <td class="px-6 py-4">
                                <span class="inline-flex gap-2">
                                    <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path fill="currentColor" d="M6 1a1 1 0 0 0-2 0h2ZM4 4a1 1 0 0 0 2 0H4Zm7-3a1 1 0 1 0-2 0h2ZM9 4a1 1 0 1 0 2 0H9Zm7-3a1 1 0 1 0-2 0h2Zm-2 3a1 1 0 1 0 2 0h-2ZM1 6a1 1 0 0 0 0 2V6Zm18 2a1 1 0 1 0 0-2v2ZM5 11v-1H4v1h1Zm0 .01H4v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM10 11v-1H9v1h1Zm0 .01H9v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM10 15v-1H9v1h1Zm0 .01H9v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM15 15v-1h-1v1h1Zm0 .01h-1v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM15 11v-1h-1v1h1Zm0 .01h-1v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM5 15v-1H4v1h1Zm0 .01H4v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM2 4h16V2H2v2Zm16 0h2a2 2 0 0 0-2-2v2Zm0 0v14h2V4h-2Zm0 14v2a2 2 0 0 0 2-2h-2Zm0 0H2v2h16v-2ZM2 18H0a2 2 0 0 0 2 2v-2Zm0 0V4H0v14h2ZM2 4V2a2 2 0 0 0-2 2h2Zm2-3v3h2V1H4Zm5 0v3h2V1H9Zm5 0v3h2V1h-2ZM1 8h18V6H1v2Zm3 3v.01h2V11H4Zm1 1.01h.01v-2H5v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H5v2h.01v-2ZM9 11v.01h2V11H9Zm1 1.01h.01v-2H10v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H10v2h.01v-2ZM9 15v.01h2V15H9Zm1 1.01h.01v-2H10v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H10v2h.01v-2ZM14 15v.01h2V15h-2Zm1 1.01h.01v-2H15v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H15v2h.01v-2ZM14 11v.01h2V11h-2Zm1 1.01h.01v-2H15v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H15v2h.01v-2ZM4 15v.01h2V15H4Zm1 1.01h.01v-2H5v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H5v2h.01v-2Z" />
                                    </svg>
                                    {{ $notice->notice_date }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if(Str::of($notice->notice_file)->endsWith(['png', 'jpg']))
                                png
                                @elseif(Str::of($notice->notice_file)->endsWith('pdf'))
                                pdf
                                @else
                                N/A
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right space-x-4">
                                <a href="{{ route('notices.edit', ['notice' => $notice->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <a href="{{ route('notices.destroy', ['notice' => $notice->id]) }}" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-4">
                    {{ $notices->links() }}
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
</x-app-layout>