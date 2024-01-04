<?php

use App\Http\Controllers\api\DesignationController;
use App\Http\Controllers\api\EducationController;
use App\Http\Controllers\api\FriendRequestController;
use App\Http\Controllers\api\GroupController;
use App\Http\Controllers\api\PageController;
use App\Http\Controllers\api\SocialLinkController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\UserPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('logout', [UserController::class, 'logout']);
    //Profile
    Route::post('update-profile',[UserController::class, 'updateProfile']);
    Route::get('auth-user-profile', [UserController::class, 'profile']);
    //Education
    Route::post('create-education', [EducationController::class, 'createEducation']);
    Route::get('auth-user-education', [EducationController::class, 'getAuthUserEducation']);
    //Designation
    Route::post('store-designation', [DesignationController::class, 'store']);
    Route::get('auth-user-designation', [DesignationController::class, 'getAuthUserDesignation']);
    //Social Link
    Route::post('store-social-link', [SocialLinkController::class, 'store']);
    Route::get('auth-user-social-link', [SocialLinkController::class, 'getAuthUserSocialLink']);
    //Post
    Route::post('user-post', [UserPostController::class, 'storeUserPost']);
    Route::get('auth-user-post-show', [UserPostController::class, 'getAuthUserPosts']);
    Route::get('all-user-post-show', [UserPostController::class, 'getAllUserPost']);
    Route::post('user/post/{postId}/like', [UserPostController::class, 'toggleLike']);
    Route::post('/comments/{postId}', [UserPostController::class, 'addComment']);
    Route::post('/comments/{commentId}/reply', [UserPostController::class, 'addReply']);

    //Friend
    Route::get('/suggested-friends', [FriendRequestController::class, 'getSuggestedFriends']);
    Route::get('/friend-requests', [FriendRequestController::class, 'getPendingFriendRequests']);
    Route::post('/send-friend-request/{receiver}', [FriendRequestController::class, 'sendRequest']);
    Route::post('/accept-friend-request/{request}', [FriendRequestController::class, 'acceptRequest']);
    Route::get('/friends',[FriendRequestController::class, 'index']);
    Route::delete('/unfriend/{friend}', [FriendRequestController::class, 'unfriendUser']);


    //Page
    Route::post('store-page', [PageController::class, 'store']);
    Route::get('auth-user-page', [PageController::class, 'getAuthUserPage']);
    Route::post('store-post-on-page', [PageController::class, 'storePost']);
    Route::get('page-all-post', [PageController::class, 'getPageAllPost']);
    Route::post('pages/{page}/like', [PageController::class, 'toggleLike']);
    Route::post('pages/posts/{post}/like', [PageController::class, 'togglePostLike']);
    Route::post('/page-posts/{postId}/comment',[PageController::class, 'addPostComment']);
    Route::post('/page-comments/{commentId}/reply',[PageController::class, 'addCommentReply']);


    //Group
    Route::post('store-group', [GroupController::class, 'store']);
    Route::get('auth-user-group', [GroupController::class, 'getAuthUserGroup']);
    Route::post('store-post-on-group', [GroupController::class, 'storePost']);
    Route::get('group-all-post', [GroupController::class, 'getGroupAllPost']);
    Route::post('groups/{page}/like', [GroupController::class, 'toggleLike']);
    Route::post('groups/posts/{post}/like', [GroupController::class, 'togglePostLike']);

    Route::post('/groups-posts/{postId}/comment',[GroupController::class, 'addPostComment']);
    Route::post('/groups-comments/{commentId}/reply',[GroupController::class, 'addCommentReply']);

});
