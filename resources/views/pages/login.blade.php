<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
          integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('design/css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('design/css/style.css')}}">
    <style>
        .password-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .eye-icon-container {
            position: absolute;
            right: 30px; /* Adjust the value based on your layout */
            top: 35%;
            transform: translateY(-50%);
        }

        .eye-icon {
            cursor: pointer;
        }
    </style>

</head>
<body>



<!-- component -->
<div class="px-6 md:px-20 py-5 h-screen w-screen flex flex-col lg:flex-row items-center justify-center gap-y-8">
    <div class="content text-3xl text-center lg:text-left">
        <h1 class="text-7xl text-[#62BB46] font-bold">Metali</h1>
        <p class="mt-4">Connect with friends and the world around you on Metali.</p>
    </div>
    <div class="container mx-auto flex flex-col items-center">
        <form method="post" action="{{route('user.login.submit')}}" class="shadow-xl bg-white dark:bg-black text-black dark:text-white drop-shadow-2xl w-80 sm:w-[28rem] p-4 flex flex-col rounded-lg">
            @csrf
            <input type="text" name="login_identifier" id="login_identifier" value="{{ old('login_identifier') }}" required placeholder="Email or Phone Number" class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-[#62BB46] dark:text-black"/>
            @error('login_identifier')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <input type="password" name="password" id="password" required placeholder="Enter your Password" class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-[#62BB46] dark:text-black"/>
            <div class="eye-icon-container">
                <button type="button" id="togglePassword" class="eye-icon"><i class="far fa-eye"></i></button>
            </div>

            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <button type="submit" class="w-full bg-[#0d4600] hover:bg-[#115300] transition-all mt-8 mb-4 text-white p-3 rounded-lg font-semibold text-lg">Login</button>
{{--            <a href="#" class="hover:underline hover:underline-offset-1 text-center my-2 text-[#62BB46]">Forgot Pasword?</a>--}}
            <hr />
            <a href="{{route('user.register')}}" class="hover:underline hover:underline-offset-1 text-center my-2 text-[#62BB46]">Create New Account?</a>

        </form>



    </div>

</div>

<div class="px-6 md:px-20 text-sm text-gray-600 mb-4">
    <div class="">
            <span class="flex gap-x-4 text-sm">
                <ul class="flex gap-x-2 flex-wrap">
                    <li class="language_select dark:text-white"><a href="?lang=english" rel="nofollow" class="English">English</a></li>
                    <li class="language_select dark:text-white"><a href="?lang=arabic" rel="nofollow" class="Arabic">Arabic</a></li>
                    <li class="language_select dark:text-white"><a href="?lang=dutch" rel="nofollow" class="Dutch">Dutch</a></li>
                    <li class="language_select dark:text-white"><a href="?lang=french" rel="nofollow" class="French">French</a></li>
                    <li class="language_select dark:text-white"><a href="?lang=german" rel="nofollow" class="German">German</a></li>
                    <li class="language_select dark:text-white"><a href="?lang=italian" rel="nofollow" class="Italian">Italian</a></li>
                    <li class="language_select dark:text-white"><a href="?lang=portuguese" rel="nofollow" class="Portuguese">Portuguese</a></li>
                    <li class="language_select dark:text-white"><a href="?lang=russian" rel="nofollow" class="Russian">Russian</a></li>
                    <li class="language_select dark:text-white"><a href="?lang=spanish" rel="nofollow" class="Spanish">Spanish</a></li>
                    <li class="language_select dark:text-white"><a href="?lang=turkish" rel="nofollow" class="Turkish">Turkish</a></li>
                </ul>
                <div class="relative" data-te-dropdown-position="dropup">
                    <button
                        class="flex items-center whitespace-nowrap leading-normal transition duration-150 ease-in-out focus:outline-none focus:ring-0 motion-reduce:transition-none dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                        type="button"
                        id="dropdownMenuButton1u"
                        data-te-dropdown-toggle-ref
                        aria-expanded="false"
                        data-te-ripple-init
                        data-te-ripple-color="light">
                      <span class="bg-gray-200 px-1.5">
                        <i class="fas fa-plus text-gray-300 dark:text-black text-xs"></i>
                      </span>
                    </button>
                    <ul
                        class="absolute z-[1000] float-left m-0 w-44 drop-shadow-2xl hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
                        aria-labelledby="dropdownMenuButton1u"
                        data-te-dropdown-menu-ref>
                        <li>
                            <a
                                class="block w-full whitespace-nowrap bg-transparent px-4 py-1 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                href="#"
                                data-te-dropdown-item-ref
                            >English</a
                            >
                        </li>
                        <li>
                            <a
                                class="block w-full whitespace-nowrap bg-transparent px-4 py-1 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                href="#"
                                data-te-dropdown-item-ref
                            >Arabic</a
                            >
                        </li>
                        <li>
                            <a
                                class="block w-full whitespace-nowrap bg-transparent px-4 py-1 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                href="#"
                                data-te-dropdown-item-ref
                            >Dutch</a
                            >
                        </li>
                        <li>
                            <a
                                class="block w-full whitespace-nowrap bg-transparent px-4 py-1 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                href="#"
                                data-te-dropdown-item-ref
                            >German</a
                            >
                        </li>
                        <li>
                            <a
                                class="block w-full whitespace-nowrap bg-transparent px-4 py-1 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                href="#"
                                data-te-dropdown-item-ref
                            >Portuguese</a
                            >
                        </li>
                    </ul>
                  </div>
            </span>
        <div class="border-b border-gray-200 mt-2.5"></div>
        <div class="flex gap-x-5 flex-wrap mt-3">
            <a class="dark:text-white">Terms of Use</a>
            <a class="dark:text-white">Privacy Policy</a>
            <a class="dark:text-white">Contact Us</a>
            <a class="dark:text-white">About</a>
            <a class="dark:text-white">Blog</a>
        </div>
    </div>
    <div class="dark:text-white mt-4">© 2023 metali</div>
    <div class="clearfix"></div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const passwordInput = document.getElementById("password");
        const togglePasswordButton = document.getElementById("togglePassword");

        togglePasswordButton.addEventListener("click", function () {
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);

            // Toggle eye icon based on password visibility
            const eyeIcon = togglePasswordButton.querySelector("i");
            eyeIcon.classList.toggle("fa-eye-slash", type === "text");
        });
    });
</script>

</body>
</html>
