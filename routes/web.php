<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\FriendListController;
use App\Http\Controllers\FriendRequestController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\VisitUserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/register',[UserRegisterController::class,'showRegistrationForm'])->name('user.register');
Route::post('/register-store',[UserRegisterController::class,'register'])->name('user.register.store');
Route::get('/login',[UserRegisterController::class,'showLoginForm'])->name('user.login');
Route::post('/login-submit',[UserRegisterController::class,'loginSuccess'])->name('user.login.submit');


//Admin
Route::get('/admin-login',[AdminController::class,'adminLoginForm'])->name('admin.login');
Route::post('/admin-login-submit',[AdminController::class,'adminLoginSuccess'])->name('admin.login.submit');


Route::middleware('auth')->group(function () {

    //Admin
    Route::post('/admin-logout', [AdminController::class, 'adminLogout'])->name('admin.logout');



    Route::get('/profile-update',[TimelineController::class,'updateProfilePageShow'])->name('profile.update');
    Route::post('/profile-update-store',[TimelineController::class,'updateProfile'])->name('profile.update.store');
    Route::get('/',[TimelineController::class,'timeline'])->name('timeline');
    Route::post('/logout', [UserRegisterController::class, 'logout'])->name('user.logout');

    //MyProfile
    Route::get('/profile',[MyProfileController::class,'myProfile'])->name('profile');

    //User Post
    Route::post('/post-timeline',[MyProfileController::class,'userPost'])->name('user.post');

    //Friend List
    Route::get('/suggested-friends',[FriendRequestController::class,'getSuggestedFriends'])->name('suggested.friend');
    Route::post('/send-friend-request/{receiver}', [FriendRequestController::class, 'sendRequest']);
    Route::post('/accept-friend-request/{request}', [FriendRequestController::class, 'acceptRequest']);
    //Route::delete('/unfriend/{friend}', [FriendRequestController::class, 'unfriendUser']);

    //Designation
    Route::post('/designation-store',[AboutController::class,'designationStore'])->name('designation.store');

    //Link
    Route::post('/link-store',[AboutController::class,'linkStore'])->name('link.store');

    //Education
    Route::post('/education-store',[AboutController::class,'educationStore'])->name('education.store');

    //User Profile Visit
    Route::get('/user-profile/{id}',[VisitUserProfileController::class,'visitUserProfile'])->name('visit.user.profile');

    //Group List
    Route::get('/group-list',[GroupController::class, 'groupList'])->name('group.list');
    //Group Create
    Route::get('/group-create',[GroupController::class, 'groupCreate'])->name('group.create');
    Route::post('/group-store',[GroupController::class, 'groupStore'])->name('group.store');
    //Group Profile
    Route::get('/group-profile/{id}',[GroupController::class, 'groupProfile'])->name('group.profile');
    //Group Post
    Route::post('/group-post-store',[GroupController::class,'groupPostStore'])->name('group.post.store');

    //Page Create
    Route::get('/page-list',[PageController::class, 'pageList'])->name('page.list');
    Route::get('/page-create',[PageController::class, 'pageCreate'])->name('page.create');
    Route::post('/page-store',[PageController::class, 'pageStore'])->name('page.store');
    //Page Profile
    Route::get('/page-profile/{id}',[PageController::class, 'pageProfile'])->name('page.profile');
    //Page Post
    Route::post('/page-post-store',[PageController::class,'pagePostStore'])->name('page.post.store');

    Route::post('pages/{pageId}/like', [PageController::class, 'togglePageLike']);
    Route::post('groups/{groupId}/like', [GroupController::class, 'toggleGroupFlow']);

    //Store Comment
    Route::post('store-coment',[TimelineController::class,'storeComment'])->name('comment.store');
    Route::post('store-reply-coment',[TimelineController::class,'storeReplyComment'])->name('reply.comment.store');
    Route::post('user/post/{postId}/like', [TimelineController::class, 'toggleLike']);

    //Group Comment
    Route::post('store-group-coment',[GroupController::class,'storeGroupComment'])->name('comment.group.store');
    Route::post('store-group-reply-coment',[GroupController::class,'storeReplyGroupComment'])->name('reply.group.comment.store');
    Route::post('groups/posts/{postId}/like', [GroupController::class, 'togglePostLike']);

    //Page Comment
    Route::post('store-page-coment',[PageController::class,'storePageComment'])->name('comment.page.store');
    Route::post('store-page-reply-coment',[PageController::class,'storeReplyPageComment'])->name('reply.page.comment.store');
    Route::post('page/posts/{postId}/like', [PageController::class, 'togglePostLike']);




});

require __DIR__.'/auth.php';
