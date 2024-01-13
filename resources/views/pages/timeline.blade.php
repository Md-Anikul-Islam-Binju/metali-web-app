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
    <div class="w-full flex flex-col sm:flex-row gap-y-5 gap-x-2">

        <!-- left side start -->
        <div class="w-full sm:w-3/12 text-black dark:text-white hidden lg:block">
            <div class="w-full mr-4 p-4 rounded-md text-black dark:text-white text-base h-full overflow-y-auto">
                <div class="sidebar fixed top-14 bg-white dark:bg-black bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center shadow drop-shadow-lg">
                    <div class="text-black dark:text-white text-xl">
                        <div class="p-2.5 mt-1 flex items-center">
                            @if($authUser->profile_photo!=null)
                            <img alt="" class="w-10 h-10 rounded-full" src="{{asset('/storage/profile_photos/'.$authUser->profile_photo)}}"></img>
                            @else
                                <img alt="" class="w-10 h-10 rounded-full" src="{{URL::to('defult/profile.jpeg')}}"></img>
                            @endif

                                <h1 class="font-bold text-black dark:text-white text-[15px] ml-2">
                                {{$authUser->first_name}}   {{$authUser->last_name}}
                            </h1>
                        </div>
                        <div class="my-2 bg-gray-600 h-[1px]"></div>
                    </div>
                    <a href="{{route('profile')}}" class="p-2.5 mt-3 flex items-center text-black dark:text-white rounded-md px-4 duration-300 cursor-pointer">
                        <i class="bi bi-house-door-fill"></i>
                        <span class="text-[15px] ml-4 text-black dark:text-white font-bold">My Profile</span>
                    </a>
                    <a href="{{route('suggested.friend')}}" class="p-2.5 mt-3 flex items-center text-black dark:text-white rounded-md px-4 duration-300 cursor-pointer">
                        <i class="fas fa-user-friends"></i>
                        <span class="text-[15px] ml-4 text-black dark:text-white font-bold">Friends</span>
                    </a>
                    <a href="{{route('group.list')}}" class="p-2.5 mt-3 flex items-center text-black dark:text-white rounded-md px-4 duration-300 cursor-pointer">
                        <i class="fas fa-users"></i>
                        <span class="text-[15px] ml-4 text-black dark:text-white font-bold">Groups</span>
                    </a>
                    <a href="{{route('page.list')}}" class="p-2.5 mt-3 flex items-center text-black dark:text-white rounded-md px-4 duration-300 cursor-pointer">
                        <i class="fas fa-flag"></i>
                        <span class="text-[15px] ml-4 text-black dark:text-white font-bold">Page</span>
                    </a>
                    <a href="http://127.0.0.1:8000/chat/" class="p-2.5 mt-3 flex items-center text-black dark:text-white rounded-md px-4 duration-300 cursor-pointer">
                        <i class="fab fa-rocketchat"></i>
                        <span class="text-[15px] ml-4 text-black dark:text-white font-bold">Chat</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- left side end -->

        <!-- right side start -->
        <div class="flex items-center justify-center w-full">
            <div class="w-full sm:w-10/12">
                <div class="w-full">
                    <div class="bg-white shadow drop-shadow overflow-hidden dark:bg-black dark:text-white text-black rounded-md">
                        <div class="px-3 pt-0 pb-2">
                            <div class="flex items-center border-b pb-3 gap-x-2">
                                @if($authUser->profile_photo!=null)
                                <img alt="" class="block w-11 h-11 rounded-full mt-4" src="{{asset('/storage/profile_photos/'.$authUser->profile_photo)}}"></img>
                                @else
                                    <img alt="" class="block w-11 h-11 rounded-full mt-4" src="{{URL::to('defult/profile.jpeg')}}"></img>
                                @endif
                                    <div disabled
                                          type="button"
                                          data-te-toggle="modal"
                                          data-te-target="#exampleModalCenter1"
                                          data-te-ripple-init
                                          data-te-ripple-color="light"
                                          class="appearance-none h-10 border cursor-pointer flex-1 items-center ml-2 mt-4 rounded-3xl text-black bg-white py-2.5 focus:outline-none px-4" id="body" name="body" placeholder="What's on your mind?"></div>
                            </div>
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
                        <div class="flex justify-end p-2">
                            <button class="bg-[#62bb46] py-2 px-6 text-white rounded">
                                Post
                            </button>
                        </div>
                    </div>

                    <!-- post start -->
                        @foreach($userPost as $userPostData)
                           <div class="bg-white shadow drop-shadow dark:bg-black dark:text-white mt-4 p-3 pb-0 relative text-black rounded-md">
                            <div class="flex items-start gap-x-10 justify-between">
                                <div class="flex items-center gap-x-0.5">
                                    <div class="w-[3rem]">

                                        @if($userPostData->user->profile_photo!=null)
                                            <img alt="" class="w-10 h-10 rounded-full" src="{{asset('/storage/profile_photos/'.$userPostData->user->profile_photo)}}"></img>
                                        @else
                                            <img alt="" class="w-10 h-10 rounded-full" src="{{URL::to('defult/profile.jpeg')}}"></img>
                                        @endif
                                    </div>
                                    <div class="ml-2 w-full">
                                        <h5>
                                            <a  class="no-underline hover:underline font-bold" href="{{route('visit.user.profile',$userPostData->user->id)}}">
                                                {{$userPostData->user->first_name}}   {{$userPostData->user->last_name}}
                                            </a>
                                        </h5>
                                        <p class="text-xs font-normal text-grey mt-1">
                                            <span class="cursor-pointer hover:underline">
                                                {{ \Carbon\Carbon::parse($userPostData->created_at)->format('F j, Y') }}
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
                                    <img  class="bg-cover w-full h-full max-h-[350px] object-fill" src="{{ asset('/images/post_images/' . $imageName) }}" alt="Post Image">
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
                                   {{$userPostData->comments_count}} Comment
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
                            <div class="flex justify-center items-center pb-7">
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
        </div>
    </div>

    <!-- modal start-->
    <div
        data-te-modal-init
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="exampleModalCenter1"
        data-te-backdrop="static"
        tabindex="-1"
        aria-labelledby="exampleModalCenterTitle"
        aria-modal="true"
        role="dialog">
        <div
            data-te-modal-dialog-ref
            class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
            <div
                class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-700">
                <div
                    class="flex flex-shrink-0 items-center justify-between rounded-t-md border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <h5
                        class="text-2xl font-bold leading-normal text-neutral-800 dark:text-neutral-200"
                        id="exampleModalLabel">
                        Create Post
                    </h5>
                    <button
                        type="button"
                        class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                        data-te-modal-dismiss
                        aria-label="Close">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="h-6 w-6">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <hr>
                <form method="post" action="{{route('user.post')}}" enctype="multipart/form-data">
                    @csrf
                    <!--Modal body-->
                    <div data-te-modal-body-ref class="relative p-2">
                        <div class="p-0.5 mt-1 flex items-center">
                            @if($authUser->profile_photo!=null)
                                <img alt="" class="w-10 h-10 rounded-full" src="{{asset('/storage/profile_photos/'.$authUser->profile_photo)}}"></img>
                            @else
                                <img alt="" class="w-10 h-10 rounded-full" src="{{URL::to('defult/profile.jpeg')}}"></img>
                            @endif
                            <h1 class="font-bold text-black dark:text-white text-[15px] ml-2">
                                {{$authUser->first_name}}   {{$authUser->last_name}}
                            </h1>
                        </div>
                        <div class="border rounded-lg mt-2 mb-2 overflow-hidden">
                            <textarea rows="10"  class="w-full appearance-none cursor-pointer dark:bg-black dark:text-white flex-1 items-center text-black py-2 focus:outline-none px-2 placeholder:text-lg" name="post_details" placeholder="What's on your mind?"></textarea>
                            <div class="p-2 mr-4 cursor-pointer mt-2">
						<span class="flex flex-col gap-x-2">
							<div class="upload__box">
								<div class="upload__img-wrap"></div>
								<div class="upload__btn-box">
									<label class="upload__btn">
										<p class="flex gap-x-2">
											<span>
												<i class="fas fa-image text-green-700 text-lg"></i>
											</span>
											Upload images</p>
										<input type="file" name="image[]" multiple="" data-max_length="20" class="upload__inputfile">
									</label>
								</div>
							</div>
							<div class="flex w-full gap-x-5 justify-between items-center">
								<div class="w-auto">
									<label class="upload__btn" style="min-width: 148px;">
										<p class="flex gap-x-2">
											<span>
												<i class="fas fa-video text-rose-700 text-lg"></i>
											</span>
											Upload Video</p>
										<input type="file" name="videos" id="file-input" data-max_length="20" class="upload__inputfile" accept="video/*">
									</label>
								</div>
								<video id="video" width="190" height="300" controls></video>
							</div>
						</span>
                            </div>
                        </div>
                    </div>

                    <!-- button start -->
                    <div class="flex flex-col sm:flex-row justify-between gap-2 p-4 mt-2">
                        <div class="border rounded-full overflow-hidden px-2 bg-gray-100 dark:bg-black ">
                            <select name="status" id="countries" class="bg-gray-100 dark:bg-black cursor-pointer text-gray-900 flex-1 w-full sm:w-28 items-center justify-center text-sm block px-3 py-0.5 h-9 focus:outline-none dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                <option value="1" selected>Everyone</option>
                                <option value="2">Friends</option>
                                <option value="3">Only Me</option>
                            </select>
                        </div>
                        <div class="flex gap-2 text-dark">
                            <button type="submit" class="sm:px-8 w-full text-center py-3 rounded-lg bg-[#38aa40] font-medium hover:bg-green-600 transition-all text-white border cursor-pointer">
                                Post
                            </button>
                        </div>
                    </div>
                </form>
                <!-- button end -->
            </div>
        </div>
    </div>
    </div>
    <!-- modal end-->

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
