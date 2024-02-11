@extends('layouts.homepage')
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <style>
        .swiper {
            height: 40vh;
            width: 100%;
        }

        .swiper-slide {
            /* border-radius: 8px; */
            overflow: hidden;
        }

        .container-image {
            position: relative;
            text-align: center;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

        }

        .swiper-content {
            position: absolute;
            bottom: 50px;
            width: 50%;
        }

        .swiper-content h3 {
            font-size: 2.2rem !important;
            color: #130a0a;
        }

        p {
            color: #201818;
        }

        img {
            background-position: center center;
            background-size: cover;
            overflow: hidden;
            position: relative;
        }

        .swipper-image {
            background-repeat: none !important;
        }

        .introductory-main {
            padding: 10px 0;
            margin: 20px 0;
        }

        .introductory-section h2 span {
            color: rgba(8, 20, 133, 0.849);
        }

        .introductory-aside h3 span {
            color: rgba(8, 20, 133, 0.849);
        }

        .introductory-aside-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .introductory-aside-content img {
            height: 10rem;
            width: 10rem;
            object-fit: cover;
            border-radius: 50%;
        }

        .introductory-aside-content h4 {
            color: #555151ea;
            font-weight: 600;
        }

        .introductory-aside-content h4 span {

            color: #555151fd;
            font-weight: 600;
        }

        .introductory-aside-content p {
            margin: 5px 0;
            text-align: center;
            width: 80%;
        }

        .life-member-content ul li {
            padding: 2px 0;
        }

        .life-member-content ul button {
            margin: 2px 0;
        }
    </style>
@endpush

@section('content')
    {{-- swipper starts --}}
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @forelse ($news as $newsArticle)
                <div class="swiper-slide">
                    <div class="container-image">
                        {{-- <img class="object-cover w-full h-96" src="https://source.unsplash.com/user/erondu/3000x900"
                        alt="image" /> --}}
                        <div class="swipper-image object-cover w-full h-96"
                            style="background-image: linear-gradient(45deg,
                        rgba(185, 179, 178, 0.473),
                        rgba(180, 182, 184, 0.418)), url('{{ asset('/storage/images/' . $newsArticle->banner_image) }}');background-repeat:no-repeat;background-position:center;background-size:cover;">
                        </div>
                        <div class="swiper-content">
                            <h3>{{ $newsArticle->title }}</h3>
                            <p>{{ Str::limit($newsArticle->content, 100, '...') }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <h1>No news</h1>
            @endforelse


        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
    {{-- swipper ends here --}}

    {{-- introductory section starts here --}}
    <div class="introductory-section container m-auto mt-5">
        <div>
            <div class="m-auto grid grid-cols-1 md:grid-cols-12 lg:grid-cols-12 gap-y-4 gap-x-7">
                <div class="col-span-1 md:col-span-8 lg:col-span-8">
                    <div class="introductory-main">
                        <h2 class="text-3xl lg:text-4xlpy-4 font-extrabold leading-none tracking-tight text-gray-600">
                            Welcome to
                            <span>UPDATES</span>
                        </h2>
                        <hr class="text-gray-300 mt-3 py-1" />
                        <p class="py-2 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Lorem
                            ipsum dolor sit amet consectetur adipisicing elit. Eius iusto,
                            soluta
                            nesciunt provident
                            quisquam vero molestias laudantium necessitatibus explicabo, nihil, sunt perferendis non tenetur
                            dignissimos iure suscipit dolores enim ipsum!</p>
                        <p class="py-2 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Lorem ipsum dolor
                            sit, amet consectetur adipisicing elit. Vero
                            similique doloribus
                            iusto velit
                            quo nobis exercitationem, alias commodi deserunt laboriosam. Lorem ipsum dolor sit amet
                            consectetur adipisicing elit. Ut debitis incidunt nam asperiores tempore nulla officiis soluta,
                            commodi rem nobis.</p>
                    </div>
                    <div class="introductory-activities pb-3">
                        <h2 class="text-3xl lg:text-4xl py-4 font-bold leading-none tracking-tight text-gray-600">
                            Updates
                            <span>Activities</span>
                        </h2>
                        <hr class="text-gray-300 mt-3 py-1" />
                        <div class="activities-container">
                            <div class="card my-2">
                                <a href="#"
                                    class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                                    <h5 class="mb-2 text-xl font-medium tracking-tight text-gray-700 dark:text-white">
                                        Noteworthy technology acquisitions 2021</h5>
                                    <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                                        technology acquisitions of 2021 so far, in reverse chronological order.</p>
                                </a>
                            </div>
                            <div class="card my-2">
                                <a href="#"
                                    class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                                    <h5 class="mb-2 text-xl font-medium tracking-tight text-gray-700 dark:text-white">
                                        Noteworthy technology acquisitions 2021</h5>
                                    <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                                        technology acquisitions of 2021 so far, in reverse chronological order.</p>
                                </a>
                            </div>
                            <div class="card my-2">
                                <a href="#"
                                    class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                                    <h5 class="mb-2 text-xl font-medium tracking-tight text-gray-700 dark:text-white">
                                        Noteworthy technology acquisitions 2021</h5>
                                    <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                                        technology acquisitions of 2021 so far, in reverse chronological order.</p>
                                </a>
                            </div>
                            <div class="card my-2">
                                <a href="#"
                                    class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                                    <h5 class="mb-2 text-xl font-medium tracking-tight text-gray-700 dark:text-white">
                                        Noteworthy technology acquisitions 2021</h5>
                                    <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                                        technology acquisitions of 2021 so far, in reverse chronological order.</p>
                                </a>
                            </div>
                            <div class="card my-2">
                                <a href="#"
                                    class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                                    <h5 class="mb-2 text-xl font-medium tracking-tight text-gray-700 dark:text-white">
                                        Noteworthy technology acquisitions 2021</h5>
                                    <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                                        technology acquisitions of 2021 so far, in reverse chronological order.</p>
                                </a>
                            </div>
                            <div class="card my-2">
                                <a href="#"
                                    class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                                    <h5 class="mb-2 text-xl font-medium tracking-tight text-gray-700 dark:text-white">
                                        Noteworthy technology acquisitions 2021</h5>
                                    <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                                        technology acquisitions of 2021 so far, in reverse chronological order.</p>
                                </a>
                            </div>
                            <div class="card my-2">
                                <a href="#"
                                    class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                                    <h5 class="mb-2 text-xl font-medium tracking-tight text-gray-700 dark:text-white">
                                        Noteworthy technology acquisitions 2021</h5>
                                    <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                                        technology acquisitions of 2021 so far, in reverse chronological order.</p>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-span-full md:col-span-4 lg:col-span-4">
                    <div class="introductory-aside">

                        <div class="membership py-2">
                            <h3 class="text-2xl lg:text-2xl py-4 font-bold leading-none tracking-tight text-gray-600">
                                Life Member's
                                <span>Area</span>
                            </h3>
                            <hr class="text-gray-300 mb-5" />
                            <div class="life-member flex flex-row gap-6 py-8">
                                <div class="life-member-icon">
                                    <img src="https://cdn-icons-png.flaticon.com/512/1792/1792392.png"
                                        style="height:100px;" />
                                </div>
                                <div class="life-member-content">
                                    <ul>
                                        <li>Membership Benefits</li>
                                        <li>Becoming a Member</li>
                                        <li>Browse NELTA Members</li>
                                        <li class="text-primary">Download Membership Form</li>
                                        <button type="button"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">LOGIN
                                            TO MEMBERS</button>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="ceo-message">
                            <h3 class="text-2xl lg:text-2xl py-4 font-bold leading-none tracking-tight text-gray-600">
                                Message from
                                <span>CEO</span>
                            </h3>
                            <hr class="text-gray-300 mt-3 py-1" />
                            <div class="introductory-aside-content">
                                <img
                                    src="https://images.theconversation.com/files/236755/original/file-20180917-158216-t52jx0.jpg" />
                                <h4><span>Mr.</span> Chris Gyale</h4>
                                <p>CEO, Updates</p>
                                <button type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">View
                                    Message</button>
                            </div>
                        </div>

                        <div class="ceo-message my-5">
                            <h3 class="text-2xl lg:text-2xl py-4 font-bold leading-none tracking-tight text-gray-600">
                                Message from
                                <span>General Secretary</span>
                            </h3>
                            <hr class="text-gray-300 mt-3 py-1" />
                            <div class="introductory-aside-content">
                                <img
                                    src="https://images.theconversation.com/files/236755/original/file-20180917-158216-t52jx0.jpg" />
                                <h4><span>Mr.</span> Chris Gyale</h4>
                                <p>General Secretary, Updates</p>
                                <button type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">View
                                    Message</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- introductory section ends here --}}

    {{-- tab section starts here --}}


    <div class="bg-gray-100 flex justify-center py-4">
        <div class="container w-4/5">
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                    data-tabs-toggle="#default-tab-content" role="tablist">
                    <li class="me-2" role="presentation">
                        <button class="bg-gray-50 inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab"
                            data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">News</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                            aria-controls="dashboard" aria-selected="false">Events</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="settings-tab" data-tabs-target="#settings" type="button" role="tab"
                            aria-controls="settings" aria-selected="false">Notices</button>
                    </li>
                    <li role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab"
                            aria-controls="contacts" aria-selected="false">Download Resources</button>
                    </li>
                </ul>
            </div>
            <div id="default-tab-content">
                <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
                    aria-labelledby="profile-tab">
                    @forelse ($news as $newsArticle)
                        <div class="card my-2">
                            <a href="#"
                                class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                                <h5 class="mb-2 text-xl font-medium tracking-tight text-gray-700 dark:text-white">
                                    {{ $newsArticle->title }}</h5>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ Str::limit($newsArticle->content, 200, '...') }}</p>
                            </a>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500 dark:text-gray-400">No content here.</p>
                    @endforelse

                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                    aria-labelledby="dashboard-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                            class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>.
                        Clicking
                        another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to
                        control
                        the content visibility and styling.</p>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel"
                    aria-labelledby="settings-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                            class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>.
                        Clicking
                        another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to
                        control
                        the content visibility and styling.</p>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel"
                    aria-labelledby="contacts-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                            class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>.
                        Clicking
                        another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to
                        control
                        the content visibility and styling.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- tab section ends here --}}
@endsection

@push('scripts')
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            cssMode: true,

            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            mousewheel: true,
            keyboard: true,
        });

        // profile-tab
        $("#profile-tab").click(function() {
            $("#profile-tab").css("background-color", "rgb(249 250 251)");
            $("#dashboard-tab").css("background-color", "inherit");
            $("#settings-tab").css("background-color", "inherit");
            $("#contacts-tab").css("background-color", "inherit");
            $("#profile").css("display", "block")
            $("#dashboard").css("display", "none")
            $("#settings").css("display", "none")
            $("#contacts").css("display", "none")
        })
        $("#dashboard-tab").click(function() {
            $("#profile-tab").css("background-color", "inherit");
            $("#dashboard-tab").css("background-color", "rgb(249 250 251)");
            $("#settings-tab").css("background-color", "inherit");
            $("#contacts-tab").css("background-color", "inherit");
            $("#profile").css("display", "none")
            $("#dashboard").css("display", "block")
            $("#settings").css("display", "none")
            $("#contacts").css("display", "none")
        })
        $("#settings-tab").click(function() {
            $("#profile-tab").css("background-color", "inherit");
            $("#dashboard-tab").css("background-color", "inherit");
            $("#settings-tab").css("background-color", "rgb(249 250 251)");
            $("#contacts-tab").css("background-color", "inherit");
            $("#profile").css("display", "none")
            $("#dashboard").css("display", "none")
            $("#settings").css("display", "block")
            $("#contacts").css("display", "none")
        })
        $("#contacts-tab").click(function() {
            $("#profile-tab").css("background-color", "inherit");
            $("#dashboard-tab").css("background-color", "inherit");
            $("#settings-tab").css("background-color", "inherit");
            $("#contacts-tab").css("background-color", "rgb(249,250,251)");
            $("#profile").css("display", "none")
            $("#dashboard").css("display", "none")
            $("#settings").css("display", "none")
            $("#contacts").css("display", "block")
        })
    </script>
@endpush
