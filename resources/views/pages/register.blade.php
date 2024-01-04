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
    <link rel="stylesheet" href="{{asset('design/css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('design/css/style.css')}}">
</head>
<body>



<!-- component -->
<div class="px-6 lg:px-20 py-5 lg:h-screen w-screen flex flex-col-reverse md:flex-row items-center justify-center mb-10">
    <div class="content text-3xl text-center md:text-left">
        <h1 class="text-7xl text-[#62BB46] font-bold">Metali</h1>
        <p class="mt-4">Connect with friends and the world around you on Metali.</p>
    </div>
    <div class="container mx-auto flex flex-col items-center">
        <form method="post" action="{{route('user.register.store')}}" class="shadow-xl drop-shadow-2xl w-80 sm:w-[28rem] p-4 flex flex-col bg-white dark:bg-black text-black dark:text-white rounded-lg">
            @csrf
            <input type="text" placeholder="First Name" name="first_name" class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-[#62BB46] dark:text-black"/>
            @error('first_name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
            <input type="text" placeholder="Last Name" name="last_name" class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-[#62BB46] dark:text-black"/>
            @error('last_name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
            <input type="text" placeholder="Email Address or Mobile Number" name="email" class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-[#62BB46] dark:text-black"/>
            @error('email')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
            <input type="password" placeholder="Password" name="password" class="mb-3 py-3 px-4 border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-[#62BB46] dark:text-black"/>
            @error('password')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
            <div class="mb-3">
                <div class="text-black text-sm dark:text-white">Gender</div>
                <div class="flex flex-wrap sm:flex-nowrap gap-y-2 gap-x-2 mt-0.5">
                    <label class="w-full py-2 px-4 bg-white border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-[#62BB46] cursor-pointer">
                        <div class="inline-flex items-center">
                            <input type="radio" value="Male" name="gender" class="w-4 h-4 text-teal-600 form-radio cursor-pointer" checked><span class="ml-3 text-gray-600">Male</span>
                        </div>
                    </label>
                    <label class="w-full py-2 px-4 bg-white border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-[#62BB46] cursor-pointer">
                        <div class="inline-flex items-center">
                            <input type="radio" value="Female" name="gender" class="w-4 h-4 text-teal-600 form-radio cursor-pointer" checked><span class="ml-3 text-gray-600">Female</span>
                        </div>
                    </label>
                    <label class="w-full py-2 px-4 bg-white border border-gray-400 focus:outline-none rounded-md focus:ring-1 ring-[#62BB46] cursor-pointer">
                        <div class="inline-flex items-center">
                            <input type="radio" value="Other" name="gender" class="w-4 h-4 text-teal-600 form-radio cursor-pointer" checked><span class="ml-3 text-gray-600">Other</span>
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
            <button type="submit" class="w-full bg-[#0d4600] hover:bg-[#115300] transition-all mt-8 mb-4 text-white p-3 rounded-lg font-semibold text-lg">Sign Up</button>
            <a href="{{route('user.login')}}" class="hover:underline hover:underline-offset-1 text-center my-2 text-[#62BB46]">Already have an account?</a>
        </form>
    </div>
</div>
</body>
</html>
