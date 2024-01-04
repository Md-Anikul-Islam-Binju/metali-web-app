@extends('pages.app')
@section('content')
    <div class="w-full flex flex-col sm:flex-row gap-y-5 gap-x-8">
        <div class="w-full sm:w-3/12 text-black dark:text-white hidden lg:block">
            <div class="w-full mr-4 p-4 rounded-md text-black dark:text-white text-base h-full overflow-y-auto">
                <div class="sidebar fixed top-14 bg-white dark:bg-black bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center shadow drop-shadow-lg">
                    <div class="text-black dark:text-white text-xl">
                        <div class="p-2.5 mt-1 flex items-center">
                            @if($user->profile_photo!=null)
                                <img alt="" class="w-10 h-10 rounded-full" src="{{asset('/storage/profile_photos/'.$user->profile_photo)}}"></img>
                            @else
                                <img alt="" class="w-10 h-10 rounded-full" src="{{URL::to('defult/profile.jpeg')}}"></img>
                            @endif

                            <h1 class="font-bold text-black dark:text-white text-[15px] ml-2">
                                {{$user->first_name}}   {{$user->last_name}}
                            </h1>
                        </div>
                        <div class="my-2 bg-gray-600 h-[1px]"></div>
                    </div>
                    <a href="{{route('timeline')}}" class="p-2.5 mt-3 flex items-center text-black dark:text-white rounded-md px-4 duration-300 cursor-pointer">
                        <i class="bi bi-house-door-fill"></i>
                        <span class="text-[15px] ml-4 text-black dark:text-white font-bold">Home</span>
                    </a>
                    <a href="{{route('group.create')}}" class="p-2.5 mt-3 flex items-center text-black dark:text-white rounded-md px-4 duration-300 cursor-pointer">
                        <i class="fas fa-users"></i>
                        <span class="text-[15px] ml-4 text-black dark:text-white font-bold">Create Groups</span>
                    </a>
                    <a href="{{route('page.create')}}" class="p-2.5 mt-3 flex items-center text-black dark:text-white rounded-md px-4 duration-300 cursor-pointer">
                        <i class="fas fa-flag"></i>
                        <span class="text-[15px] ml-4 text-black dark:text-white font-bold">Create Page</span>
                    </a>
                </div>
            </div>
        </div>


        <!-- right side start -->
        <div class="flex items-center justify-center w-full">
            <div class="w-full">
                <div class="w-full">
                    <P class="text-black dark:text-white text-2xl font-bold">Already Friend</P>
                        <div class="w-full mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-between gap-x-5 gap-y-5">
                            @foreach($friends as $friendsData)
                            <div>
                                <div class="max-w-sm mx-auto bg-gray-50 drop-shadow-lg dark:bg-black rounded-lg overflow-hidden shadow-lg">
                                    <div class="px-4 pb-4">
                                        <div class="text-center my-4">
                                            @if($friendsData->profile_photo!=null)
                                            <img class="h-32 w-32 rounded-full border-4 border-white mx-auto my-4" src="{{asset('/storage/profile_photos/'.$friendsData->profile_photo)}}" alt="">
                                            @else
                                                <img class="h-32 w-32 rounded-full border-4 border-white mx-auto my-4" src="{{URL::to('defult/profile.jpeg')}}" alt="">
                                            @endif

                                                <div class="py-2">
                                                <a href="{{route('visit.user.profile',$friendsData->id)}}">
                                                  <h3 class="font-bold text-2xl mb-1 text-black dark:text-white">{{$friendsData->first_name}} {{$friendsData->last_name}}</h3>
                                                </a>
                                                    <div class="inline-flex text-gray-700 items-center dark:text-white">
                                                    <svg class="h-5 w-5 text-gray-400 mr-1" fill="currentColor"
                                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                        <path class=""
                                                              d="M5.64 16.36a9 9 0 1 1 12.72 0l-5.65 5.66a1 1 0 0 1-1.42 0l-5.65-5.66zm11.31-1.41a7 7 0 1 0-9.9 0L12 19.9l4.95-4.95zM12 14a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                                    </svg>
                                                    {{$friendsData->address}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex md:flex-col xl:flex-row gap-2 items-center">
                                            <button class="flex-1 rounded-full bg-[#323232] text-white antialiased font-semibold px-4 py-3">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                </div>

                <div class="border border-gray-100 mt-10"></div>

                <div class="w-full">
                    <P class="text-black dark:text-white text-2xl font-bold">Friend Requests</P>
                    @foreach($pendingRequests as $pendingRequestsData)
                    <div class="w-full mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-between gap-x-5 gap-y-5">
                        <div>
                            <div class="max-w-sm mx-auto bg-gray-50 drop-shadow-lg dark:bg-black rounded-lg overflow-hidden shadow-lg">
                                <div class="px-4 pb-4">
                                    <div class="text-center my-4">
                                        @if($pendingRequestsData->sender->profile_photo!=null)
                                            <img class="h-32 w-32 rounded-full border-4 border-white mx-auto my-4" src="{{asset('/storage/profile_photos/'.$pendingRequestsData->sender->profile_photo)}}" alt="">
                                        @else
                                            <img class="h-32 w-32 rounded-full border-4 border-white mx-auto my-4" src="{{URL::to('defult/profile.jpeg')}}" alt="">
                                        @endif

                                        <div class="py-2">
                                            <a href="{{route('visit.user.profile',$pendingRequestsData->sender->id)}}">
                                              <h3 class="font-bold text-2xl mb-1 text-black dark:text-white">{{$pendingRequestsData->sender->first_name}} {{$pendingRequestsData->sender->last_name}}</h3>
                                            </a>
                                                <div class="inline-flex text-gray-700 items-center dark:text-white">
                                                <svg class="h-5 w-5 text-gray-400 mr-1" fill="currentColor"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                    <path class=""
                                                          d="M5.64 16.36a9 9 0 1 1 12.72 0l-5.65 5.66a1 1 0 0 1-1.42 0l-5.65-5.66zm11.31-1.41a7 7 0 1 0-9.9 0L12 19.9l4.95-4.95zM12 14a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                                </svg>
                                                {{$pendingRequestsData->sender->address}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex md:flex-col xl:flex-row gap-2 items-center">
                                        <button class="flex-1 rounded-full bg-[#62bb46] text-white antialiased font-semibold px-4 py-3"
                                                id="confirmButton_{{ $pendingRequestsData->id }}"    onclick="confirmFriendRequest({{ $pendingRequestsData->id }})">
                                            Confirm
                                        </button>
                                        <button id="deleteButton_{{ $pendingRequestsData->id }}" class="flex-1 rounded-full bg-[#323232] text-white antialiased font-semibold px-4 py-3">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="border border-gray-100 mt-10"></div>

                <div class="w-full mt-10">
                    <P class="text-black dark:text-white text-2xl font-bold">Suggested Friends</P>
                    <div class="w-full mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-between gap-x-5 gap-y-5">
                        @foreach($suggestedFriends as $suggestedFriendsData)
                            <div>
                            <div class="max-w-sm mx-auto bg-gray-50 drop-shadow-lg dark:bg-black rounded-lg overflow-hidden shadow-lg">
                                <div class="px-4 pb-4">
                                    <div class="text-center my-4">
                                        @if($suggestedFriendsData->profile_photo!=null)
                                        <img class="h-32 w-32 rounded-full border-4 border-white mx-auto my-4" src="{{asset('/storage/profile_photos/'.$suggestedFriendsData->profile_photo)}}" alt="">
                                        @else
                                        <img class="h-32 w-32 rounded-full border-4 border-white mx-auto my-4" src="{{URL::to('defult/profile.jpeg')}}" alt="">
                                        @endif

                                        <div class="py-2">
                                            <a href="{{route('visit.user.profile',$suggestedFriendsData->id)}}">
                                              <h3 class="font-bold text-2xl mb-1 text-black dark:text-white">{{$suggestedFriendsData->first_name}} {{$suggestedFriendsData->last_name}}</h3>
                                            </a>
                                                <div class="inline-flex text-gray-700 items-center dark:text-white">
                                                <svg class="h-5 w-5 text-gray-400 mr-1" fill="currentColor"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                    <path class=""
                                                          d="M5.64 16.36a9 9 0 1 1 12.72 0l-5.65 5.66a1 1 0 0 1-1.42 0l-5.65-5.66zm11.31-1.41a7 7 0 1 0-9.9 0L12 19.9l4.95-4.95zM12 14a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                                </svg>
                                                {{$suggestedFriendsData->address}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex md:flex-col xl:flex-row gap-2 items-center">
                                        @if(auth()->user()->sentFriendRequests()->where('receiver_id', $suggestedFriendsData->id)->exists())
                                            {{-- If a friend request has been sent, show Remove button --}}
                                            <button id="removeButton_{{ $suggestedFriendsData->id }}" class="flex-1 rounded-full bg-[#323232] text-white antialiased font-semibold px-4 py-3">
                                                Remove
                                            </button>
                                        @else
                                            {{-- If no friend request has been sent, show Add Friend button --}}
                                            <button class="flex-1 rounded-full bg-[#62bb46] text-white antialiased font-semibold px-4 py-3"
                                                    id="addButton_{{ $suggestedFriendsData->id }}"    onclick="addFriend({{ $suggestedFriendsData->id }})">
                                                Add Friend
                                            </button>
                                            <button id="removeButton_{{ $suggestedFriendsData->id }}" class="flex-1 rounded-full bg-[#323232] text-white antialiased font-semibold px-4 py-3" style="display: none;">
                                                Remove
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function addFriend(receiverId) {
            axios.post(`/send-friend-request/${receiverId}`)
                .then(response => {
                    //alert(response.data.message);
                    toggleFriendButtons(receiverId, true);
                })
                .catch(error => {
                    alert('Confirm friend request.');
                });
        }

        function confirmFriendRequest(requestId) {
            axios.post(`/accept-friend-request/${requestId}`)
                .then(response => {
                    alert(response.data.message);
                    toggleFriendButtons(requestId, false);
                })
                .catch(error => {
                    //alert('Send friend request.');
                });
        }


        // function toggleFriendButtons(userId, showAddButton) {
        //     const addButton = document.getElementById(`addButton_${userId}`);
        //     const removeButton = document.getElementById(`removeButton_${userId}`);
        //
        //     if (showAddButton) {
        //         addButton.style.display = 'none';
        //         removeButton.style.display = 'flex';
        //     } else {
        //         addButton.style.display = 'flex';
        //         removeButton.style.display = 'none';
        //     }
        // }

        function toggleFriendButtons(userId, showDeleteButton) {
            const addButton = document.getElementById(`addButton_${userId}`);
            const removeButton = document.getElementById(`removeButton_${userId}`);
            const confirmButton = document.getElementById(`confirmButton_${userId}`);
            const deleteButton = document.getElementById(`deleteButton_${userId}`);

            if (showDeleteButton) {
                addButton.style.display = 'none';
                removeButton.style.display = 'flex';
                confirmButton.style.display = 'none';
                deleteButton.style.display = 'flex'; // or 'block', depending on your styling
            } else {
                addButton.style.display = 'flex';
                removeButton.style.display = 'none';
                confirmButton.style.display = 'none'; // hide confirm button after confirming
                deleteButton.style.display = 'flex'; // or 'block', depending on your styling
            }
        }
    </script>

@endsection
