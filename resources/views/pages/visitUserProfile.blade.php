@extends('pages.app')
@section('content')
    <style>
        .upload__inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }
        .upload__btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            min-width: 120px;
            padding: 2px 9px;
            transition: all 0.3s ease;
            cursor: pointer;
            border-radius: 50px;
            line-height: 26px;
            font-size: 16px;
            background-color: #d3d3d3;
            color: black;
        }

        .upload__btn-box {
            margin-bottom: 10px;
        }
        .upload__img-wrap {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }
        .upload__img-box {
            width: 100px;
            padding: 0 10px;
            margin-bottom: 8px;
        }
        .upload__img-close {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 10px;
            right: 10px;
            text-align: center;
            line-height: 24px;
            z-index: 1;
            cursor: pointer;
        }
        .upload__img-close:after {
            content: "✖";
            font-size: 14px;
            color: white;
        }

        .img-bg {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            padding-bottom: 100%;
        }


        /* vedio css */
        video {
            border: 1px solid black;
            display: block;
        }


        .dropbtn {
            background-color: #3498DB;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
        }

        .dropup {
            position: relative;
            display: inline-block;
        }

        .dropup-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            bottom: 50px;
            z-index: 1;
        }

        .dropup-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropup-content a:hover {background-color: #ccc}

        .dropup:hover .dropup-content {
            display: block;
        }

        .dropup:hover .dropbtn {
            background-color: #2980B9;
        }


        /* Image Style */
        .layout_style_01 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        }
    </style>


    <div class="ml-0 border-t-0 relative">
        <div class="mt-0">
            @if($user->cover_photo!=null)
                <img class="w-full rounded-lg lg:h-[400px] object-cover" alt="cover" src="{{asset('/storage/cover_photos/'.$user->cover_photo)}}">
            @else
                <img class="w-full rounded-lg lg:h-[400px] object-cover" alt="cover" src="{{URL::to('defult/cover.jpeg')}}">
            @endif
        </div>
        <div>
            <div class="h-6 sm:h-12 flex flex-col sm:flex-row items-end sm:items-center gap-x-7 sm:justify-between">
                <div class="w-3/4 flex flex-col sm:flex-row items-center">
                    <div class="rounded-lg overflow-hidden">
                        @if($user->profile_photo!=null)
                            <img alt="pic" class="p-1 bg-white absolute top-[7rem] sm:top-[9rem] md:top-[12rem] lg:top-60 xl:top-80 left-5 shadow h-48 w-48 rounded-lg" src="{{asset('/storage/profile_photos/'.$user->profile_photo)}}">
                        @else
                            <img alt="pic" class="p-1 bg-white absolute top-[7rem] sm:top-[9rem] md:top-[12rem] lg:top-60 xl:top-80 left-5 shadow h-48 w-48 rounded-lg" src="{{URL::to('defult/profile.jpeg')}}">
                        @endif
                    </div>
                    <div class="w-full">
                        <h1 class="font-bold sm:text-3xl text-black dark:text-white pl-40 sm:pl-60 mt-9">
                            {{$user->first_name}}   {{$user->last_name}}
                        </h1>
                        <p class="pl-40 sm:pl-60 mt-1 text-lg">5 friends</p>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-200 dark:border-gray-500 mt-52 sm:mt-20"></div>
            <ul class="list-reset flex flex-wrap gap-y-4 items-center font-bold mt-5 gap-x-3 justify-end">
                <li>
                    <div class="relative" data-te-dropdown-ref>
                        <a
                            class="flex hover:text-green-600 items-center whitespace-nowrap rounded px-4 text-black dark:text-white focus:outline-none focus:ring-0"
                            href="#"
                            type="button"
                            id="dropdownMenuButton2"
                            data-te-dropdown-toggle-ref
                            aria-expanded="false"
                            data-te-ripple-init
                            data-te-ripple-color="light">
                            More
                            <span class="ml-2 w-2">
									<svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        class="h-5 w-5">
									  <path
                                          fill-rule="evenodd"
                                          d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                          clip-rule="evenodd" />
									</svg>
								  </span>
                        </a>
                        <ul
                            class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
                            aria-labelledby="dropdownMenuButton2"
                            data-te-dropdown-menu-ref>
                            <li>
                                <a
                                    class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                    href="#"
                                    data-te-dropdown-item-ref
                                >Action</a
                                >
                            </li>
                            <li>
                                <a
                                    class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                    href="#"
                                    data-te-dropdown-item-ref
                                >Another action</a
                                >
                            </li>
                            <li>
                                <a
                                    class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                    href="#"
                                    data-te-dropdown-item-ref
                                >Something else here</a
                                >
                            </li>
                        </ul>
                    </div>
                </li>
                {{--                <li class="cursor-pointer px-4 hover:text-green-600">--}}
                {{--                    <a href="#" rel="noopener noreferrer">Photos</a>--}}
                {{--                </li>--}}
                <li class="cursor-pointer px-4 flex items-center hover:text-green-600">
                    <a href="{{route('suggested.friend')}}" rel="noopener noreferrer">Friends</a>
                </li>
                <li class="cursor-pointer px-4 hover:text-green-600">
                    <a href="{{route('group.list')}}" rel="noopener noreferrer">Groups</a>
                </li>
                <li class="cursor-pointer px-4 hover:text-green-600">
                    <a href="{{route('timeline')}}" rel="noopener noreferrer">Timeline</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- mid section start -->
    <section class="lg:container pt-0 mx-auto px-3 lg:px-20 mt-8 mb-10">
        <div class="w-full flex flex-col sm:flex-row gap-y-5 gap-x-5">
            <!-- left side start -->
            <div class="w-full sm:w-5/12">
                <div class="w-full bg-white shadow drop-shadow dark:bg-black mr-4 p-4 rounded-md text-black dark:text-white text-base">
                    <div class="font-semibold">
                        Intro
                    </div>
                    <div class="text-center border-b py-4">
                        {{$user->short_bio }}
                    </div>
                    <ul class="list-reset gap-y-2 flex flex-col pt-4 text-black dark:text-white">
                        <li class="flex items-center py-1">
                            <svg class="w-5 h-5 mr-2 fill-gray-500" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1472 992v480q0 26-19 45t-45 19h-384v-384h-256v384h-384q-26 0-45-19t-19-45v-480q0-1 .5-3t.5-3l575-474 575 474q1 2 1 6zm223-69l-62 74q-8 9-21 11h-3q-13 0-21-7l-692-577-692 577q-12 8-24 7-13-2-21-11l-62-74q-8-10-7-23.5t11-21.5l719-599q32-26 76-26t76 26l244 204v-195q0-14 9-23t23-9h192q14 0 23 9t9 23v408l219 182q10 8 11 21.5t-7 23.5z">
                                </path>
                            </svg>
                            <span>
                                Lives in
                                <a class="no-underline hover:underline text-blue" href="#">
                                    {{$user->address}}
                                </a>
                            </span>
                        </li>
                        <li class="flex items-center py-1">
                            <svg class="w-5 h-5 mr-3 fill-gray-500" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M896 1664q-26 0-44-18l-624-602q-10-8-27.5-26t-55.5-65.5-68-97.5-53.5-121-23.5-138q0-220 127-344t351-124q62 0 126.5 21.5t120 58 95.5 68.5 76 68q36-36 76-68t95.5-68.5 120-58 126.5-21.5q224 0 351 124t127 344q0 221-229 450l-623 600q-18 18-44 18z">
                                </path>
                            </svg>
                            <span>
								 {{$user->relation_status}}
							</span>
                        </li>

                        <li class="flex items-center py-1">
                            <svg class="w-5 h-5 mr-3 fill-gray-500" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1024 1131q0 64-37 106.5t-91 42.5h-512q-54 0-91-42.5t-37-106.5 9-117.5 29.5-103 60.5-78 97-28.5q6 4 30 18t37.5 21.5 35.5 17.5 43 14.5 42 4.5 42-4.5 43-14.5 35.5-17.5 37.5-21.5 30-18q57 0 97 28.5t60.5 78 29.5 103 9 117.5zm-157-520q0 94-66.5 160.5t-160.5 66.5-160.5-66.5-66.5-160.5 66.5-160.5 160.5-66.5 160.5 66.5 66.5 160.5zm925 445v64q0 14-9 23t-23 9h-576q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h576q14 0 23 9t9 23zm0-252v56q0 15-10.5 25.5t-25.5 10.5h-568q-15 0-25.5-10.5t-10.5-25.5v-56q0-15 10.5-25.5t25.5-10.5h568q15 0 25.5 10.5t10.5 25.5zm0-260v64q0 14-9 23t-23 9h-576q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h576q14 0 23 9t9 23zm128 960v-1216q0-13-9.5-22.5t-22.5-9.5h-1728q-13 0-22.5 9.5t-9.5 22.5v1216q0 13 9.5 22.5t22.5 9.5h352v-96q0-14 9-23t23-9h64q14 0 23 9t9 23v96h768v-96q0-14 9-23t23-9h64q14 0 23 9t9 23v96h352q13 0 22.5-9.5t9.5-22.5zm128-1216v1216q0 66-47 113t-113 47h-1728q-66 0-113-47t-47-113v-1216q0-66 47-113t113-47h1728q66 0 113 47t47 113z">
                                </path>
                            </svg>
                            <span>
                                Followed by
                                <a class="no-underline hover:underline text-blue" href="#">
                                    33 people
                                </a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- left side end -->

            <!-- right side start -->
            <div class="w-full sm:w-7/12">
                <div class="w-full">
                    <!-- create post start -->
                    <div class="bg-white shadow drop-shadow overflow-hidden dark:bg-black dark:text-white text-black rounded-md">
                        <div class="px-3 pt-0 pb-2">

                        </div>
                        <div class="px-3 pb-1 text-black dark:text-white">
                            <ul class="flex items-center list-reset font-bold">
                                <li class="p-2 rounded-full mr-4 cursor-pointer">
										<span class="flex gap-x-2 items-center">
											<i class="fas fa-photo-video text-green-700"></i>
											Photo/Video
										</span>
                                </li>
                                <li class="p-2 rounded-full mr-4 cursor-pointer">
										<span class="flex gap-x-2 items-center">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 fill-[#f23e5c]">
												<path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
											</svg>
											Live Videos
										</span>
                                </li>
                                <li class="p-2 rounded-full mr-4 cursor-pointer">
										<span class="flex gap-x-2 items-center">
											<svg class="w-5 h-5 mr-2 fill-blue-500" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
												<path d="M320 256q0 72-64 110v1266q0 13-9.5 22.5t-22.5 9.5h-64q-13 0-22.5-9.5t-9.5-22.5v-1266q-64-38-64-110 0-53 37.5-90.5t90.5-37.5 90.5 37.5 37.5 90.5zm1472 64v763q0 25-12.5 38.5t-39.5 27.5q-215 116-369 116-61 0-123.5-22t-108.5-48-115.5-48-142.5-22q-192 0-464 146-17 9-33 9-26 0-45-19t-19-45v-742q0-32 31-55 21-14 79-43 236-120 421-120 107 0 200 29t219 88q38 19 88 19 54 0 117.5-21t110-47 88-47 54.5-21q26 0 45 19t19 45z">
												</path>
											</svg>
											Live Adda
										</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- create post end -->


                    <!-- post start -->
                    @foreach($user->userPost as $userPostData)
                        <div class="bg-white shadow drop-shadow dark:bg-black dark:text-white mt-4 p-3 pb-0 relative text-black rounded-md">
                            <div class="flex items-start gap-x-10 justify-between">
                                <div class="flex items-center gap-x-0.5">
                                    <div class="w-[3rem]">
                                        <img alt="" class="w-10 h-10 rounded-full" src="{{asset('/storage/profile_photos/'.$userPostData->user->profile_photo)}}"></img>
                                    </div>
                                    <div class="ml-2 w-full">
                                        <h5>
                                            <a class="no-underline hover:underline font-bold" href="#">
                                                {{$userPostData->user->first_name}}   {{$userPostData->user->last_name}}
                                            </a>
                                        </h5>
                                        <p class="text-xs font-normal text-grey mt-1">
											<span class="cursor-pointer hover:underline">
												{{ \Carbon\Carbon::parse($userPostData->user->created_at)->format('F j, Y') }}

											</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="relative" data-te-dropdown-ref>
                                    <a
                                        class="flex items-center font-extrabold whitespace-nowrap rounded px-4 text-black dark:text-white focus:outline-none focus:ring-0"
                                        href="#"
                                        type="button"
                                        id="dropdownMenuButton2"
                                        data-te-dropdown-toggle-ref
                                        aria-expanded="false"
                                        data-te-ripple-init
                                        data-te-ripple-color="light">
                                        ...
                                    </a>
                                    <ul
                                        class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
                                        aria-labelledby="dropdownMenuButton2"
                                        data-te-dropdown-menu-ref>
                                        <li>
                                            <a
                                                class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                                href="#"
                                                data-te-dropdown-item-ref
                                            >Action</a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                                href="#"
                                                data-te-dropdown-item-ref
                                            >Another action</a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                                href="#"
                                                data-te-dropdown-item-ref
                                            >Something else here</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            @php
                                $images = json_decode($userPostData->image);
                                if($images!=null)
                                $totalImages = count($images);
                                else
                                $totalImages=0;
                            @endphp
                            <h5 class="text-sm font-normal my-3">
                                {{$userPostData->post_details}}
                            </h5>

                            @if($totalImages==1)
                                <div class="bg-cover grid grid-cols-1">
                                    @foreach (json_decode($userPostData->image) as $imageName)
                                        <img  class="bg-cover w-full" src="{{ asset('/images/post_images/' . $imageName) }}" alt="Post Image">
                                    @endforeach
                                </div>
                            @elseif($totalImages == 2 || $totalImages == 3 || $totalImages == 4 || $totalImages == 5 || $totalImages == 6)
                                <div class="bg-cover layout_style_01">
                                    @foreach (json_decode($userPostData->image) as $imageName)
                                        <img  class="bg-cover w-full" src="{{ asset('/images/post_images/' . $imageName) }}" alt="Post Image">
                                    @endforeach
                                </div>
                            @endif

                            <div class="flex py-1">
                                <button class="like-button appearance-none flex-1 flex items-center justify-center py-2 text-center text-red hover:bg-grey-lighter" data-post-id="{{ $userPostData->id }}">
                                    @if($userPostData->isLikedByUser(auth()->user()->id))
                                        <i class="fas fa-thumbs-down"></i>
                                    @else
                                        <i class="fas fa-thumbs-up"></i>
                                    @endif
                                </button>

                                <button class="appearance-none flex-1 flex items-center justify-center py-2 text-center text-grey-darker hover:bg-grey-lighter">

                                    <svg class="w-4 h-4 mr-1 fill-gray-500 " viewbox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1792 896q0 174-120 321.5t-326 233-450 85.5q-70 0-145-8-198 175-460 242-49 14-114 22-17 2-30.5-9t-17.5-29v-1q-3-4-.5-12t2-10 4.5-9.5l6-9 7-8.5 8-9q7-8 31-34.5t34.5-38 31-39.5 32.5-51 27-59 26-76q-157-89-247.5-220t-90.5-281q0-130 71-248.5t191-204.5 286-136.5 348-50.5q244 0 450 85.5t326 233 120 321.5z">
                                        </path>
                                    </svg>
                                    {{$userPostData->comments_count}}Comment
                                </button>
                                <button class="appearance-none flex-1 flex items-center justify-center py-2 text-center text-grey-darker hover:bg-grey-lighter">
                                    <svg class="w-4 h-4 mr-1 fill-gray-500" viewbox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1792 640q0 26-19 45l-512 512q-19 19-45 19t-45-19-19-45v-256h-224q-98 0-175.5 6t-154 21.5-133 42.5-105.5 69.5-80 101-48.5 138.5-17.5 181q0 55 5 123 0 6 2.5 23.5t2.5 26.5q0 15-8.5 25t-23.5 10q-16 0-28-17-7-9-13-22t-13.5-30-10.5-24q-127-285-127-451 0-199 53-333 162-403 875-403h224v-256q0-26 19-45t45-19 45 19l512 512q19 19 19 45z">
                                        </path>
                                    </svg>
                                    Share
                                </button>
                            </div>

                            <div class="flex items-center gap-x-3 p-2 -mx-3">
                                <svg class="w-4 h-4" id="Layer_1" style="enable-background:new 0 0 496.158 496.158;" version="1.1" viewbox="0 0 496.158 496.158" x="0px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" y="0px">
									<path d="M0,248.085C0,111.063,111.069,0.003,248.075,0.003c137.013,0,248.083,111.061,248.083,248.082
		c0,137.002-111.07,248.07-248.083,248.07C111.069,496.155,0,385.087,0,248.085z" style="fill:#E04F5F;">
                                    </path>
                                    <path d="M374.116,155.145c-34.799-34.8-91.223-34.8-126.022,0h-0.029c-34.801-34.8-91.224-34.8-126.023,0
		c-34.801,34.8-29.783,86.842,0,126.022c31.541,41.491,89.129,109.944,126.023,109.944h0.029c36.895,0,94.481-68.453,126.022-109.944
		C403.9,241.988,408.916,189.946,374.116,155.145z" style="fill:#FFFFFF;">
                                    </path>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
								</svg>
                                <span class="text-sm text-black dark:text-white cursor-pointer hover:underline">
									  You, {{$userPostData->timeline_post_likes_count}} others
								</span>
                            </div>


                            <form id="commentForm" method="post" action="{{ route('comment.store') }}">
                                @csrf
                                <div class="bg-grey-lighter flex flex-between py-3 -mx-3 p-2">
                                    <input type="hidden" name="user_post_id" value="{{ $userPostData->id }}">
                                    <textarea name="comment" placeholder="Write a comment..." class="appearance-none text-black w-full mx-2 rounded-full focus:outline-none border bg-white px-4 pt-2.5 commentInput"></textarea>

                                </div>
                            </form>
                            <div class="bg-grey-lighter flex flex-between py-3 -mx-3 p-2">
                                <div class="bg-white w-full rounded-lg">
                                    <!-- Comment  -->
                                    @if ($userPostData->comments->isNotEmpty())
                                        @foreach ($userPostData->comments as $userPostCommentData)
                                            <div class="flex items-start space-x-2">
                                                <a href="{{route('visit.user.profile',$userPostCommentData->user->id)}}">
                                                    <img src="{{asset('/storage/profile_photos/'.$userPostCommentData->user->profile_photo)}}" alt="Profile Image" class="w-10 h-10 rounded-full">
                                                </a>
                                                <div class="flex-1">
                                                    <div class="bg-gray-100 p-3 rounded-lg">
                                                        <p class="text-gray-700">{{$userPostCommentData->comment}}</p>
                                                    </div>
                                                    <div class="flex gap-x-6 items-center mt-2">
                                                        <div class="space-x-4">
                                                            <button class="text-gray-500 hover:text-gray-700" onclick="toggleReplyForm('{{ $userPostCommentData->id }}')">Reply</button>
                                                        </div>
                                                        <div class="flex items-center space-x-2">
                                                            <span class="text-gray-400">{{ $userPostCommentData->created_at->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="relative" data-te-dropdown-ref>
                                                    <a
                                                        class="flex items-center font-extrabold whitespace-nowrap rounded px-4 text-black dark:text-white focus:outline-none focus:ring-0"
                                                        href="#"
                                                        type="button"
                                                        id="dropdownMenuButton2"
                                                        data-te-dropdown-toggle-ref
                                                        aria-expanded="false"
                                                        data-te-ripple-init
                                                        data-te-ripple-color="light">
                                                        ...
                                                    </a>
                                                    <ul
                                                        class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
                                                        aria-labelledby="dropdownMenuButton2"
                                                        data-te-dropdown-menu-ref>
                                                        <li>
                                                            <a
                                                                class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                                                href="#"
                                                                data-te-dropdown-item-ref
                                                            >Delete</a
                                                            >
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Reply form -->
                                            <div id="replyForm{{ $userPostCommentData->id }}" class="hidden ml-12 mt-4">
                                                <form method="post" action="{{ route('reply.comment.store') }}">
                                                    @csrf
                                                    <input type="hidden" name="user_post_comment_id" value="{{ $userPostCommentData->id }}">
                                                    <textarea name="reply" placeholder="Write a reply..." class="appearance-none text-black w-full mx-2 rounded-full focus:outline-none border bg-white px-4 pt-2.5"></textarea>
                                                    <button type="submit" class="text-gray-500 hover:text-gray-700">Submit Reply</button>
                                                </form>
                                            </div>

                                            <!-- reply comment -->

                                            @if ($userPostCommentData->replies->isNotEmpty())
                                                @foreach ($userPostCommentData->replies as $reply)
                                                    <div class="ml-12 mt-4 flex items-start space-x-2">
                                                        <a href="{{route('visit.user.profile',$reply->user->id)}}">
                                                            <img src="{{asset('/storage/profile_photos/'.$reply->user->profile_photo)}}" alt="Subcomment Profile Image" class="w-10 h-10 rounded-full">
                                                        </a>
                                                        <div class="flex-1">
                                                            <div class="bg-gray-100 p-2 rounded-lg">
                                                                <p class="text-gray-700">{{ $reply->reply }}</p>
                                                            </div>

                                                            <div class="flex gap-x-6 items-center mt-1">
                                                                <div class="flex items-center space-x-2">
                                                                    <span class="text-gray-400">{{ $reply->created_at->diffForHumans() }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="relative" data-te-dropdown-ref>
                                                            <a
                                                                class="flex items-center font-extrabold whitespace-nowrap rounded px-4 text-black dark:text-white focus:outline-none focus:ring-0"
                                                                href="#"
                                                                type="button"
                                                                id="dropdownMenuButton2"
                                                                data-te-dropdown-toggle-ref
                                                                aria-expanded="false"
                                                                data-te-ripple-init
                                                                data-te-ripple-color="light">
                                                                ...
                                                            </a>
                                                            <ul
                                                                class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
                                                                aria-labelledby="dropdownMenuButton2"
                                                                data-te-dropdown-menu-ref>
                                                                <li>
                                                                    <a
                                                                        class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                                                        href="#"
                                                                        data-te-dropdown-item-ref
                                                                    >Delete</a
                                                                    >
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @else

                                    @endif
                                </div>
                            </div>

                        </div>
                    @endforeach
                    <!-- post end -->
                </div>
            </div>
            <!-- right side end -->
        </div>
    </section>
    <script>
        document.querySelectorAll('.commentInput').forEach(function(commentInput) {
            commentInput.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' && !e.shiftKey) {
                    e.preventDefault();
                    commentInput.closest('form').submit();
                }
            });
        });
    </script>

    <script>
        function toggleReplyForm(commentId) {
            var replyForm = document.getElementById('replyForm' + commentId);
            replyForm.classList.toggle('hidden');
        }
    </script>

    <script>
        // Like Button Click Event
        document.querySelectorAll('.like-button').forEach(button => {
            button.addEventListener('click', function() {
                const postId = this.getAttribute('data-post-id');
                const likeButton = this;

                // Send AJAX request to the server
                fetch(`/user/post/${postId}/like`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        postId: postId,
                    }),
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.liked) {
                            likeButton.innerHTML = `<svg class="w-4 h-4 mr-1" id="Layer_1" style="enable-background:new 0 0 496.158 496.158;" version="1.1" viewbox="0 0 496.158 496.158" x="0px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" y="0px"><!-- your SVG path for the heart icon --></svg><i class="fas fa-thumbs-down"></i>`;
                        } else {
                            likeButton.innerHTML = `<svg class="w-4 h-4 mr-1" id="Layer_1" style="enable-background:new 0 0 496.158 496.158;" version="1.1" viewbox="0 0 496.158 496.158" x="0px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" y="0px"><!-- your SVG path for the heart icon --></svg><i class="fas fa-thumbs-up"></i>`;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    </script>


@endsection
