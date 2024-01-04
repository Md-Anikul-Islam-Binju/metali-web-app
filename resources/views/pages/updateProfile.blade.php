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
    <section class=" flex items-center justify-center">
        <div class="bg-gray-100 dark:bg-black text-black dark:text-white rounded md:w-8/12 p-1">
            <div class="p-2">
                <h3 class="pt-1 pb-8 text-[#38aa40] text-center text-4xl font-bold">Edit Profile</h3>
                <hr>
                <form action="{{route('profile.update.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-y-5 mt-4">
                    <div class="container">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input  type='file' name="profile_photo" id="imageUpload" accept=".png, .jpg, .jpeg" />
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
                    <input hidden name="id" value="{{$authUser->id}}">
                    <div>
                        <p class="text-2xl font-bold text-black dark:text-white mb-2">Cover Photo</p>
                        <div class="w-full flex flex-col sm:flex-row gap-2 items-center gap-x-8">
                            <div class="w-full md:w-4/12">
                                <input name="cover_photo" class="w-full text-black dark:text-black bg-[#FBFBFB] px-2 border border-[#E3E3E3] py-3 rounded-md bg-gray-light focus:outline-none" type="file" accept="image/*" onchange="readURL2(this)" />
                            </div>
                            <div class="w-full md:w-8/12 border rounded-lg bg-contain flex items-center justify-center overflow-hidden bg-no-repeat">
                                <img class="h-full bg-cover w-full" src="https://www.wezen.com/wp-content/themes/applounge/assets/images/no-image/No-Image-Found-400x264.png" id="img-preview-cover" style="height: 190px;"/>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-black dark:text-white">Basic Info</p>
                        <div class="w-full flex flex-col gap-y-2 gap-x-4">
                            <div class="w-full">
                                <label class="inline-block p-2 text-base text-black dark:text-white" for="first name">First Name</label>
                                <input class="w-full bg-[#FBFBFB] px-4 border border-[#E3E3E3] py-3 text-base font-normal text-gray-800 placeholder-[#AFAFAF] rounded-md bg-gray-light focus:outline-none" type="text" name="first_name" value="{{$authUser->first_name}}">
                            </div>
                            <div class="w-full">
                                <label class="inline-block p-2 text-base text-black dark:text-white" for="first name">Last Name</label>
                                <input class="w-full bg-[#FBFBFB] px-4 border border-[#E3E3E3] py-3 text-base font-normal text-gray-800 placeholder-[#AFAFAF] rounded-md bg-gray-light focus:outline-none" type="text" name="last_name" value="{{$authUser->last_name}}">
                            </div>
                            <div class="w-full">
                                <label class="inline-block p-2 text-base text-black dark:text-white" for="Email">Email</label>
                                <input class="w-full bg-[#FBFBFB] px-4 border border-[#E3E3E3] py-3 text-base font-normal text-gray-800 placeholder-[#AFAFAF] rounded-md bg-gray-light focus:outline-none" type="email" name="email" value="{{$authUser->email}}">
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-y-2 gap-x-4">
                            <div class="w-full mt-2">
                                <label class="inline-block p-2 text-base text-black dark:text-white" for="Phone Number">Phone Number</label>
                                <input class="w-full bg-[#FBFBFB] px-4 border border-[#E3E3E3] py-3 text-base font-normal text-gray-800 placeholder-[#AFAFAF] rounded-md bg-gray-light focus:outline-none" type="number" placeholder="Phone Number" name="phone" required value="{{$authUser->phone}}">
                            </div>
                            <div class="w-full">
                                <label class="inline-block p-2 text-base text-black dark:text-white" for="Gender">Gender</label>
                                <div class="relative inline-flex w-full">
                                    <svg class="text-black dark:text-black absolute w-4 h-4 -translate-y-1/2 pointer-events-none right-4 top-1/2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                    <select name="gender" required class="w-full dark:text-black py-3 cursor-pointer h-12 pl-5 pr-10 text-gray-800 bg-[#FBFBFB] border border-[#E3E3E3] rounded-md appearance-none bg-gray-light focus:outline-none">
                                        <option selected value="{{$authUser->gender}}">{{$authUser->gender}}</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-2xl font-bold mb-2 text-black dark:text-white">Bio</p>
                        <textarea required class="w-full px-3 py-3 pr-10 text-gray-800 bg-[#FBFBFB] border border-[#E3E3E3] rounded-md appearance-none bg-gray-light focus:outline-none" name="short_bio" id="" cols="3" rows="3"  placeholder="Describe who you are">{{$authUser->short_bio}}</textarea>
                    </div>
                    <div>
                        <div class="flex flex-col justify-between gap-x-4">
                            <div class="w-full">
                                <p class="text-2xl font-bold mb-2 text-black dark:text-white">Address</p>
                                <textarea required placeholder="Address" class="w-full px-3 py-3 pr-10 text-gray-800 bg-[#FBFBFB] border border-[#E3E3E3] rounded-md appearance-none bg-gray-light focus:outline-none" name="address" id="" cols="5" rows="5">{{$authUser->address}}</textarea>
                            </div>
                            <div class="w-full">
                                <p class="text-2xl mt-5 font-bold mb-2 text-black dark:text-white">Relationship</p>
                                <div class="relative inline-flex w-full">
                                    <svg class="absolute text-black dark:text-black w-4 h-4 -translate-y-1/2 pointer-events-none right-4 top-1/2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                    <select required name="relation_status" class="w-full dark:text-black cursor-pointer py-2 h-12 pl-5 pr-10 text-gray-800 bg-[#FBFBFB] border border-[#E3E3E3] rounded-md appearance-none bg-gray-light focus:outline-none">
                                        <option selected value="{{$authUser->relation_status}}">{{$authUser->relation_status}}</option>
                                        <option value="Married">Married</option>
                                        <option value="Single">Single</option>
                                        <option value="Other">Other</option>
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
            <hr>

            <div class="mt-3 mb-5">
                <p class="text-2xl mt-5 font-bold mb-2 text-black dark:text-white">Customize your intro</p>
                <div class="flex flex-wrap gap-y-4 items-center gap-x-4 mt-5">
                    <button
                        type="button"
                        class="inline-block bg-[#38aa40] rounded w-full sm:w-40 py-3 pb-2 pt-2.5 text-sm font-bold uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                        data-te-toggle="modal"
                        data-te-target="#exampleModalCenter1"
                        data-te-ripple-init
                        data-te-ripple-color="light">
                        Education
                    </button>
                    <button
                        type="button"
                        class="inline-block bg-[#38aa40] rounded w-full sm:w-40 py-3 pb-2 pt-2.5 text-sm font-bold uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                        data-te-toggle="modal"
                        data-te-target="#exampleModalCenter2"
                        data-te-ripple-init
                        data-te-ripple-color="light">
                        Work
                    </button>
                    <button
                        type="button"
                        class="inline-block bg-[#38aa40] rounded w-full sm:w-40 py-3 pb-2 pt-2.5 text-sm font-bold uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                        data-te-toggle="modal"
                        data-te-target="#exampleModalCenter3"
                        data-te-ripple-init
                        data-te-ripple-color="light">
                        Social Network
                    </button>
                </div>
            </div>
        </div>
    </section>


    <!-- Education modal  start-->
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
            <form method="post" action="{{route('education.store')}}">
                @csrf
            <div
                class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                <div
                    class="flex flex-shrink-0 items-center justify-between rounded-t-md border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <h5
                        class="text-2xl font-bold leading-normal text-neutral-800 dark:text-neutral-200"
                        id="exampleModalLabel">
                        Education
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
                <div data-te-modal-body-ref class="relative p-4">
                    <div class="w-full">
                        <input type="text" name="institute_name" class="w-full bg-[#FBFBFB] px-4 border border-[#E3E3E3] py-3 text-base font-normal text-gray-800 placeholder-[#AFAFAF] rounded-md bg-gray-light focus:outline-none" placeholder="Enter Institute Name">
                        <input  type="text" name="degree_name" class="w-full mt-5 bg-[#FBFBFB] px-4 border border-[#E3E3E3] py-3 text-base font-normal text-gray-800 placeholder-[#AFAFAF] rounded-md bg-gray-light focus:outline-none" placeholder="Enter Degree Name">
                        <input type="text" name="passing_year" class="w-full mt-5 bg-[#FBFBFB] px-4 border border-[#E3E3E3] py-3 text-base font-normal text-gray-800 placeholder-[#AFAFAF] rounded-md bg-gray-light focus:outline-none"  placeholder="Enter Passing Year">
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row justify-end gap-2 p-4 mt-2">
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

    <!-- work modal start-->
    <div
        data-te-modal-init
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="exampleModalCenter2"
        data-te-backdrop="static"
        tabindex="-1"
        aria-labelledby="exampleModalCenterTitle"
        aria-modal="true"
        role="dialog">
        <div
            data-te-modal-dialog-ref
            class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
            <form action="{{route('designation.store')}}" method="post">
            @csrf
            <div
                class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                <div
                    class="flex flex-shrink-0 items-center justify-between rounded-t-md border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <h5
                        class="text-2xl font-bold leading-normal text-neutral-800 dark:text-neutral-200"
                        id="exampleModalLabel">
                        Work
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
                <div data-te-modal-body-ref class="relative p-4">
                    <div class="w-full">
                        <input class="w-full bg-[#FBFBFB] px-4 border border-[#E3E3E3] py-3 text-base font-normal text-gray-800 placeholder-[#AFAFAF] rounded-md bg-gray-light focus:outline-none" type="text" name="job_title" placeholder="Enter Job Title">
                        <input class="w-full mt-5 bg-[#FBFBFB] px-4 border border-[#E3E3E3] py-3 text-base font-normal text-gray-800 placeholder-[#AFAFAF] rounded-md bg-gray-light focus:outline-none" type="text" name="company_name" placeholder="Enter Company Name">
                        <input class="w-full mt-5 bg-[#FBFBFB] px-4 border border-[#E3E3E3] py-3 text-base font-normal text-gray-800 placeholder-[#AFAFAF] rounded-md bg-gray-light focus:outline-none" type="text" name="short_description" placeholder="Enter Short Info About Company and your role">
                        <input class="w-full mt-5 bg-[#FBFBFB] px-4 border border-[#E3E3E3] py-3 text-base font-normal text-gray-800 placeholder-[#AFAFAF] rounded-md bg-gray-light focus:outline-none" type="date" name="start_date" placeholder="Enter Job Start Date">
                        <input class="w-full mt-5 bg-[#FBFBFB] px-4 border border-[#E3E3E3] py-3 text-base font-normal text-gray-800 placeholder-[#AFAFAF] rounded-md bg-gray-light focus:outline-none" type="date" name="end_date" placeholder="Enter Job End Date">
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row justify-end gap-2 p-4 mt-2">
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
    <!-- work modal end-->

    <!-- social network modal start-->
    <div data-te-modal-init
         class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
         id="exampleModalCenter3"
         data-te-backdrop="static"
         tabindex="-1"
         aria-labelledby="exampleModalCenterTitle"
         aria-modal="true"
         role="dialog">
        <div
            data-te-modal-dialog-ref
            class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
            <form method="post" action="{{route(('link.store'))}}">
                @csrf
            <div
                class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                <div
                    class="flex flex-shrink-0 items-center justify-between rounded-t-md border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <!--Modal title-->
                    <h5
                        class="text-2xl font-bold leading-normal text-neutral-800 dark:text-neutral-200"
                        id="exampleModalLabel">
                        Social Network
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

                <!--Modal body-->
                <div data-te-modal-body-ref class="relative p-4">
                    <div class="w-full">
                        <div class="w-full mt-5 bg-[#FBFBFB] px-4 border border-[#E3E3E3] py-3 text-base font-normal text-gray-800 placeholder-[#AFAFAF] rounded-md bg-gray-light focus:outline-none">
                            <select name="type" id="type">
                                <option selected>Select Link Type</option>
                                <option value="Facebook">Facebook</option>
                                <option value="Linkedin">Linkedin</option>
                                <option value="Instagram">Instagram</option>
                            </select>
                        </div>
                       <input class="w-full mt-5 bg-[#FBFBFB] px-4 border border-[#E3E3E3] py-3 text-base font-normal text-gray-800 placeholder-[#AFAFAF] rounded-md bg-gray-light focus:outline-none" type="text" name="link" placeholder="Enter Your Link">
                    </div>
                </div>

                <!-- save button start -->
                <div class="flex flex-col sm:flex-row justify-end gap-2 p-4 mt-2">
                    <div class="flex gap-2 text-dark">
                        <button type="submit" class=" sm:px-8 w-full text-center py-3 rounded-lg bg-[#38aa40] font-medium hover:bg-green-600 transition-all text-white border cursor-pointer">
                           Save
                        </button>
                    </div>
                </div>
                <!-- save button end -->
            </div>
            </form>
        </div>
    </div>
    </div>
    <!-- social network modal start-->
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
