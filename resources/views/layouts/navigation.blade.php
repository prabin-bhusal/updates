<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1  text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out @if (request()->route()->getName() == 'home') border-b-2 border-b-slate-800 @endif">Home</a>
                    <a href="{{ route('blogs') }}" class="inline-flex items-center px-1 pt-1  text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out @if (request()->route()->getName() == 'blogs') border-b-2 border-b-slate-800 @endif">Blogs</a>
                    <a href="{{ route('user-events') }}" class="inline-flex items-center px-1 pt-1  text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out @if (request()->route()->getName() == 'user-events') border-b-2 border-b-slate-800 @endif">Events</a>
                    <a href="{{ route('user-notices') }}" class="inline-flex items-center px-1 pt-1  text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out @if (request()->route()->getName() == 'user-notices') border-b-2 border-b-slate-800 @endif">Notices</a>
                    {{-- <a href="{{ route('blogs') }}"
                    class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out @if (request()->route()->getName() == 'blogs') border-b-2 border-b-slate-800 @endif">Download
                    Resources</a> --}}

                </div>
            </div>


            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">


        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                {{-- <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}
            </div>
            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div> --}}
        </div>

        <div class="mt-3 space-y-1 flex flex-col">
            <a href="">Home</a>
            <a href="">Home</a>
            <a href="">Home</a>

        </div>
    </div>
    </div>
</nav>