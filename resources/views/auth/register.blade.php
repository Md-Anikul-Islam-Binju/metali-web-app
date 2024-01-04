<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
          integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/theme.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>



<!-- component -->
<div class="px-6 lg:px-20 py-5 h-screen w-screen flex flex-col-reverse md:flex-row items-center justify-center mb-10">
    <div class="content text-3xl text-center md:text-left">
        <h1 class="text-7xl text-[#62BB46] font-bold">Metali</h1>
        <p class="mt-4">Connect with friends and the world around you on Metali.</p>
    </div>
    <div class="container mx-auto flex flex-col items-center">
        <form class="shadow-xl drop-shadow-2xl w-80 sm:w-[28rem] p-4 flex flex-col bg-white dark:bg-black text-black dark:text-white rounded-lg">
            <input type="text" placeholder="First Name" class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-[#62BB46] dark:text-black"/>
            <input type="text" placeholder="Last Name" class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-[#62BB46] dark:text-black"/>
            <input type="text" placeholder="Email Address or Mobile Number" class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-[#62BB46] dark:text-black"/>
            <input type="text" placeholder="Password" class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-[#62BB46] dark:text-black"/>
            <div class="mb-3">
                <div class="text-black text-sm dark:text-white">Gender</div>
                <div class="flex flex-wrap sm:flex-nowrap gap-y-2 gap-x-2 mt-0.5">
                    <label class="w-full py-2 px-4 bg-white border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-[#62BB46] cursor-pointer">
                        <div class="inline-flex items-center">
                            <input type="radio" name="radio" class="w-4 h-4 text-teal-600 form-radio cursor-pointer" checked><span class="ml-3 text-gray-600">Male</span>
                        </div>
                    </label>
                    <label class="w-full py-2 px-4 bg-white border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-[#62BB46] cursor-pointer">
                        <div class="inline-flex items-center">
                            <input type="radio" name="radio" class="w-4 h-4 text-teal-600 form-radio cursor-pointer" checked><span class="ml-3 text-gray-600">Female</span>
                        </div>
                    </label>
                    <label class="w-full py-2 px-4 bg-white border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-[#62BB46] cursor-pointer">
                        <div class="inline-flex items-center">
                            <input type="radio" name="radio" class="w-4 h-4 text-teal-600 form-radio cursor-pointer" checked><span class="ml-3 text-gray-600">Other</span>
                        </div>
                    </label>
                </div>
            </div>
            <div class="flex mb-3">
                <label class="flex items-start cursor-pointer">
                    <input type="checkbox" class="w-5 h-5 form-checkbox transition-all cursor-pointer">
                    <span class="ml-4 text-sm font-light text-black dark:text-white">By creating your account, you agree to our <span class="text-[#62BB46] hover:underline hover:underline-offset-1 cursor-pointer font-medium"> Terms of Use</span>   &   <span class="text-[#62BB46] hover:underline hover:underline-offset-1 cursor-pointer font-medium"> Privacy Policy </span></span>
                </label>
            </div>
            <button class="w-full bg-[#62BB46] text-white p-3 rounded-lg font-semibold text-lg">Sign Up</button>
            <a href="#" class="hover:underline hover:underline-offset-1 text-center my-2 text-[#62BB46]">Already have an account?</a>
        </form>
    </div>
</div>
</body>
</html>
