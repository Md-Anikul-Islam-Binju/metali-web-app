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
    </style>
    <div class="w-full flex flex-col sm:flex-row gap-y-5 gap-x-8">
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
                    <a href="{{route('timeline')}}" class="p-2.5 mt-3 flex items-center text-black dark:text-white rounded-md px-4 duration-300 cursor-pointer">
                        <i class="bi bi-house-door-fill"></i>
                        <span class="text-[15px] ml-4 text-black dark:text-white font-bold">Home</span>
                    </a>
                    <a href="{{route('suggested.friend')}}" class="p-2.5 mt-3 flex items-center text-black dark:text-white rounded-md px-4 duration-300 cursor-pointer">
                        <i class="fas fa-user-friends"></i>
                        <span class="text-[15px] ml-4 text-black dark:text-white font-bold">Friends</span>
                    </a>
                    <a href="{{route('page.list')}}" class="p-2.5 mt-3 flex items-center text-black dark:text-white rounded-md px-4 duration-300 cursor-pointer">
                        <i class="fas fa-flag"></i>
                        <span class="text-[15px] ml-4 text-black dark:text-white font-bold">Page</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-center w-full">
            <div class="w-full">
                <div class="w-full">
                    <P class="text-black dark:text-white text-2xl font-bold">Groups</P>
                    <section class="rounded">
                        <div class="mt-4">
                            <div class="rounded mt-2">
                                <div class="flex flex-col sm:flex-row gap-y-6 justify-end py-2 rounded bg-gray-50 shadow drop-shadow-xl dark:bg-black">
                                    <ul id="tabs" class="inline-flex pt-2 px-1 w-full">
                                        <li class="bg-gray-200 px-4 text-green-600 font-semibold py-2 rounded-t border-t border-r border-l -mb-px"><a id="default-tab" href="#first">My Groups</a></li>
                                        <li class="px-4 text-green-600 font-semibold py-2 rounded-t"><a href="#second">Suggested Groups</a></li>
                                    </ul>
                                    <a href="{{route('group.create')}}" class="flex h-9 w-36 sm:h-13 sm:w-44 items-center justify-center gap-x-2 ml-1.5 sm:mr-3 text-center text-white transition-colors duration-150 bg-[#62bb46] rounded-md focus:shadow-outline">
                                        <i class="fas fa-plus-circle mt-1 text-center"></i>
                                        <span class="font-medium flex flex-none text-center">Create Group</span>
                                    </a>
                                </div>
                                <div id="tab-contents">
                                    <div id="first" class="pt-4">
                                        <div class="w-full grid grid-cols-1 md:grid-cols-2 justify-between gap-x-5 gap-y-5">
                                            @foreach($myGroups as $myGroupsData)
                                            <div>
                                                <div class="max-w-lg mx-auto bg-gray-50 drop-shadow-lg dark:bg-black rounded-lg overflow-hidden shadow-lg">
                                                    <a href="{{route('group.profile',$myGroupsData->id)}}">
                                                    <div class="px-4 pb-4 py-4">
                                                        <div class="text-center my-4">
                                                            <i class="fas fa-users text-5xl text-gray-900 dark:text-white"></i>
                                                            <div class="py-2">
                                                                <h3 class="font-bold text-2xl mb-1 text-black dark:text-white">
                                                                    {{$myGroupsData->name}}</h3>
                                                                <div class="inline-flex mt-2 text-gray-700 items-center dark:text-white">
                                                                    {{$myGroupsData->likes_count}} Members
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex md:flex-col xl:flex-row gap-2 items-center">
                                                            <button class="flex-1 rounded-full bg-[#62bb46] text-white antialiased font-bold px-4 py-3">
                                                                Visit
                                                            </button>
                                                        </div>
                                                    </div>
                                                    </a>
                                                </div>
                                            </div>
                                            @endforeach
                                            <!-- Card end -->
                                        </div>
                                    </div>
                                    <div id="second" class="hidden pt-4">
                                        <div class="w-full grid grid-cols-1 md:grid-cols-2 justify-between gap-x-5 gap-y-5">
                                            <!-- Card start -->
                                            @foreach($suggestGroups as $suggestGroupsData)
                                            <div>
                                                <div class="max-w-lg mx-auto bg-gray-50 drop-shadow-lg dark:bg-black rounded-lg overflow-hidden shadow-lg">
                                                    <a href="{{route('group.profile',$suggestGroupsData->id)}}">
                                                    <div class="px-4 pb-4 py-4">
                                                        <div class="text-center my-4">
                                                            <i class="fas fa-users text-5xl text-gray-900 dark:text-white"></i>
                                                            <div class="py-2">
                                                                <h3 class="font-bold text-2xl mb-1 text-black dark:text-white">
                                                                    {{$suggestGroupsData->name}}
                                                                </h3>
                                                                <div class="inline-flex mt-2 text-gray-700 items-center dark:text-white">
                                                                    {{$suggestGroupsData->likes_count}} Members
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex md:flex-col xl:flex-row gap-2 items-center">
                                                            <button class="flex-1 rounded-full bg-[#6b7069] text-white antialiased font-bold px-4 py-3">
                                                                Visit
                                                            </button>
                                                        </div>
                                                    </div>
                                                    </a>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- right side end -->
    </div>

    <script>
        let tabsContainer = document.querySelector("#tabs");
        let tabTogglers = tabsContainer.querySelectorAll("#tabs a");
        tabTogglers.forEach(function(toggler) {
            toggler.addEventListener("click", function(e) {
                e.preventDefault();
                let tabName = this.getAttribute("href");
                let tabContents = document.querySelector("#tab-contents");
                for (let i = 0; i < tabContents.children.length; i++) {
                    tabTogglers[i].parentElement.classList.remove("border-t", "border-r", "border-l", "-mb-px", "bg-gray-200");  tabContents.children[i].classList.remove("hidden");
                    if ("#" + tabContents.children[i].id === tabName) {
                        continue;
                    }
                    tabContents.children[i].classList.add("hidden");
                }
                e.target.parentElement.classList.add("border-t", "border-r", "border-l", "-mb-px", "bg-gray-200");
            });
        });
    </script>
@endsection
