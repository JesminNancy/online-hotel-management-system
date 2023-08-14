<?php

use App\Http\Controllers\Admin\AdminFeatureController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PhotoController;
use Illuminate\Support\Facades\Route;

/*.........Frontend............ */

Route::get('',[HomeController::class,'index'])->name('home');
Route::get('/about',[AboutController::class,'index'])->name('about');
Route::get('/blog',[BlogController::class,'index'])->name('blog');
Route::get('/post/{id}',[BlogController::class,'singlePost'])->name('post');
Route::get('/photo',[PhotoController::class,'index'])->name('photo');
/*......... Admin............ */

Route::get('/admin/home',[AdminHomeController::class,'index'])->name('admin_home')->middleware('admin:admin');
Route::get('/admin/login',[AdminLoginController::class,'index'])->name('admin_login');
Route::get('/admin/logout',[AdminLoginController::class,'logout'])->name('admin_logout');
Route::post('/admin/login_submit',[AdminLoginController::class,'login_submit'])->name('admin_login_submit');
Route::get('/admin/forget_password',[AdminLoginController::class,'forgetPassword'])->name('admin_forget_password');
Route::get('/admin/reset_password/{token}/{email}',[AdminLoginController::class,'resetPassword'])->name('admin_reset_password');
Route::post('/admin/reset_password_submit',[AdminLoginController::class,'resetPasswordSubmit'])->name('reset_password_submit');
Route::post('/admin/forget_password_submit',[AdminLoginController::class,'forgetPassword_submit'])->name('admin_forget_password_submit');

/*......... Profile............ */

Route::get('/admin/edit_profile',[AdminProfileController::class,'index'])->name('admin_profile')->middleware('admin:admin');
Route::post('/admin/edit_profile_submit',[AdminProfileController::class,'edit_profile_submit'])->name('admin_profile_submit')->middleware('admin:admin');

/*......... Add Slider............ */

Route::get('/admin/slider/view',[AdminSliderController::class,'index'])->name('admin_slider_view')->middleware('admin:admin');
Route::get('/admin/slider/add',[AdminSliderController::class,'add'])->name('admin_slider_add')->middleware('admin:admin');
Route::post('/admin/slider/store',[AdminSliderController::class,'store'])->name('admin_slider_store')->middleware('admin:admin');
Route::get('/admin/slide_edit/{id}',[AdminSliderController::class,'edit'])->name('admin_slider_edit')->middleware('admin:admin');
Route::post('/admin/slide_update/{id}',[AdminSliderController::class,'update'])->name('admin_slider_update')->middleware('admin:admin');
Route::get('/admin/slide_delete/{id}',[AdminSliderController::class,'delete'])->name('admin_slider_delete')->middleware('admin:admin');

/*......... Add Features............ */

Route::get('/admin/feature/view',[AdminFeatureController::class,'index'])->name('admin_feature_view')->middleware('admin:admin');
Route::get('/admin/feature/add',[AdminFeatureController::class,'add'])->name('admin_feature_add')->middleware('admin:admin');
Route::post('/admin/feature/store',[AdminFeatureController::class,'store'])->name('admin_feature_store')->middleware('admin:admin');
Route::get('/admin/feature_edit/{id}',[AdminFeatureController::class,'edit'])->name('admin_feature_edit')->middleware('admin:admin');
Route::post('/admin/feature_update/{id}',[AdminFeatureController::class,'update'])->name('admin_feature_update')->middleware('admin:admin');
Route::get('/admin/feature_delete/{id}',[AdminFeatureController::class,'delete'])->name('admin_feature_delete')->middleware('admin:admin');

/*......... Add Testimonial............ */

Route::get('/admin/testimonial/view',[AdminTestimonialController::class,'index'])->name('admin_testimonial_view')->middleware('admin:admin');
Route::get('/admin/testimonial/add',[AdminTestimonialController::class,'add'])->name('admin_testimonial_add')->middleware('admin:admin');
Route::post('/admin/testimonial/store',[AdminTestimonialController::class,'store'])->name('admin_testimonial_store')->middleware('admin:admin');
Route::get('/admin/testimonial_edit/{id}',[AdminTestimonialController::class,'edit'])->name('admin_testimonial_edit')->middleware('admin:admin');
Route::post('/admin/testimonial_update/{id}',[AdminTestimonialController::class,'update'])->name('admin_testimonial_update')->middleware('admin:admin');
Route::get('/admin/testimonial_delete/{id}',[AdminTestimonialController::class,'delete'])->name('admin_testimonial_delete')->middleware('admin:admin');

/*......... Add Blog/Post............ */

Route::get('/admin/post/view',[AdminPostController::class,'index'])->name('admin_post_view')->middleware('admin:admin');
Route::get('/admin/post/add',[AdminPostController::class,'add'])->name('admin_post_add')->middleware('admin:admin');
Route::post('/admin/post/store',[AdminPostController::class,'store'])->name('admin_post_store')->middleware('admin:admin');
Route::get('/admin/post_edit/{id}',[AdminPostController::class,'edit'])->name('admin_post_edit')->middleware('admin:admin');
Route::post('/admin/post_update/{id}',[AdminPostController::class,'update'])->name('admin_post_update')->middleware('admin:admin');
Route::get('/admin/post_delete/{id}',[AdminPostController::class,'delete'])->name('admin_post_delete')->middleware('admin:admin');

/*......... Photo Gallery............ */

Route::get('/admin/photo/view',[AdminPhotoController::class,'index'])->name('admin_photo_view')->middleware('admin:admin');
Route::get('/admin/photo/add',[AdminPhotoController::class,'add'])->name('admin_photo_add')->middleware('admin:admin');
Route::post('/admin/photo/store',[AdminPhotoController::class,'store'])->name('admin_photo_store')->middleware('admin:admin');
Route::get('/admin/photo_edit/{id}',[AdminPhotoController::class,'edit'])->name('admin_photo_edit')->middleware('admin:admin');
Route::post('/admin/photo_update/{id}',[AdminPhotoController::class,'update'])->name('admin_photo_update')->middleware('admin:admin');
Route::get('/admin/photo_delete/{id}',[AdminPhotoController::class,'delete'])->name('admin_photo_delete')->middleware('admin:admin');