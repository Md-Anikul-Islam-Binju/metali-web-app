@extends('pages.app')
@section('content')
    <style>
        .image-profile {
            display: block;
            width: 140px;
            height: 140px;
            overflow: hidden;
            position: relative;
            margin: 0px auto;
            text-align: center;
            border: 3px solid #FFF;
            -webkit-box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.3),inset 0px 3px 8px rgba(0, 0, 0, 0.3);
            -moz-box-shadow: 0px 1px 2px rgba(0,0,0,0.3),inset 0px 3px 8px rgba(0,0,0,0.3);
            box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.3),inset 0px 3px 8px rgba(0, 0, 0, 0.3);
        }

        .img {
            max-width: 100%;
            height: auto;
            vertical-align: middle;
            border: 0;
            -ms-interpolation-mode: bicubic;
        }

        :is(.dark .dark\:bg-black) {
            --tw-bg-opacity: 1;
            background-color: #323435;
        }

        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 5px auto;
        }
        .avatar-upload .avatar-edit {
            position: absolute;
            right: 2px;
            z-index: 1;
            bottom: 5px;
        }
        .avatar-upload .avatar-edit input {
            display: none;
        }
        .avatar-upload .avatar-edit input + label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #017a16;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }
        .avatar-upload .avatar-edit input + label:hover {
            background: #025e30;
            border-color: #d6d6d6;
        }
        .avatar-upload .avatar-edit input + label:after {
            font-family: "Font Awesome 5 Free";
            color: #ffffff;
            position: absolute;
            top: 10px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }
        .avatar-upload .avatar-preview {
            width: 200px;
            height: 200px;
            position: relative;
            margin-left: 25px;
            border-radius: 100%;
            border: 6px solid #f8f8f8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }
        .avatar-upload .avatar-preview > div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
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
                    <a href="{{route('group.list')}}" class="p-2.5 mt-3 flex items-center text-black dark:text-white rounded-md px-4 duration-300 cursor-pointer">
                        <i class="fas fa-users"></i>
                        <span class="text-[15px] ml-4 text-black dark:text-white font-bold">Groups</span>
                    </a>
                    <a href="{{route('page.list')}}" class="p-2.5 mt-3 flex items-center text-black dark:text-white rounded-md px-4 duration-300 cursor-pointer">
                        <i class="fas fa-flag"></i>
                        <span class="text-[15px] ml-4 text-black dark:text-white font-bold">pages</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="w-full">
            <div class="w-full">
                <div class="bg-gray-100 dark:bg-black text-black dark:text-white rounded">
                    <div class="p-4">
                        <h3 class="pt-1 pb-8 text-[#38aa40] text-center text-4xl font-bold">Create Page</h3>
                        <hr>
                        <form method="post" action="{{route('page.store')}}" enctype="multipart/form-data">
                            @csrf
                        <div class="flex flex-col gap-y-5 mt-4">
                            <div class="container">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input  type='file' name="profile_image" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload">
                                            <i class="fas fa-camera ml-2 mt-2 text-white"></i>
                                        </label>
                                    </div>

                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url(https://t4.ftcdn.net/jpg/04/73/25/49/240_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-black dark:text-white mb-2">Upload Photo</p>
                                <div class="w-full flex flex-col sm:flex-row gap-2 items-center gap-x-8">
                                    <div class="w-full md:w-4/12">
                                        <input class="w-full text-black dark:text-black bg-[#FBFBFB] px-2 border border-[#E3E3E3] py-3 rounded-md bg-gray-light focus:outline-none" type="file" name="cover_image" accept="image/*" onchange="readURL2(this)" />
                                    </div>
                                    <div class="w-full md:w-8/12 border rounded-lg bg-contain flex items-center justify-center overflow-hidden bg-no-repeat">
                                        <img class="h-full bg-cover w-full" src="https://www.wezen.com/wp-content/themes/applounge/assets/images/no-image/No-Image-Found-400x264.png" id="img-preview-cover" style="height: 190px;"/>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="w-full flex flex-col gap-y-2 gap-x-4">
                                    <div class="w-full">
                                        <label class="inline-block py-2 text-xl font-bold text-black dark:text-white" for="first name">Page Name</label>
                                        <input class="w-full bg-[#FBFBFB] px-4 border border-[#E3E3E3] py-3 text-base font-normal text-gray-800 placeholder-[#AFAFAF] rounded-md bg-gray-light focus:outline-none" type="text" name="name" placeholder="Page Name">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="w-full flex flex-col gap-y-2 gap-x-4">
                                    <div class="w-full">
                                        <label class="inline-block py-2 text-xl font-bold text-black dark:text-white" for="first name">Page Email</label>
                                        <input class="w-full bg-[#FBFBFB] px-4 border border-[#E3E3E3] py-3 text-base font-normal text-gray-800 placeholder-[#AFAFAF] rounded-md bg-gray-light focus:outline-none" type="text" name="email" placeholder="Page Email">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="w-full flex flex-col gap-y-2 gap-x-4">
                                    <div class="w-full">
                                        <label class="inline-block py-2 text-xl font-bold text-black dark:text-white" for="first name">Page Phone</label>
                                        <input class="w-full bg-[#FBFBFB] px-4 border border-[#E3E3E3] py-3 text-base font-normal text-gray-800 placeholder-[#AFAFAF] rounded-md bg-gray-light focus:outline-none" type="number" name="phone" placeholder="Page Phone">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="w-full flex flex-col gap-y-2 gap-x-4">
                                    <div class="w-full">
                                        <label class="inline-block py-2 text-xl font-bold text-black dark:text-white" for="first name">Page Address</label>
                                        <input class="w-full bg-[#FBFBFB] px-4 border border-[#E3E3E3] py-3 text-base font-normal text-gray-800 placeholder-[#AFAFAF] rounded-md bg-gray-light focus:outline-none" type="text" name="address" placeholder="Page Address">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="w-full flex flex-col gap-y-2 gap-x-4">
                                    <div class="w-full">
                                        <label class="inline-block py-2 text-xl font-bold text-black dark:text-white" for="first name">City</label>
                                        <input class="w-full bg-[#FBFBFB] px-4 border border-[#E3E3E3] py-3 text-base font-normal text-gray-800 placeholder-[#AFAFAF] rounded-md bg-gray-light focus:outline-none" type="text" name="city" placeholder="City Name">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="w-full flex flex-col gap-y-2 gap-x-4">
                                    <div class="w-full">
                                        <label class="inline-block py-2 text-xl font-bold text-black dark:text-white" for="first name">Website Link</label>
                                        <input class="w-full bg-[#FBFBFB] px-4 border border-[#E3E3E3] py-3 text-base font-normal text-gray-800 placeholder-[#AFAFAF] rounded-md bg-gray-light focus:outline-none" type="text" name="website_link" placeholder="Website Link">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="text-xl font-bold mb-2 text-black dark:text-white">Description</p>
                                <textarea class="w-full px-3 py-3 pr-10 text-gray-800 bg-[#FBFBFB] border border-[#E3E3E3] rounded-md appearance-none bg-gray-light focus:outline-none" name="short_description" id="" cols="3" rows="6" placeholder="Description"></textarea>
                            </div>
                            <div>
                                <div class="flex flex-col md:flex-row justify-between items-center gap-x-4">
                                    <div class="w-full">
                                        <p class="text-2xl font-bold mb-2 text-black dark:text-white">Page Category</p>
                                        <div class="relative inline-flex w-full">
                                            <svg class="absolute text-black dark:text-black w-4 h-4 -translate-y-1/2 pointer-events-none right-4 top-1/2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                            <select class="w-full dark:text-black cursor-pointer py-2 h-12 pl-5 pr-10 text-gray-800 bg-[#FBFBFB] border border-[#E3E3E3] rounded-md appearance-none bg-gray-light focus:outline-none">
                                                <option value="Friends" selected>Friends</option>
                                                <option value="Family">Family</option>
                                                <option value="Games">Games</option>
                                                <option value="Tours">Tours</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row justify-end gap-2 sm:p-2 mt-2">
                                <div class="flex gap-2 text-dark">
                                    <button type="submit" class=" sm:px-8 w-full text-center py-3 rounded-lg bg-[#38aa40] font-medium hover:bg-green-600 transition-all text-white border cursor-pointer">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        // for cover photo
        let nophoto =
            "https://ami-sni.com/wp-content/themes/consultix/images/no-image-found-360x250.png";
        function readURL2(input) {
            console.log(input.files);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#img-preview-cover").attr("src", e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                $("#img-preview-cover").attr("src", nophoto);
            }
        }

        // profile pic js
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });

    </script>
@endsection
