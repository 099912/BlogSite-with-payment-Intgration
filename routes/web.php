<?php

use App\Http\Controllers\admin\AboutHeaderController;
use App\Http\Controllers\admin\AboutPositionController;
use App\Http\Controllers\admin\AboutTeamController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BlogDetailController;
use App\Http\Controllers\admin\BlogHeaderController;
use App\Http\Controllers\admin\HomeExploreController;
use App\Http\Controllers\admin\HomeHeaderController;
use App\Http\Controllers\admin\HomeMemoriesController;
use App\Http\Controllers\admin\HomeTestimonialController;
use App\Http\Controllers\admin\HomeTravelController;
use App\Http\Controllers\admin\ServiceBlogController;
use App\Http\Controllers\admin\ServiceFeatureController;
use App\Http\Controllers\admin\ServiceHeadController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;
use App\Events\Message;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\StripeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


///social login with google

Route::get('auth/google', [GoogleController::class,'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class,'handleGoogleCallback']);


// email verification route when user login

    Route::get('/user/register', [AuthController::class,'registration'])->name('register.show');
    Route::post('/user/register', [AuthController::class,'saveRegister'])->name('register.save');
    Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');

//forgot password

Route::get('forget/password', [ForgotPasswordController::class, 'showForgetPassword'])->name('forget.password.get');
Route::post('forget/password', [ForgotPasswordController::class, 'submitForgetPassword'])->name('forget.password.post');
Route::get('reset/password/', [ForgotPasswordController::class, 'showResetPassword'])->name('reset.password.get');
Route::get('otp/reset', [ForgotPasswordController::class, 'showOtp'])->name('otp.get');
Route::post('otp/verify', [ForgotPasswordController::class, 'verify_Otp'])->name('otp.post');
Route::post('reset/password', [ForgotPasswordController::class, 'submitResetPassword'])->name('reset.password.post');


///with token
// Route::get('forget/password', [ForgotPasswordController::class, 'showForgetPassword'])->name('forget.password.get');
// Route::post('forget/password', [ForgotPasswordController::class, 'submitForgetPassword'])->name('forget.password.post');
// Route::get('reset/password/{token', [ForgotPasswordController::class, 'showResetPassword'])->name('reset.password.get');
// Route::get('otp/reset', [ForgotPasswordController::class, 'showOtp'])->name('otp.get');
// Route::post('otp/verify', [ForgotPasswordController::class, 'verify_Otp'])->name('otp.post');
// Route::post('reset/password', [ForgotPasswordController::class, 'submitResetPassword'])->name('reset.password.post');


Route::group(['middleware' => 'prevent-back-history'],function(){


//authenticate user
    Route::get('/',[AuthController::class,'show'])->name('login.view');
    Route::post('/login',[AuthController::class,'checklogin'])->name('login.check');
    Route::get('/logout',[AuthController::class,'logout'])->name('user.logout');


    Route::group(['prefix' => 'admin','middleware' => ['user']] ,function () {

    Route::get('/home',[AdminController::class,'index'])->name('admin.view');

    //product page
    Route::get('/product',[AdminController::class,'showProduct'])->name('product.view');



    ///chat code here

    Route::get('/chat',[AdminController::class,"viewChat"])->name('chat.view') ;
    Route::post('/send/chat',[AdminController::class,"chat"])->name('chat.send') ;



    Route::middleware('admin')->group( function () {
    Route::get('/head/create',[HomeHeaderController::class,"create"])->name('home.head.create') ;
    Route::post('/head/save',[HomeHeaderController::class,"store"])->name('home.head.store') ;
    Route::get('/head/view',[HomeHeaderController::class,"show"])->name('home.head.show') ;
    Route::get('/head/destroy/{id}',[HomeHeaderController::class,"destroy"])->name('home.head.destroy') ;
    Route::get('/head/edit/{id}',[HomeHeaderController::class,'edit'])->name('home.head.edit');
    Route::post('/head/update/{id}',[HomeHeaderController::class,'update'])->name('home.head.update');



    ///explore

    Route::get('/explore/create',[HomeExploreController::class,"create"])->name('home.explore.create') ;
    Route::post('/explore/save',[HomeExploreController::class,"store"])->name('home.explore.store') ;
    Route::get('/explore/view',[HomeExploreController::class,"show"])->name('home.explore.show') ;
    Route::get('/explore/destroy/{id}',[HomeExploreController::class,"destroy"])->name('home.explore.destroy') ;
    Route::get('/explore/edit/{id}',[HomeExploreController::class,'edit'])->name('home.explore.edit');
    Route::post('/explore/update/{id}',[HomeExploreController::class,'update'])->name('home.explore.update');

        ///travel
        Route::get('/travel/create',[HomeTravelController::class,"create"])->name('home.travel.create') ;
        Route::post('/travel/save',[HomeTravelController::class,"store"])->name('home.travel.store') ;
        Route::get('/travel/view',[HomeTravelController::class,"show"])->name('home.travel.show') ;
        Route::get('/travel/destroy/{id}',[HomeTravelController::class,"destroy"])->name('home.travel.destroy') ;
        Route::get('/travel/edit/{id}',[HomeTravelController::class,'edit'])->name('home.travel.edit');
        Route::post('/travel/update/{id}',[HomeTravelController::class,'update'])->name('home.travel.update');
        // //Employe


        ///Memories
        Route::get('/memories/create',[HomeMemoriesController::class,"create"])->name('home.memories.create') ;
        Route::post('/memories/save',[HomeMemoriesController::class,"store"])->name('home.memories.store') ;
        Route::get('/memories/view',[HomeMemoriesController::class,"show"])->name('home.memories.show') ;
        Route::get('/memories/destroy/{id}',[HomeMemoriesController::class,"destroy"])->name('home.memories.destroy') ;
        Route::get('/memories/edit/{id}',[HomeMemoriesController::class,'edit'])->name('home.memories.edit');
        Route::post('/memories/update/{id}',[HomeMemoriesController::class,'update'])->name('home.memories.update');

///testimonials
Route::get('/testimonial/create',[HomeTestimonialController::class,"create"])->name('home.testimonial.create') ;
Route::post('/testimonial/save',[HomeTestimonialController::class,"store"])->name('home.testimonial.store') ;
Route::get('/testimonial/view',[HomeTestimonialController::class,"show"])->name('home.testimonial.show') ;
Route::get('/testimonial/destroy/{id}',[HomeTestimonialController::class,"destroy"])->name('home.testimonial.destroy') ;
Route::get('/testimonial/edit/{id}',[HomeTestimonialController::class,'edit'])->name('home.testimonial.edit');
Route::post('/testimonial/update/{id}',[HomeTestimonialController::class,'update'])->name('home.testimonial.update');



/// ABOUT PAGE ROUTES



///HEADER
Route::get('/about/header/create',[AboutHeaderController::class,"create"])->name('about.header.create') ;
Route::post('/about/header/save',[AboutHeaderController::class,"store"])->name('about.header.store') ;
Route::get('/about/header/view',[AboutHeaderController::class,"show"])->name('about.header.show') ;
Route::get('/about/header/destroy/{id}',[AboutHeaderController::class,"destroy"])->name('about.header.destroy') ;
Route::put('/about/header/edit/{id}',[AboutHeaderController::class,'edit'])->name('about.header.edit');
Route::post('/about/header/update/{id}',[AboutHeaderController::class,'update'])->name('about.header.update');


//Team completed through route model binding

Route::get('/about/team/create',[AboutTeamController::class,"create"])->name('about.team.create') ;
Route::post('/about/team/save',[AboutTeamController::class,"store"])->name('about.team.store') ;
Route::get('/about/team/view',[AboutTeamController::class,"show"])->name('about.team.show') ;
Route::get('/about/team/destroy/{id}',[AboutTeamController::class,"destroy"])->name('about.team.destroy') ;
Route::get('/about/team/edit/{id}',[AboutTeamController::class,'edit'])->name('about.team.edit');
Route::post('/about/team/update/{id}',[AboutTeamController::class,'update'])->name('about.team.update');
// Route::get('users/restore/one/{id}', [AboutTeamController::class, 'restore'])->name('about.team.restore');
// Route::get('restoreAll', [AboutTeamController::class, 'restoreAll'])->name('team.restore.all');
// Route::resource('/about/team',AboutTeamController::class);


//position
Route::get('/about/position/create',[AboutPositionController::class,"create"])->name('about.position.create') ;
Route::post('/about/position/save',[AboutPositionController::class,"store"])->name('about.position.store') ;
Route::get('/about/position/view',[AboutPositionController::class,"show"])->name('about.position.show') ;
Route::get('/about/position/destroy/{id}',[AboutPositionController::class,"destroy"])->name('about.position.destroy') ;
Route::get('/about/position/edit/{id}',[AboutPositionController::class,'edit'])->name('about.position.edit');
Route::post('/about/position/update/{id}',[AboutPositionController::class,'update'])->name('about.position.update');


///services header
Route::get('/service/header/create',[ServiceHeadController::class,"create"])->name('service.header.create') ;
Route::post('/service/header/save',[ServiceHeadController::class,"store"])->name('service.header.store') ;
Route::get('/service/header/view',[ServiceHeadController::class,"show"])->name('service.header.show') ;
Route::get('/service/header/destroy/{id}',[ServiceHeadController::class,"destroy"])->name('service.header.destroy') ;
Route::get('/service/header/edit/{id}',[ServiceHeadController::class,'edit'])->name('service.header.edit');
Route::post('/service/header/update/{id}',[ServiceHeadController::class,'update'])->name('service.header.update');

///feature Service

Route::get('/service/feature/create',[ServiceFeatureController::class,"create"])->name('service.feature.create') ;
Route::post('/service/feature/save',[ServiceFeatureController::class,"store"])->name('service.feature.store') ;
Route::get('/service/feature/view',[ServiceFeatureController::class,"show"])->name('service.feature.show') ;
Route::get('/service/feature/destroy/{id}',[ServiceFeatureController::class,"destroy"])->name('service.feature.destroy') ;
Route::get('/service/feature/edit/{id}',[ServiceFeatureController::class,'edit'])->name('service.feature.edit');
Route::post('/service/feature/update/{id}',[ServiceFeatureController::class,'update'])->name('service.feature.update');



///feature blogs route
Route::get('/service/blog/create',[ServiceBlogController::class,"create"])->name('service.blog.create') ;
Route::post('/service/blog/save',[ServiceBlogController::class,"store"])->name('service.blog.store') ;
Route::get('/service/blog/view',[ServiceBlogController::class,"show"])->name('service.blog.show') ;
Route::get('/service/blog/destroy/{id}',[ServiceBlogController::class,"destroy"])->name('service.blog.destroy') ;
Route::get('/service/blog/edit/{id}',[ServiceBlogController::class,'edit'])->name('service.blog.edit');
Route::post('/service/blog/update/{id}',[ServiceBlogController::class,'update'])->name('service.blog.update');
});
//blog

Route::get('/blog/header/create',[BlogHeaderController::class,"create"])->name('blog.header.create') ;
Route::post('/blog/header/save',[BlogHeaderController::class,"store"])->name('blog.header.store') ;
Route::get('/blog/header/view',[BlogHeaderController::class,"show"])->name('blog.header.show') ;
Route::get('/blog/header/destroy/{id}',[BlogHeaderController::class,"destroy"])->name('blog.header.destroy') ;
Route::get('/blog/header/edit/{id}',[BlogHeaderController::class,'edit'])->name('blog.header.edit');
Route::post('/blog/header/update/{id}',[BlogHeaderController::class,'update'])->name('blog.header.update');

///blogdetails
Route::get('/blog/detail/create',[BlogDetailController::class,"create"])->name('blog.detail.create') ;
Route::post('/blog/detail/save',[BlogDetailController::class,"store"])->name('blog.detail.store') ;
Route::get('/blog/detail/view',[BlogDetailController::class,"show"])->name('blog.detail.show') ;
Route::get('/blog/detail/destroy/{id}',[BlogDetailController::class,"destroy"])->name('blog.detail.destroy') ;
Route::get('/blog/detail/edit/{id}',[BlogDetailController::class,'edit'])->name('blog.detail.edit');
Route::post('/blog/detail/update/{id}',[BlogDetailController::class,'update'])->name('blog.detail.update');

// Route::resource('users', AboutTeamController::class);


    });
    });


//paypal controllers
Route::post('paypal/payment', [PaypalController::class, 'payment'])->name('paypal');
Route::get('paypal/success', [PaypalController::class, 'success'])->name('paypal_success');
Route::get('paypal/cancel', [PaypalController::class, 'cancel'])->name('paypal_cancel');

/* Stripe */
Route::post('stripe/payment', [StripeController::class, 'payment'])->name('stripe');
Route::get('stripe/success', [StripeController::class, 'success'])->name('stripe_success');
Route::get('stripe/cancel', [StripeController::class, 'cancel'])->name('stripe_cancel');


///user
Route::get('/user/home',[UserController::class,'home'])->name('home.view');
Route::get('/user/about',[UserController::class,'about'])->name('home.about.view');
Route::get('/user/services',[UserController::class,'service'])->name('home.services.view');
Route::get('/user/blog',[UserController::class,'blog'])->name('home.blog.view');
Route::get('/user/contact',[UserController::class,'contact'])->name('home.contact.view');
Route::post('/user/contact/store',[UserController::class,'store'])->name('contact.store');



