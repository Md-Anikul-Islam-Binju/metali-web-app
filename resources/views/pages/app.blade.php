<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
          integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('design/css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('design/css/style.css')}}">
</head>

<body class="font-sans leading-none mb-8">

<!-- Navbar Start -->
<nav id="header" class="fixed z-30 w-full mt-0 bg-[#176D1F] py-1">
    <div class="lg:container flex flex-wrap items-center justify-between w-full py-1 px-1 sm:px-3 2xl:px-8 mx-auto mt-0 transition duration-700 ease-in-out transform">
        <div class="flex items-center gap-x-4 pl-6 sm:pl-2">
            <a href="{{route('timeline')}}">
                <img width="130" src="{{URL::to('design/images/logo.png')}}" alt="" srcset="">
            </a>
            <div class="relative w-full lg:block hidden">
                <i class="absolute fas fa-search text-gray-500 top-2.5 left-5 text-base"></i>
                <input type="text" class="bg-white text-[#6B7280] h-10 px-12 w-full rounded-[30px] focus:outline-none placeholder:text-[#6B7280] placeholder:font-medium placeholder:text-[14px]" placeholder="Search Metali" name="">
            </div>
        </div>
        @php
            $authUser = Auth::user();
        @endphp
        <!-- for mobile menu start -->
        <div class="flex gap-x-3 items-center">
            <div class="relative mr-0 block lg:hidden" data-te-dropdown-ref>

                <div class="flex items-center hidden-arrow bg-white rounded-full" id="dropdownMenuButton1" data-te-dropdown-toggle-ref aria-expanded="false" data-te-ripple-init data-te-ripple-color="light">
                    @if($authUser->profile_photo!=null)
                        <img src="{{asset('/storage/profile_photos/'.$authUser->profile_photo)}}" class="w-8 h-8 md:w-10 md:h-10 rounded-full shadow-lg" alt="">
                    @else
                        <img src="{{URL::to('defult/profile.jpeg')}}" class="w-8 h-8 md:w-10 md:h-10 rounded-full shadow-lg" alt="">
                    @endif
                </div>
                <div class="absolute left-auto z-50 hidden float-left m-0 mt-0 overflow-hidden text-base text-left list-none bg-white border-none rounded-lg shadow-lg -right-20 md:right-0 dropdown-menu min-w-max bg-clip-padding [&[data-te-dropdown-show]]:block" aria-labelledby="dropdownMenuButton1" data-te-dropdown-menu-ref>
                    <ul class="p-2">
                        <li class="mt-0.5">
                            <a  class="block min-w-[8rem] text-center text-black w-full px-2 py-2 text-[14px] font-medium bg-white rounded-md dropdown-item whitespace-nowrap transition-all hover:text-white hover:bg-[#62BB46]" href="{{route('timeline')}}" data-te-dropdown-item-ref>Home</a>
                        </li>
                        <li class="mt-0.5">
                            <a  class="block min-w-[8rem] text-center text-black w-full px-2 py-2 text-[14px] font-medium bg-white rounded-md dropdown-item whitespace-nowrap transition-all hover:text-white hover:bg-[#62BB46]" href="{{route('profile')}}" data-te-dropdown-item-ref>My Profile</a>
                        </li>
                        <li class="mt-0.5">
                            <form id="logoutForm" action="{{ route('user.logout') }}" method="post">
                                @csrf
                                <button type="submit" class="hidden"></button>
                            </form>

                            <a
                                class="block min-w-[8rem] text-black w-full text-center px-2 py-2 text-[14px] font-medium bg-white rounded-md dropdown-item whitespace-nowrap transition-all hover:text-white hover:bg-[#62BB46]"
                                href="#" data-te-dropdown-item-ref
                                onclick="event.preventDefault(); document.getElementById('logoutForm').submit();"
                            >
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>



        </div>
        <!-- for mobile menu end -->

        <div class="z-20 flex-grow hidden w-full bg__primary overflow-hidden p-0 mt-4 lg:flex lg:items-center lg:w-auto lg:mt-0 lg:p-0"
             id="nav-content">
            <div class="w-full divide-y divide-y-gray-100 lg:divide-y-0 flex justify-end lg:items-center flex-col ml-0 lg:ml-[3rem] 2xl:ml-[40rem] lg:flex-row gap-x-0 gap-y-4 lg:gap-y-0 lg:mr-[2rem] lg:gap-x-4 justify-left">
                <div class="menu-item">
                    <div class="inline-block px-6 py-0.5 pt-3 lg:pt-0 text-[14px] text-white font-medium lg:font-bold no-underline lg:px-4 xl:px-3">
                        <a href="{{route('timeline')}}" class="active-item">Home</a>
                    </div>
                </div>
                <div class="relative w-full block lg:hidden">
                    <i class="absolute fas fa-search text-gray-500 top-2.5 left-5 text-base"></i>
                    <input type="text" class="bg-white text-[#6B7280] h-10 px-12 w-full rounded-[30px] focus:outline-none placeholder:text-[#6B7280] placeholder:font-medium placeholder:text-[14px]" placeholder="Search Metali" name="">
                </div>
            </div>
        </div>
        @php
            $authUser = Auth::user();
        @endphp

        <div class="relative mr-2 hidden lg:block cursor-pointer" data-te-dropdown-ref>
            <div class="flex items-center bg-white rounded-full" id="dropdownMenuButton1" data-te-dropdown-toggle-ref aria-expanded="false" data-te-ripple-init data-te-ripple-color="light">
                @if($authUser->profile_photo!=null)
                 <img src="{{asset('/storage/profile_photos/'.$authUser->profile_photo)}}" class="w-8 h-8 md:w-10 md:h-10 rounded-full shadow-lg" alt="">
                @else
                    <img src="{{URL::to('defult/profile.jpeg')}}" class="w-8 h-8 md:w-10 md:h-10 rounded-full shadow-lg" alt="">
                @endif
            </div>
            <div class="absolute left-auto z-50 hidden float-left top-10 overflow-hidden text-base text-left list-none bg-white border-none rounded-lg shadow-lg -right-20 md:-right-80 dropdown-menu min-w-max bg-clip-padding [&[data-te-dropdown-show]]:block" aria-labelledby="dropdownMenuButton1" data-te-dropdown-menu-ref>
                <ul class="p-2">
                    <li class="mt-0.5">
                        <a class="block min-w-[8rem] text-black text-center w-full px-2 py-2 text-[14px] font-medium bg-white rounded-md dropdown-item whitespace-nowrap transition-all hover:text-white hover:bg-[#62BB46]" href="{{route('profile')}}" data-te-dropdown-item-ref>My Profile</a>
                    </li>
                    <li class="mt-0.5">
                        <form id="logoutForm" action="{{ route('user.logout') }}" method="post">
                            @csrf
                            <button type="submit" class="hidden"></button>
                        </form>

                        <a
                            class="block min-w-[8rem] text-black w-full text-center px-2 py-2 text-[14px] font-medium bg-white rounded-md dropdown-item whitespace-nowrap transition-all hover:text-white hover:bg-[#62BB46]"
                            href="#" data-te-dropdown-item-ref
                            onclick="event.preventDefault(); document.getElementById('logoutForm').submit();"
                        >
                            Logout
                        </a>
                    </li>

                </ul>
            </div>
        </div>

    </div>
</nav>
<!-- Navbar End -->


<section class="lg:container pt-14 mx-auto px-3 lg:px-20  mb-10">
  @yield('content')
</section>
<!-- mid section end -->

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
                <!--Modal title-->
                <h5
                    class="text-2xl font-bold leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Create Post
                </h5>
                <!--Close button-->
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
        </div>
    </div>
</div>
</div>
<!-- modal end-->

<!-- Script Start -->

<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('design/js/script.js')}}"></script>
<script>
    var menuItems = document.getElementsByClassName("menu-item");
    for (var i = 0; i < menuItems.length; i++) {
        menuItems[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active-item");
            current[0].classList.remove('active-item');
            this.getElementsByTagName('a')[0].classList.add('active-item');
        });
    }
</script>
<script>

    //Change this to your no-image file
    let noimage =
        "https://ami-sni.com/wp-content/themes/consultix/images/no-image-found-360x250.png";

    function readURL(input) {
        console.log(input.files);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#img-preview").attr("src", e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            $("#img-preview").attr("src", noimage);
        }
    }

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



    // image upload
    jQuery(document).ready(function () {
        ImgUpload();
    });

    function ImgUpload() {
        var imgWrap = "";
        var imgArray = [];

        $('.upload__inputfile').each(function () {
            $(this).on('change', function (e) {
                imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                var maxLength = $(this).attr('data-max_length');

                var files = e.target.files;
                var filesArr = Array.prototype.slice.call(files);
                var iterator = 0;
                filesArr.forEach(function (f, index) {

                    if (!f.type.match('image.*')) {
                        return;
                    }

                    if (imgArray.length > maxLength) {
                        return false
                    } else {
                        var len = 0;
                        for (var i = 0; i < imgArray.length; i++) {
                            if (imgArray[i] !== undefined) {
                                len++;
                            }
                        }
                        if (len > maxLength) {
                            return false;
                        } else {
                            imgArray.push(f);

                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                imgWrap.append(html);
                                iterator++;
                            }
                            reader.readAsDataURL(f);
                        }
                    }
                });
            });
        });

        $('body').on('click', ".upload__img-close", function (e) {
            var file = $(this).parent().data("file");
            for (var i = 0; i < imgArray.length; i++) {
                if (imgArray[i].name === file) {
                    imgArray.splice(i, 1);
                    break;
                }
            }
            $(this).parent().parent().remove();
        });
    }


    // vedio upload
    const input = document.getElementById('file-input');
    const video = document.getElementById('video');
    const videoSource = document.createElement('source');
    input.addEventListener('change', function() {
        const files = this.files || [];

        if (!files.length) return;

        const reader = new FileReader();

        reader.onload = function (e) {
            videoSource.setAttribute('src', e.target.result);
            video.appendChild(videoSource);
            video.load();
            video.play();
        };

        reader.onprogress = function (e) {
            console.log('progress: ', Math.round((e.loaded * 100) / e.total));
        };

        reader.readAsDataURL(files[0]);
    });

</script>

<!-- sidebar js -->
<script type="text/javascript">
    function dropdown() {
        document.querySelector("#submenu").classList.toggle("hidden");
        document.querySelector("#arrow").classList.toggle("rotate-0");
    }
    dropdown();

    function openSidebar() {
        document.querySelector(".sidebar").classList.toggle("hidden");
    }
</script>

<!-- Script End -->
</body>

</html>
