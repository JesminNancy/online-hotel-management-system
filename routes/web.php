<?php

use App\Http\Controllers\Admin\AdminFeatureController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\AdminFqaController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PhotoController;
use App\Http\Controllers\Front\VideoController;
use App\Http\Controllers\Front\FqaController;
use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Front\TermsController;
use Illuminate\Support\Facades\Route;

/*.........Frontend............ */

Route::get('',[HomeController::class,'index'])->name('home');
Route::get('/about',[AboutController::class,'index'])->name('about');
Route::get('/blog',[BlogController::class,'index'])->name('blog');
Route::get('/post/{id}',[BlogController::class,'singlePost'])->name('post');
Route::get('/photo',[PhotoController::class,'index'])->name('photo');
Route::get('/video',[VideoController::class,'index'])->name('video');
Route::get('/fqa',[FqaController::class,'index'])->name('fqa');
Route::get('/terms_and_condition',[TermsController::class,'index'])->name('terms');
Route::get('/privacy',[PrivacyController::class,'index'])->name('privacy');
Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::post('/contact/send_email',[ContactController::class,'send_email'])->name('contact_send_email');
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

/*......... Video Gallery............ */

Route::get('/admin/video/view',[AdminVideoController::class,'index'])->name('admin_video_view')->middleware('admin:admin');
Route::get('/admin/video/add',[AdminVideoController::class,'add'])->name('admin_video_add')->middleware('admin:admin');
Route::post('/admin/video/store',[AdminVideoController::class,'store'])->name('admin_video_store')->middleware('admin:admin');
Route::get('/admin/video_edit/{id}',[AdminVideoController::class,'edit'])->name('admin_video_edit')->middleware('admin:admin');
Route::post('/admin/video_update/{id}',[AdminVideoController::class,'update'])->name('admin_video_update')->middleware('admin:admin');
Route::get('/admin/video_delete/{id}',[AdminVideoController::class,'delete'])->name('admin_video_delete')->middleware('admin:admin');

/*......... FQA............ */

Route::get('/admin/fqa/view',[AdminFqaController::class,'index'])->name('admin_fqa_view')->middleware('admin:admin');
Route::get('/admin/fqa/add',[AdminFqaController::class,'add'])->name('admin_fqa_add')->middleware('admin:admin');
Route::post('/admin/fqa/store',[AdminFqaController::class,'store'])->name('admin_fqa_store')->middleware('admin:admin');
Route::get('/admin/fqa_edit/{id}',[AdminFqaController::class,'edit'])->name('admin_fqa_edit')->middleware('admin:admin');
Route::post('/admin/fqa_update/{id}',[AdminFqaController::class,'update'])->name('admin_fqa_update')->middleware('admin:admin');
Route::get('/admin/fqa_delete/{id}',[AdminFqaController::class,'delete'])->name('admin_fqa_delete')->middleware('admin:admin');

/*......... All Pages Heading Dynamic............ */

/*.........About Pages............ */
Route::get('/admin/page/about',[AdminPageController::class,'about'])->name('admin_page_about')->middleware('admin:admin');
Route::post('/admin/page/about/update',[AdminPageController::class,'about_update'])->name('admin_page_about_update')->middleware('admin:admin');

/*.........Terms and Condition Pages............ */

Route::get('/admin/page/terms',[AdminPageController::class,'terms'])->name('admin_page_terms')->middleware('admin:admin');
Route::post('/admin/page/terms/update',[AdminPageController::class,'terms_update'])->name('admin_page_terms_update')->middleware('admin:admin');

/*......... Privacy Pages............ */

Route::get('/admin/page/privacy',[AdminPageController::class,'privacy'])->name('admin_page_privacy')->middleware('admin:admin');
Route::post('/admin/page/privacy/update',[AdminPageController::class,'privacy_update'])->name('admin_page_privacy_update')->middleware('admin:admin');

/*......... Contact Pages............ */

Route::get('/admin/page/contact',[AdminPageController::class,'contact'])->name('admin_page_contact')->middleware('admin:admin');
Route::post('/admin/page/contact/update',[AdminPageController::class,'contact_update'])->name('admin_page_contact_update')->middleware('admin:admin');
/*......... Photo Gallery Pages............ */

Route::get('/admin/page/photo_gallery',[AdminPageController::class,'photo_gallery'])->name('admin_page_photo_gallery')->middleware('admin:admin');
Route::post('/admin/page/photo_gallery/update',[AdminPageController::class,'photo_gallery_update'])->name('admin_page_photo_gallery_update')->middleware('admin:admin');
/*......... Video Gallery Pages............ */

Route::get('/admin/page/video_gallery',[AdminPageController::class,'video_gallery'])->name('admin_page_video_gallery')->middleware('admin:admin');
Route::post('/admin/page/video_gallery/update',[AdminPageController::class,'video_gallery_update'])->name('admin_page_video_gallery_update')->middleware('admin:admin');
/*......... FQA Pages............ */

Route::get('/admin/page/fqa',[AdminPageController::class,'fqa'])->name('admin_page_fqa')->middleware('admin:admin');
Route::post('/admin/page/fqa/update',[AdminPageController::class,'fqa_update'])->name('admin_page_fqa_update')->middleware('admin:admin');
/*......... Blog Pages............ */

Route::get('/admin/page/blog',[AdminPageController::class,'blog'])->name('admin_page_blog')->middleware('admin:admin');
Route::post('/admin/page/blog/update',[AdminPageController::class,'blog_update'])->name('admin_page_blog_update')->middleware('admin:admin');
/*......... Cart Pages............ */

Route::get('/admin/page/cart',[AdminPageController::class,'cart'])->name('admin_page_cart')->middleware('admin:admin');
Route::post('/admin/page/cart/update',[AdminPageController::class,'cart_update'])->name('admin_page_cart_update')->middleware('admin:admin');

/*......... Chcekout Pages............ */

Route::get('/admin/page/checkout',[AdminPageController::class,'checkout'])->name('admin_page_checkout')->middleware('admin:admin');
Route::post('/admin/page/checkout/update',[AdminPageController::class,'checkout_update'])->name('admin_page_checkout_update')->middleware('admin:admin');
/*......... Payment Pages............ */

Route::get('/admin/page/payment',[AdminPageController::class,'payment'])->name('admin_page_payment')->middleware('admin:admin');
Route::post('/admin/page/payment/update',[AdminPageController::class,'payment_update'])->name('admin_page_payment_update')->middleware('admin:admin');
/*......... SignUp Pages............ */
Route::get('/admin/page/signup',[AdminPageController::class,'signup'])->name('admin_page_signup')->middleware('admin:admin');
Route::post('/admin/page/signup/update',[AdminPageController::class,'signup_update'])->name('admin_page_signup_update')->middleware('admin:admin');
/*......... Signin Pages............ */
Route::get('/admin/page/signin',[AdminPageController::class,'signin'])->name('admin_page_signin')->middleware('admin:admin');
Route::post('/admin/page/signin/update',[AdminPageController::class,'signin_update'])->name('admin_page_signin_update')->middleware('admin:admin');
