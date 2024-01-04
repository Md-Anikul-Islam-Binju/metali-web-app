
<link rel="stylesheet" href="{{asset('design/chat/css/bundle.css')}}">
<link rel="stylesheet" href="{{asset('design/chat/css/app.css')}}">
<style>
    a.tyn-logo img {
        height: 25px;
    }
</style>

<div class="tyn-root">
    <nav class="tyn-appbar">
        <div class="tyn-appbar-wrap">
            <div class="tyn-appbar-logo">
                <a class="tyn-logo" href="{{route('timeline')}}">
                    <img src="{{URL::to('design/images/logo.png')}}" alt="">
                </a>
            </div>
            <div class="tyn-appbar-content">
                <ul class="tyn-appbar-nav tyn-appbar-nav-end">
                    <li class="tyn-appbar-item dropdown">
                        <a class="tyn-appbar-link dropdown-toggle" data-bs-toggle="dropdown" href="#" data-bs-offset="0,10">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid-fill" viewBox="0 0 16 16">
                                <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3z" />
                            </svg>
                            <span class="d-none">Menu</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-auto dropdown-menu-end">
                            <ul class="tyn-list-links">
                                <li>
                                    <h6 class="tyn-list-links-heading">Quick Links</h6>
                                </li>
                                <li>
                                    <a href="{{route('group.list')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                                        </svg>
                                        <span>Group</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('page.list')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                                        </svg>
                                        <span>Page</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="faq.html">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-octagon-fill" viewBox="0 0 16 16">
                                            <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zM5.496 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927z" />
                                        </svg>
                                        <span>Faq</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="tyn-appbar-item">
                        <a class="tyn-appbar-link dropdown-toggle" data-bs-toggle="dropdown" href="#" data-bs-offset="0,10" data-bs-auto-close="outside">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-app-indicator" viewBox="0 0 16 16">
                                <path d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z" />
                                <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            </svg>
                            <span class="d-none">Notifications</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-rg dropdown-menu-end">
                            <div class="dropdown-head">
                                <div class="title">
                                    <h6>Notifications</h6>
                                </div>
                                <ul class="nav nav-tabs nav-tabs-line">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#notifications-all" type="button"> All </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown-gap">
                                <ul class="tyn-media-list gap gap-3">
                                    <li>
                                        <div class="tyn-media-group">
                                            <div class="tyn-media tyn-circle">
                                                <img src="{{URL::to('defult/profile.jpeg')}}" alt="">
                                            </div>
                                            <div class="tyn-media-col">
                                                <div class="tyn-media-row">
                                                    <span class="message"><strong>Phillip Burke</strong> Sent message</span>
                                                </div>
                                                <div class="tyn-media-row">
                                                    <span class="meta">10 Hours ago</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="tyn-appbar-item">
                        <a class="d-inline-flex dropdown-toggle" data-bs-auto-close="outside" data-bs-toggle="dropdown" href="#" data-bs-offset="0,10">
                            <div class="tyn-media tyn-size-lg tyn-circle nav-image-profile">
                                <img src="{{asset('/storage/profile_photos/'.$authUser->profile_photo)}}" alt="">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="dropdown-gap">
                                <div class="tyn-media-group">
                                    <div class="tyn-media tyn-size-lg">

                                        @if($authUser->profile_photo!=null)
                                            <img src="{{asset('/storage/profile_photos/'.$authUser->profile_photo)}}" alt="">
                                        @else
                                            <img src="{{URL::to('defult/profile.jpeg')}}" alt="">
                                        @endif
                                    </div>
                                    <div class="tyn-media-col">
                                        <div class="tyn-media-row">
                                            <h6 class="name">  {{$authUser->first_name}} {{$authUser->last_name}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="tyn-list-links">
                                <li>
                                    <a href="{{route('profile')}}">
                                        <!-- person -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                        </svg>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <!-- gear -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                        </svg>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <!-- unlock -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock" viewBox="0 0 16 16">
                                            <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2zM3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1H3z" />
                                        </svg>
                                        <span>Change Password</span>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="#">
                                        <!-- power -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                                            <path d="M7.5 1v7h1V1h-1z" />
                                            <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
                                        </svg>
                                        <span>Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="tyn-content tyn-content-full-height tyn-chat has-aside-base">
        <div class="tyn-aside tyn-aside-base">
            <div class="tyn-aside-head">
                <div class="tyn-aside-head-text">
                    <h3 class="tyn-aside-title">Chats</h3>
                </div>
                <div class="tyn-aside-head-tools">
                    <ul class="link-group gap gx-3">
                        <li class="dropdown">
                            <button class="link dropdown-toggle" data-bs-toggle="dropdown" data-bs-offset="0,10">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                                    <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                </svg>
                                <span>Filter</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <ul class="tyn-list-links nav nav-tabs border-0">
                                    <li>
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#all-chats">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-square-text" viewBox="0 0 16 16">
                                                <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                            </svg>
                                            <span>All Chats</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#active-contacts">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                                                <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                                            </svg>
                                            <span>Active Contacts</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tyn-aside-body" data-simplebar>
                <div class="tyn-aside-search">
                    <div class="form-group tyn-pill">
                        <div class="form-control-wrap">
                            <div class="form-control-icon start">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </div>
                            <input type="text" class="form-control form-control-solid" id="search" placeholder="Search contact / chat">
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    {{--All Chat--}}
                    <div class="tab-pane show active" id="all-chats" tabindex="0" role="tabpanel">
                        <ul class="tyn-aside-list">
                            <li class="tyn-aside-item js-toggle-main active">
                                <div class="tyn-media-group">
                                    <div class="tyn-media tyn-size-lg">
                                        <img src="{{URL::to('defult/profile.jpeg')}}" alt="">
                                    </div>
                                    <div class="tyn-media-col">
                                        <div class="tyn-media-row">
                                            <h6 class="name">Jasmine Thompson</h6>
                                        </div>
                                        <div class="tyn-media-row has-dot-sap">
                                            <p class="content">Had they visited Rome before</p>
                                            <span class="meta">45 min</span>
                                        </div>
                                    </div>
                                    <div class="tyn-media-option tyn-aside-item-option">
                                        <ul class="tyn-media-option-list">
                                            <li class="dropdown">
                                                <button class="btn btn-icon btn-white btn-pill dropdown-toggle" data-bs-toggle="dropdown" data-bs-offset="0,0" data-bs-auto-close="outside">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                                        <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="tyn-list-links">


                                                        <li>
                                                            <a href="contacts.html">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                                                </svg>
                                                                <span>View Profile</span>
                                                            </a>
                                                        </li>
                                                        <li class="dropdown-divider"></li>
                                                        <li>
                                                            <a href="#callingScreen" data-bs-toggle="modal">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                                                </svg>
                                                                <span>Audio Call</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#videoCallingScreen" data-bs-toggle="modal">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-video" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556v4.35zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H2z" />
                                                                </svg>
                                                                <span>Video Call</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="tyn-aside-item js-toggle-main">
                                <div class="tyn-media-group">
                                    <div class="tyn-media tyn-size-lg">
                                        <img src="{{URL::to('defult/profile.jpeg')}}" alt="">
                                    </div>
                                    <div class="tyn-media-col">
                                        <div class="tyn-media-row">
                                            <h6 class="name">Konstantin Frank</h6>
                                            <div class="indicator varified">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tyn-media-row has-dot-sap">
                                            <p class="content">Liked that disco music</p>
                                            <span class="meta">1 days</span>
                                        </div>
                                    </div>
                                    <div class="tyn-media-option tyn-aside-item-option">
                                        <ul class="tyn-media-option-list">
                                            <li class="dropdown">
                                                <button class="btn btn-icon btn-white btn-pill dropdown-toggle" data-bs-toggle="dropdown" data-bs-offset="0,0" data-bs-auto-close="outside">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                                        <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="tyn-list-links">
                                                        <li>
                                                            <a href="contacts.html">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                                                </svg>
                                                                <span>View Profile</span>
                                                            </a>
                                                        </li>
                                                        <li class="dropdown-divider"></li>
                                                        <li>
                                                            <a href="#callingScreen" data-bs-toggle="modal">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                                                </svg>
                                                                <span>Audio Call</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#videoCallingScreen" data-bs-toggle="modal">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-video" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556v4.35zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H2z" />
                                                                </svg>
                                                                <span>Video Call</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    {{--Active Chat--}}
                    <div class="tab-pane" id="active-contacts" tabindex="0" role="tabpanel">
                        <ul class="tyn-aside-list">
                            <li class="tyn-aside-item js-toggle-main active">
                                <div class="tyn-media-group">
                                    <div class="tyn-media tyn-size-lg">
                                        <img src="{{URL::to('defult/profile.jpeg')}}" alt="">
                                    </div>
                                    <div class="tyn-media-col">
                                        <div class="tyn-media-row">
                                            <h6 class="name">Jasmine Thompson</h6>
                                            <span class="typing">typing</span>
                                        </div>
                                        <div class="tyn-media-row has-dot-sap">
                                            <p class="content">Had they visited Rome before</p>
                                            <span class="meta">45 min</span>
                                        </div>
                                    </div>
                                    <div class="tyn-media-option tyn-aside-item-option">
                                        <ul class="tyn-media-option-list">
                                            <li class="dropdown">
                                                <button class="btn btn-icon btn-white btn-pill dropdown-toggle" data-bs-toggle="dropdown" data-bs-offset="0,0" data-bs-auto-close="outside">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                                        <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="tyn-list-links">
                                                        <li>
                                                            <a href="contacts.html">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                                                </svg>
                                                                <span>View Profile</span>
                                                            </a>
                                                        </li>
                                                        <li class="dropdown-divider"></li>
                                                        <li>
                                                            <a href="#callingScreen" data-bs-toggle="modal">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                                                </svg>
                                                                <span>Audio Call</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#videoCallingScreen" data-bs-toggle="modal">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-video" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556v4.35zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H2z" />
                                                                </svg>
                                                                <span>Video Call</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>



        <div class="tyn-main tyn-chat-content" id="tynMain">
            <div class="tyn-chat-head">
                <ul class="tyn-list-inline d-md-none ms-n1">
                    <li><button class="btn btn-icon btn-md btn-pill btn-transparent js-toggle-main">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                            </svg>
                        </button>
                    </li>
                </ul>
                <div class="tyn-media-group">
                    <div class="tyn-media tyn-size-lg d-none d-sm-inline-flex">
                        <img src="{{URL::to('defult/profile.jpeg')}}" alt="">
                    </div>
                    <div class="tyn-media tyn-size-rg d-sm-none">
                        <img src="{{URL::to('defult/profile.jpeg')}}" alt="">
                    </div>
                    <div class="tyn-media-col">
                        <div class="tyn-media-row">
                            <h6 class="name">Jasmine <span class="d-none d-sm-inline-block">Thompson</span></h6>
                        </div>
                        <div class="tyn-media-row has-dot-sap">
                            <span class="meta">Active</span>
                        </div>
                    </div>
                </div>
                <ul class="tyn-list-inline gap gap-3 ms-auto">
                    <li>
                        <button class="btn btn-icon btn-light" data-bs-toggle="modal" data-bs-target="#callingScreen">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                            </svg>
                        </button>
                    </li>
                    <li>
                        <button class="btn btn-icon btn-light" data-bs-toggle="modal" data-bs-target="#videoCallingScreen">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-video-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5z" />
                            </svg>
                        </button>
                    </li>
                    <li>
                        <button class="btn btn-icon btn-light js-toggle-chat-options">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-layout-sidebar-inset-reverse" viewBox="0 0 16 16">
                                <path d="M2 2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h12z" />
                                <path d="M13 4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V4z" />
                            </svg>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="tyn-chat-body js-scroll-to-end" id="tynChatBody">
                <div class="tyn-reply" id="tynReply">
                    <div class="tyn-reply-item outgoing">
                        <div class="tyn-reply-group">
                            <div class="tyn-reply-bubble">
                                <div class="tyn-reply-text"> Do you know which App or feature it will require to set up. </div><!-- tyn-reply-text -->
                                <ul class="tyn-reply-tools">
                                    <li>
                                        <button class="btn btn-icon btn-sm btn-transparent btn-pill">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile-fill" viewBox="0 0 16 16">
                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zM4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8z" />
                                            </svg>
                                        </button>
                                    </li><!-- li -->
                                    <li class="dropup-center">
                                        <button class="btn btn-icon btn-sm btn-transparent btn-pill" data-bs-toggle="dropdown">
                                            <!-- three-dots -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-xxs">
                                            <ul class="tyn-list-links">
                                                <li>
                                                    <a href="#">
                                                        <!-- pencil-square -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                        <span>Edit</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <!-- trash -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                        </svg>
                                                        <span>Delete</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tyn-reply-item incoming">
                        <div class="tyn-reply-avatar">
                            <div class="tyn-media tyn-size-md tyn-circle">
                                <img src="{{URL::to('defult/profile.jpeg')}}" alt="">
                            </div>
                        </div>
                        <div class="tyn-reply-group">
                            <div class="tyn-reply-bubble">
                                <ul class="tyn-reply-tools">
                                    <li>
                                        <button class="btn btn-icon btn-sm btn-transparent btn-pill">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile-fill" viewBox="0 0 16 16">
                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zM4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8z" />
                                            </svg>
                                        </button>
                                    </li>
                                    <li class="dropup-center">
                                        <button class="btn btn-icon btn-sm btn-transparent btn-pill" data-bs-toggle="dropdown">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-xxs">
                                            <ul class="tyn-list-links">
                                                <li>
                                                    <a href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                        <span>Edit</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <!-- trash -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                        </svg>
                                                        <span>Delete</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="tyn-reply-bubble">
                                <div class="tyn-reply-text"> I hope these article helps. </div>
                                <ul class="tyn-reply-tools">
                                    <li>
                                        <button class="btn btn-icon btn-sm btn-transparent btn-pill">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile-fill" viewBox="0 0 16 16">
                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zM4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8z" />
                                            </svg>
                                        </button>
                                    </li>
                                    <li class="dropup-center">
                                        <button class="btn btn-icon btn-sm btn-transparent btn-pill" data-bs-toggle="dropdown">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-xxs">
                                            <ul class="tyn-list-links">
                                                <li>
                                                    <a href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                        <span>Edit</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                        </svg>
                                                        <span>Delete</span>
                                                    </a>
                                                </li>
                                            </ul><
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tyn-chat-form">
                <div class="tyn-chat-form-insert">
                    <ul class="tyn-list-inline gap gap-3">
                        <li class="dropup">
                            <button class="btn btn-icon btn-light btn-md btn-pill" data-bs-toggle="dropdown" data-bs-offset="0,10">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                                </svg>
                            </button>
                            <div class="dropdown-menu">
                                <ul class="tyn-list-links">
                                    <li>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-video2" viewBox="0 0 16 16">
                                                <path d="M10 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                                <path d="M2 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2ZM1 3a1 1 0 0 1 1-1h2v2H1V3Zm4 10V2h9a1 1 0 0 1 1 1v9c0 .285-.12.543-.31.725C14.15 11.494 12.822 10 10 10c-3.037 0-4.345 1.73-4.798 3H5Zm-4-2h3v2H2a1 1 0 0 1-1-1v-1Zm3-1H1V8h3v2Zm0-3H1V5h3v2Z" />
                                            </svg>
                                            <span>New Group</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="d-none d-sm-block">
                            <button class="btn btn-icon btn-light btn-md btn-pill">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                    <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z" />
                                </svg>
                            </button>
                        </li>
                        <li class="d-none d-sm-block"><button class="btn btn-icon btn-light btn-md btn-pill">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile-fill" viewBox="0 0 16 16">
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zM4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8z" />
                                </svg>
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="tyn-chat-form-enter">
                    <div class="tyn-chat-form-input" id="tynChatInput" contenteditable></div>
                    <ul class="tyn-list-inline me-n2 my-1">
                        <li><button class="btn btn-icon btn-white btn-md btn-pill">
                                <!-- mic-fill -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mic-fill" viewBox="0 0 16 16">
                                    <path d="M5 3a3 3 0 0 1 6 0v5a3 3 0 0 1-6 0V3z" />
                                    <path d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5z" />
                                </svg>
                            </button></li>
                        <li><button class="btn btn-icon btn-white btn-md btn-pill" id="tynChatSend">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                                </svg>
                            </button></li>
                    </ul>
                </div>
            </div>
            <div class="tyn-chat-content-aside" id="tynChatAside" data-simplebar>
                <div class="tyn-chat-cover">
                    <img src="{{URL::to('defult/cover.jpeg')}}" alt="">
                </div>
                <div class="tyn-media-group tyn-media-vr tyn-media-center mt-n4">
                    <div class="tyn-media tyn-size-xl border border-2 border-white">
                        <img src="{{URL::to('defult/profile.jpeg')}}" alt="">
                    </div>
                    <div class="tyn-media-col">
                        <div class="tyn-media-row">
                            <h6 class="name">Konstantin Frank</h6>
                        </div>
                        <div class="tyn-media-row has-dot-sap">
                            <span class="meta">Active Now</span>
                        </div>
                    </div>
                </div>
                <div class="tyn-aside-row">
                    <ul class="nav nav-btns nav-btns-stretch nav-btns-light">
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#chat-media" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                                    <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                    <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
                                </svg>
                                <span>Media</span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#chat-options" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z" />
                                </svg>
                                <span>Options</span>
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane" id="chat-media" tabindex="0">
                        <div class="tyn-aside-row py-0">
                            <ul class="nav nav-tabs nav-tabs-line">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#chat-media-images" type="button"> Images </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#chat-media-videos" type="button"> Videos </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#chat-media-files" type="button"> Files </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#chat-media-links" type="button"> Links </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tyn-aside-row">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="chat-media-images" tabindex="0">
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <a href="#" class="glightbox tyn-thumb" data-gallery="media-photo">
                                                <img src="{{URL::to('defult/cover.jpeg')}}" class="tyn-image" alt="">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#" class="glightbox tyn-thumb" data-gallery="media-photo">
                                                <img src="{{URL::to('defult/cover.jpeg')}}" class="tyn-image" alt="">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#" class="glightbox tyn-thumb" data-gallery="media-photo">
                                                <img src="{{URL::to('defult/cover.jpeg')}}" class="tyn-image" alt="">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#" class="glightbox tyn-thumb" data-gallery="media-photo">
                                                <img src="{{URL::to('defult/cover.jpeg')}}" class="tyn-image" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div><!-- .tab-pane -->
                                <div class="tab-pane" id="chat-media-videos" tabindex="0">
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <a href="https://www.youtube.com/watch?v=ag0qTaAKqT8" class="glightbox tyn-video" data-gallery="media-video">
                                                <img src="{{URL::to('defult/cover.jpeg')}}" class="tyn-image" alt="">
                                                <div class="tyn-video-icon">
                                                    <!-- play-fill -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                                        <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                                                    </svg>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a href="https://www.youtube.com/watch?v=ag0qTaAKqT8" class="glightbox tyn-video" data-gallery="media-video">
                                                <img src="{{URL::to('defult/cover.jpeg')}}" class="tyn-image" alt="">
                                                <div class="tyn-video-icon">
                                                    <!-- play-fill -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                                        <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                                                    </svg>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div><!-- .tab-pane -->
                                <div class="tab-pane" id="chat-media-files" tabindex="0">
                                    <ul class="tyn-media-list gap gap-3">
                                        <li>
                                            <a href="#" class="tyn-file">
                                                <div class="tyn-media-group">
                                                    <div class="tyn-media tyn-size-lg text-bg-light">
                                                        <!-- filetype-csv -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-csv" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM3.517 14.841a1.13 1.13 0 0 0 .401.823c.13.108.289.192.478.252.19.061.411.091.665.091.338 0 .624-.053.859-.158.236-.105.416-.252.539-.44.125-.189.187-.408.187-.656 0-.224-.045-.41-.134-.56a1.001 1.001 0 0 0-.375-.357 2.027 2.027 0 0 0-.566-.21l-.621-.144a.97.97 0 0 1-.404-.176.37.37 0 0 1-.144-.299c0-.156.062-.284.185-.384.125-.101.296-.152.512-.152.143 0 .266.023.37.068a.624.624 0 0 1 .246.181.56.56 0 0 1 .12.258h.75a1.092 1.092 0 0 0-.2-.566 1.21 1.21 0 0 0-.5-.41 1.813 1.813 0 0 0-.78-.152c-.293 0-.551.05-.776.15-.225.099-.4.24-.527.421-.127.182-.19.395-.19.639 0 .201.04.376.122.524.082.149.2.27.352.367.152.095.332.167.539.213l.618.144c.207.049.361.113.463.193a.387.387 0 0 1 .152.326.505.505 0 0 1-.085.29.559.559 0 0 1-.255.193c-.111.047-.249.07-.413.07-.117 0-.223-.013-.32-.04a.838.838 0 0 1-.248-.115.578.578 0 0 1-.255-.384h-.765ZM.806 13.693c0-.248.034-.46.102-.633a.868.868 0 0 1 .302-.399.814.814 0 0 1 .475-.137c.15 0 .283.032.398.097a.7.7 0 0 1 .272.26.85.85 0 0 1 .12.381h.765v-.072a1.33 1.33 0 0 0-.466-.964 1.441 1.441 0 0 0-.489-.272 1.838 1.838 0 0 0-.606-.097c-.356 0-.66.074-.911.223-.25.148-.44.359-.572.632-.13.274-.196.6-.196.979v.498c0 .379.064.704.193.976.131.271.322.48.572.626.25.145.554.217.914.217.293 0 .554-.055.785-.164.23-.11.414-.26.55-.454a1.27 1.27 0 0 0 .226-.674v-.076h-.764a.799.799 0 0 1-.118.363.7.7 0 0 1-.272.25.874.874 0 0 1-.401.087.845.845 0 0 1-.478-.132.833.833 0 0 1-.299-.392 1.699 1.699 0 0 1-.102-.627v-.495Zm8.239 2.238h-.953l-1.338-3.999h.917l.896 3.138h.038l.888-3.138h.879l-1.327 4Z" />
                                                        </svg>
                                                    </div>
                                                    <div class="tyn-media-col">
                                                        <h6 class="name">my_contacts.csv</h6>
                                                        <div class="meta">0.97 MB</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="tyn-file">
                                                <div class="tyn-media-group">
                                                    <div class="tyn-media tyn-size-lg text-bg-light">
                                                        <!-- filetype-mdx -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-mdx" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM.706 15.849v-2.66h.038l.952 2.159h.516l.946-2.16h.038v2.661h.715V11.85h-.8l-1.14 2.596h-.026L.805 11.85H0v3.999h.706Zm3.559-3.999v3.999h1.459c.402 0 .735-.08.999-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.066-.778-.196-1.075a1.426 1.426 0 0 0-.59-.68c-.263-.156-.598-.234-1.004-.234h-1.46Zm.79.645h.563c.248 0 .451.05.61.152a.89.89 0 0 1 .354.454c.078.201.117.452.117.753 0 .227-.022.424-.067.592a1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.484.082h-.562v-2.707Zm4.787-.645h.894L9.46 13.857l1.254 1.992h-.908l-.85-1.415h-.035l-.852 1.415h-.862l1.24-2.016L7.22 11.85h.932l.832 1.439h.035l.823-1.439Z" />
                                                        </svg>
                                                    </div>
                                                    <div class="tyn-media-col">
                                                        <h6 class="name">blog_posts.mdx</h6>
                                                        <div class="meta">6.19 MB</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div><!-- .tab-pane -->
                                <div class="tab-pane" id="chat-media-links" tabindex="0">
                                    <ul class="tyn-media-list gap gap-3">
                                        <li>
                                            <a href="#" class="tyn-links">
                                                <div class="tyn-media-group">
                                                    <div class="tyn-media tyn-size-xl">
                                                        <img src="{{URL::to('defult/cover.jpeg')}}" alt="">
                                                    </div>
                                                    <div class="tyn-media-col">
                                                        <h6 class="name">Digital Marketing Guide</h6>
                                                        <div class="anchor">https://www.envato.com/blog/digital-marketing-guide/</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div><!-- .tab-pane -->
                            </div>
                        </div>
                    </div><!-- .tab-pane -->
                    <div class="tab-pane show active" id="chat-options" tabindex="0">
                        <div class="tyn-aside-row py-0">
                            <ul class="nav nav-tabs nav-tabs-line">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#chat-options-customize" type="button"> Customize </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#chat-options-manage" type="button"> Manage </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tyn-aside-row">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="chat-options-customize" tabindex="0">
                                    <ul class="d-flex flex-column gap gap-4">
                                        <li>
                                            <h6 class="tyn-title-overline">Suggested Friends</h6>
                                            <ul class="tyn-media-list gap gap-3">
                                                <li>
                                                    <div class="tyn-media-group">
                                                        <div class="tyn-media tyn-size-lg">
                                                            <img src="{{URL::to('defult/profile.jpeg')}}" alt="">
                                                        </div>
                                                        <div class="tyn-media-col">
                                                            <div class="tyn-media-row">
                                                                <h6 class="name">Jasmine Thompson</h6>
                                                            </div>
                                                            <div class="tyn-media-row has-dot-sap">
                                                                <span class="meta">og : Jasmine</span>
                                                            </div>
                                                        </div>
                                                        <div class="tyn-media-option">
                                                            <ul class="tyn-media-option-list">
                                                                <li>
                                                                    <button class="btn btn-icon btn-md btn-pill btn-light">
                                                                        <!-- pencil-square -->
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                        </svg>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div><!-- .tab-pane -->
                                <div class="tab-pane" id="chat-options-manage" tabindex="0">
                                    <ul class="tyn-media-list gap gap-3">
                                        <li>
                                            <a href="#" class="tyn-file">
                                                <div class="tyn-media-group">
                                                    <div class="tyn-media text-bg-light">
                                                        <!-- person-x-fill -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z" />
                                                        </svg>
                                                    </div>
                                                    <div class="tyn-media-col">
                                                        <h6 class="name">Block</h6>
                                                        <div class="meta">Frank will no longer be in your contact.</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="tyn-file">
                                                <div class="tyn-media-group">
                                                    <div class="tyn-media text-bg-light">
                                                        <!-- exclamation-triangle-fill -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                        </svg>
                                                    </div>
                                                    <div class="tyn-media-col">
                                                        <h6 class="name">Report</h6>
                                                        <div class="meta">Give feedback on the conversation</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id="callingScreen" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0">
            <div class="tyn-chat-call">
                <div class="tyn-chat-cover">
                    <img src="{{URL::to('defult/cover.jpeg')}}" alt="">
                </div>
                <div class="tyn-media-group tyn-media-vr tyn-media-center mt-n4 pb-4">
                    <div class="tyn-media tyn-size-xl tyn-circle border border-2 border-white">
                        <img src="{{URL::to('defult/profile.jpeg')}}" alt="">
                    </div>
                    <div class="tyn-media-col">
                        <div class="tyn-media-row has-dot-sap">
                            <span class="meta">Calling ...</span>
                        </div>
                        <div class="tyn-media-row">
                            <h6 class="name">Konstantin Frank</h6>
                        </div>
                    </div>
                </div><!-- .tyn-media-group -->
                <ul class="tyn-list-inline gap gap-3 m-auto py-4">
                    <li>
                        <button class="btn btn-light" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#videoCallingScreen">
                            <span>Switch To</span>
                            <!-- camera-video-fill -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-video-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5z" />
                            </svg>
                        </button>
                    </li>
                </ul><!-- .tyn-list-inline -->
                <ul class="tyn-list-inline gap gap-3 mx-auto py-4">
                    <li>
                        <button class="btn btn-icon btn-pill btn-light">
                            <!-- person-plus-fill -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                            </svg>
                        </button>
                    </li>
                    <li>
                        <button class="btn btn-icon btn-pill btn-light">
                            <!-- mic-mute-fill -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mic-mute-fill" viewBox="0 0 16 16">
                                <path d="M13 8c0 .564-.094 1.107-.266 1.613l-.814-.814A4.02 4.02 0 0 0 12 8V7a.5.5 0 0 1 1 0v1zm-5 4c.818 0 1.578-.245 2.212-.667l.718.719a4.973 4.973 0 0 1-2.43.923V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 1 0v1a4 4 0 0 0 4 4zm3-9v4.879L5.158 2.037A3.001 3.001 0 0 1 11 3z" />
                                <path d="M9.486 10.607 5 6.12V8a3 3 0 0 0 4.486 2.607zm-7.84-9.253 12 12 .708-.708-12-12-.708.708z" />
                            </svg>
                        </button>
                    </li>
                    <li>
                        <button class="btn btn-icon btn-pill btn-danger" data-bs-dismiss="modal">
                            <!-- telephone-x-fill -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-x-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm9.261 1.135a.5.5 0 0 1 .708 0L13 2.793l1.146-1.147a.5.5 0 0 1 .708.708L13.707 3.5l1.147 1.146a.5.5 0 0 1-.708.708L13 4.207l-1.146 1.147a.5.5 0 0 1-.708-.708L12.293 3.5l-1.147-1.146a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </button>
                    </li>
                </ul><!-- .tyn-list-inline -->
            </div><!-- .tyn-chat-call -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->
<div class="modal fade" tabindex="-1" id="videoCallingScreen" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0">
            <div class="tyn-chat-call tyn-chat-call-video">
                <div class="tyn-chat-call-stack">
                    <div class="tyn-chat-call-cover">
                        <img src="{{URL::to('defult/profile.jpeg')}}" alt="">
                    </div>
                </div><!-- .tyn-chat-call-stack -->
                <div class="tyn-chat-call-stack on-dark">
                    <div class="tyn-media-group p-4">
                        <div class="tyn-media-col align-self-start pt-3">
                            <div class="tyn-media-row has-dot-sap">
                                <span class="meta">Talking With ...</span>
                            </div>
                            <div class="tyn-media-row">
                                <h6 class="name">Konstantin Frank</h6>
                            </div>
                            <div class="tyn-media-row has-dot-sap">
                                <span class="content">02:09 min</span>
                            </div>
                        </div>
                        <div class="tyn-media tyn-media-1x1_3 tyn-size-3xl border border-2 border-dark">
                            <img src="{{URL::to('defult/profile.jpeg')}}" alt="">
                        </div>
                    </div>
                    <ul class="tyn-list-inline gap gap-3 mx-auto py-4 justify-content-center  mt-auto">
                        <li>
                            <button class="btn btn-icon btn-pill btn-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                </svg>
                            </button>
                        </li>
                        <li>
                            <button class="btn btn-icon btn-pill btn-light" data-bs-toggle="modal" data-bs-target="#callingScreen">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-video-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5z" />
                                </svg>
                            </button>
                        </li>
                        <li>
                            <button class="btn btn-icon btn-pill btn-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mic-mute-fill" viewBox="0 0 16 16">
                                    <path d="M13 8c0 .564-.094 1.107-.266 1.613l-.814-.814A4.02 4.02 0 0 0 12 8V7a.5.5 0 0 1 1 0v1zm-5 4c.818 0 1.578-.245 2.212-.667l.718.719a4.973 4.973 0 0 1-2.43.923V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 1 0v1a4 4 0 0 0 4 4zm3-9v4.879L5.158 2.037A3.001 3.001 0 0 1 11 3z" />
                                    <path d="M9.486 10.607 5 6.12V8a3 3 0 0 0 4.486 2.607zm-7.84-9.253 12 12 .708-.708-12-12-.708.708z" />
                                </svg>
                            </button>
                        </li>
                        <li>
                            <button class="btn btn-icon btn-pill btn-danger" data-bs-dismiss="modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-x-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm9.261 1.135a.5.5 0 0 1 .708 0L13 2.793l1.146-1.147a.5.5 0 0 1 .708.708L13.707 3.5l1.147 1.146a.5.5 0 0 1-.708.708L13 4.207l-1.146 1.147a.5.5 0 0 1-.708-.708L12.293 3.5l-1.147-1.146a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('design/chat/js/bundle.js')}}"></script>
<script src="{{asset('design/chat/js/app.js')}}"></script>

