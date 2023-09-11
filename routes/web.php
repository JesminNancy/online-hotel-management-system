<?php

use App\Http\Controllers\Admin\AdminAmenityController;
use App\Http\Controllers\Admin\AdminCustomerController;
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
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminRoomController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Customer\CustomerAuthController;
use App\Http\Controllers\Customer\CustomerHomeController;
use App\Http\Controllers\Customer\CustomerOrderController;
use App\Http\Controllers\Customer\CustomerProfileController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\BookingController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PhotoController;
use App\Http\Controllers\Front\VideoController;
use App\Http\Controllers\Front\FqaController;
use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Front\RoomController;
use App\Http\Controllers\Front\SubscriberController;
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
Route::post('/subscribe/send_email',[SubscriberController::class,'send_email'])->name('subscribe_send_email');
Route::get('/subscribe/verify/{token}/{email}',[SubscriberController::class,'verify'])->name('subscribe_verify');
Route::get('/room',[RoomController::class,'index'])->name('room');
Route::get('/room/{id}',[RoomController::class,'singleRoom'])->name('room_details');
Route::post('/booking/submit',[BookingController::class,'cart_submit'])->name('cart_submit');
Route::get('/cart',[BookingController::class,'cart_view'])->name('cart');
Route::get('/cart_delete/{id}',[BookingController::class,'cart_delete'])->name('cart_delete');
Route::get('/checkout',[BookingController::class,'checkout'])->name('checkout');
Route::post('/paymment',[BookingController::class,'payment'])->name('payment');
Route::post('/paymment/paypal/{price}',[BookingController::class,'paypal'])->name('paypal');
Route::post('/paymment/stripe/{price}',[BookingController::class,'stripe'])->name('payment_stripe');

/*......... Admin Without Middleware............ */

Route::get('/admin/login',[AdminLoginController::class,'index'])->name('admin_login');
Route::get('/admin/logout',[AdminLoginController::class,'logout'])->name('admin_logout');
Route::post('/admin/login_submit',[AdminLoginController::class,'login_submit'])->name('admin_login_submit');
Route::get('/admin/forget_password',[AdminLoginController::class,'forgetPassword'])->name('admin_forget_password');
Route::get('/admin/reset_password/{token}/{email}',[AdminLoginController::class,'resetPassword'])->name('admin_reset_password');
Route::post('/admin/reset_password_submit',[AdminLoginController::class,'resetPasswordSubmit'])->name('reset_password_submit');
Route::post('/admin/forget_password_submit',[AdminLoginController::class,'forgetPassword_submit'])->name('admin_forget_password_submit');

/*......... Customer Without Middleware............ */
Route::get('/login',[CustomerAuthController::class,'login'])->name('customer_login');
Route::post('/customer/login_submit',[CustomerAuthController::class,'login_submit'])->name('customer_login_submit');
Route::get('/customer/logout',[CustomerAuthController::class,'logout'])->name('customer_logout');
Route::get('/signup',[CustomerAuthController::class,'signup'])->name('customer_signup');
Route::post('/signup-submit',[CustomerAuthController::class,'signup_submit'])->name('customer_signup_submit');
Route::get('/signup-verify/{email}/{token}',[CustomerAuthController::class,'verify'])->name('customer_signup_verify');


/* Customer */
Route::get('/forget-password', [CustomerAuthController::class, 'forget_password'])->name('customer_forget_password');
Route::post('/forget-password-submit', [CustomerAuthController::class, 'forget_password_submit'])->name('customer_forget_password_submit');
Route::get('/reset-password/{token}/{email}', [CustomerAuthController::class, 'reset_password'])->name('customer_reset_password');
Route::post('/reset-password-submit', [CustomerAuthController::class, 'reset_password_submit'])->name('customer_reset_password_submit');



/*......... Customer With Middleware............ */
Route::group(['middleware'=>['customer:customer']],function(){
    Route::get('/customer/home',[CustomerHomeController::class,'index'])->name('customer_home');
    Route::get('/customer/edit_profile',[CustomerProfileController::class,'index'])->name('customer_profile');
    Route::post('/customer/edit_profile_submit',[CustomerProfileController::class,'edit_profile_submit'])->name('customer_profile_submit');
    Route::get('/customer/order',[CustomerOrderController::class,'customer_order'])->name('customer_order_view');
    Route::get('/customer/invoice/{id}',[CustomerOrderController::class,'invoice'])->name('customer_invoice');
 });


 /*......... Admin With Middleware............ */

Route::group(['middleware'=>['admin:admin']],function(){
    /*......... Profile............ */

    Route::get('/admin/edit_profile',[AdminProfileController::class,'index'])->name('admin_profile');
    Route::post('/admin/edit_profile_submit',[AdminProfileController::class,'edit_profile_submit'])->name('admin_profile_submit');
 /*......... Admin With Middleware............ */
    Route::get('/admin/home',[AdminHomeController::class,'index'])->name('admin_home');
    Route::get('/admin/customers',[AdminCustomerController::class,'index'])->name('admin_customer');
    Route::get('/admin/customers/change-status/{id}',[AdminCustomerController::class,'change_status'])->name('admin_customer_change_status');
    Route::get('/admin/orders',[AdminOrderController::class,'index'])->name('admin_orders');
    Route::get('/admin/order/invoice/{id}',[AdminOrderController::class,'order_invoice'])->name('admin_order_invoice');
    Route::get('/admin/orders/delete/{id}',[AdminOrderController::class,'delete'])->name('admin_order_delete');
    Route::get('/admin/setting',[AdminSettingController::class,'index'])->name('admin_setting');
    Route::post('/admin/setting_update/',[AdminSettingController::class,'update'])->name('admin_setting_update');

/*......... Add Slider............ */

    Route::get('/admin/slider/view',[AdminSliderController::class,'index'])->name('admin_slider_view');
    Route::get('/admin/slider/add',[AdminSliderController::class,'add'])->name('admin_slider_add');
    Route::post('/admin/slider/store',[AdminSliderController::class,'store'])->name('admin_slider_store');
    Route::get('/admin/slide_edit/{id}',[AdminSliderController::class,'edit'])->name('admin_slider_edit');
    Route::post('/admin/slide_update/{id}',[AdminSliderController::class,'update'])->name('admin_slider_update');
    Route::get('/admin/slide_delete/{id}',[AdminSliderController::class,'delete'])->name('admin_slider_delete');

/*......... Add Features............ */

    Route::get('/admin/feature/view',[AdminFeatureController::class,'index'])->name('admin_feature_view');
    Route::get('/admin/feature/add',[AdminFeatureController::class,'add'])->name('admin_feature_add');
    Route::post('/admin/feature/store',[AdminFeatureController::class,'store'])->name('admin_feature_store');
    Route::get('/admin/feature_edit/{id}',[AdminFeatureController::class,'edit'])->name('admin_feature_edit');
    Route::post('/admin/feature_update/{id}',[AdminFeatureController::class,'update'])->name('admin_feature_update');
    Route::get('/admin/feature_delete/{id}',[AdminFeatureController::class,'delete'])->name('admin_feature_delete');

/*......... Add Testimonial............ */

    Route::get('/admin/testimonial/view',[AdminTestimonialController::class,'index'])->name('admin_testimonial_view');
    Route::get('/admin/testimonial/add',[AdminTestimonialController::class,'add'])->name('admin_testimonial_add');
    Route::post('/admin/testimonial/store',[AdminTestimonialController::class,'store'])->name('admin_testimonial_store');
    Route::get('/admin/testimonial_edit/{id}',[AdminTestimonialController::class,'edit'])->name('admin_testimonial_edit');
    Route::post('/admin/testimonial_update/{id}',[AdminTestimonialController::class,'update'])->name('admin_testimonial_update');
    Route::get('/admin/testimonial_delete/{id}',[AdminTestimonialController::class,'delete'])->name('admin_testimonial_delete');

/*......... Add Blog/Post............ */

    Route::get('/admin/post/view',[AdminPostController::class,'index'])->name('admin_post_view');
    Route::get('/admin/post/add',[AdminPostController::class,'add'])->name('admin_post_add');
    Route::post('/admin/post/store',[AdminPostController::class,'store'])->name('admin_post_store');
    Route::get('/admin/post_edit/{id}',[AdminPostController::class,'edit'])->name('admin_post_edit');
    Route::post('/admin/post_update/{id}',[AdminPostController::class,'update'])->name('admin_post_update');
    Route::get('/admin/post_delete/{id}',[AdminPostController::class,'delete'])->name('admin_post_delete');

/*......... Photo Gallery............ */

    Route::get('/admin/photo/view',[AdminPhotoController::class,'index'])->name('admin_photo_view');
    Route::get('/admin/photo/add',[AdminPhotoController::class,'add'])->name('admin_photo_add');
    Route::post('/admin/photo/store',[AdminPhotoController::class,'store'])->name('admin_photo_store');
    Route::get('/admin/photo_edit/{id}',[AdminPhotoController::class,'edit'])->name('admin_photo_edit');
    Route::post('/admin/photo_update/{id}',[AdminPhotoController::class,'update'])->name('admin_photo_update');
    Route::get('/admin/photo_delete/{id}',[AdminPhotoController::class,'delete'])->name('admin_photo_delete');

/*......... Video Gallery............ */

    Route::get('/admin/video/view',[AdminVideoController::class,'index'])->name('admin_video_view');
    Route::get('/admin/video/add',[AdminVideoController::class,'add'])->name('admin_video_add');
    Route::post('/admin/video/store',[AdminVideoController::class,'store'])->name('admin_video_store');
    Route::get('/admin/video_edit/{id}',[AdminVideoController::class,'edit'])->name('admin_video_edit');
    Route::post('/admin/video_update/{id}',[AdminVideoController::class,'update'])->name('admin_video_update');
    Route::get('/admin/video_delete/{id}',[AdminVideoController::class,'delete'])->name('admin_video_delete');

/*......... FQA............ */

    Route::get('/admin/fqa/view',[AdminFqaController::class,'index'])->name('admin_fqa_view');
    Route::get('/admin/fqa/add',[AdminFqaController::class,'add'])->name('admin_fqa_add');
    Route::post('/admin/fqa/store',[AdminFqaController::class,'store'])->name('admin_fqa_store');
    Route::get('/admin/fqa_edit/{id}',[AdminFqaController::class,'edit'])->name('admin_fqa_edit');
    Route::post('/admin/fqa_update/{id}',[AdminFqaController::class,'update'])->name('admin_fqa_update');
    Route::get('/admin/fqa_delete/{id}',[AdminFqaController::class,'delete'])->name('admin_fqa_delete');

/*......... All Pages Heading Dynamic............ */

/*.........About Pages............ */
    Route::get('/admin/page/about',[AdminPageController::class,'about'])->name('admin_page_about');
    Route::post('/admin/page/about/update',[AdminPageController::class,'about_update'])->name('admin_page_about_update');

/*.........Terms and Condition Pages............ */

    Route::get('/admin/page/terms',[AdminPageController::class,'terms'])->name('admin_page_terms');
    Route::post('/admin/page/terms/update',[AdminPageController::class,'terms_update'])->name('admin_page_terms_update');

/*......... Privacy Pages............ */

    Route::get('/admin/page/privacy',[AdminPageController::class,'privacy'])->name('admin_page_privacy');
    Route::post('/admin/page/privacy/update',[AdminPageController::class,'privacy_update'])->name('admin_page_privacy_update');

/*......... Contact Pages............ */

    Route::get('/admin/page/contact',[AdminPageController::class,'contact'])->name('admin_page_contact');
    Route::post('/admin/page/contact/update',[AdminPageController::class,'contact_update'])->name('admin_page_contact_update');
/*......... Photo Gallery Pages............ */

    Route::get('/admin/page/photo_gallery',[AdminPageController::class,'photo_gallery'])->name('admin_page_photo_gallery');
    Route::post('/admin/page/photo_gallery/update',[AdminPageController::class,'photo_gallery_update'])->name('admin_page_photo_gallery_update');
    /*......... Video Gallery Pages............ */

    Route::get('/admin/page/video_gallery',[AdminPageController::class,'video_gallery'])->name('admin_page_video_gallery');
    Route::post('/admin/page/video_gallery/update',[AdminPageController::class,'video_gallery_update'])->name('admin_page_video_gallery_update');
/*......... FQA Pages............ */

    Route::get('/admin/page/fqa',[AdminPageController::class,'fqa'])->name('admin_page_fqa');
    Route::post('/admin/page/fqa/update',[AdminPageController::class,'fqa_update'])->name('admin_page_fqa_update');
/*......... Blog Pages............ */

    Route::get('/admin/page/blog',[AdminPageController::class,'blog'])->name('admin_page_blog');
    Route::post('/admin/page/blog/update',[AdminPageController::class,'blog_update'])->name('admin_page_blog_update');

    Route::get('/admin/page/room',[AdminPageController::class,'room'])->name('admin_page_room');
    Route::post('/admin/page/room/update',[AdminPageController::class,'room_update'])->name('admin_page_room_update');

/*......... Cart Pages............ */

    Route::get('/admin/page/cart',[AdminPageController::class,'cart'])->name('admin_page_cart');
    Route::post('/admin/page/cart/update',[AdminPageController::class,'cart_update'])->name('admin_page_cart_update');

/*......... Chcekout Pages............ */

    Route::get('/admin/page/checkout',[AdminPageController::class,'checkout'])->name('admin_page_checkout');
    Route::post('/admin/page/checkout/update',[AdminPageController::class,'checkout_update'])->name('admin_page_checkout_update');
/*......... Payment Pages............ */

    Route::get('/admin/page/payment',[AdminPageController::class,'payment'])->name('admin_page_payment');
    Route::post('/admin/page/payment/update',[AdminPageController::class,'payment_update'])->name('admin_page_payment_update');
/*......... SignUp Pages............ */
    Route::get('/admin/page/signup',[AdminPageController::class,'signup'])->name('admin_page_signup');
    Route::post('/admin/page/signup/update',[AdminPageController::class,'signup_update'])->name('admin_page_signup_update');
    /*......... Signin Pages............ */
    Route::get('/admin/page/signin',[AdminPageController::class,'signin'])->name('admin_page_signin');
    Route::post('/admin/page/signin/update',[AdminPageController::class,'signin_update'])->name('admin_page_signin_update');

    /*......... Forget Password Pages............ */

    Route::get('/admin/page/forgetpassword',[AdminPageController::class,'forgetPassword'])->name('admin_page_forget_password');
    Route::post('/admin/page/forgetpassword/update',[AdminPageController::class,'forget_password_update'])->name('admin_page_forget_password_update');

     /*......... Reset Password Pages............ */
     Route::get('/admin/page/resetpassword',[AdminPageController::class,'resetPassword'])->name('admin_page_reset_password');
     Route::post('/admin/page/resetpassword/update',[AdminPageController::class,'reset_password_update'])->name('admin_page_reset_password_update');

    Route::get('/admin/subscriber/show',[AdminSubscriberController::class,'show'])->name('admin_subscriber_show');
    Route::get('/admin/subscriber/send_email',[AdminSubscriberController::class,'send_email'])->name('admin_subscriber_send_email');
    Route::post('/admin/subscriber/send_email_submit',[AdminSubscriberController::class,'send_email_submit'])->name('admin_subscriber_send_email_submit');

/*......... Room Amenity............ */

    Route::get('/admin/amenity/view',[AdminAmenityController::class,'index'])->name('admin_amenity_view');
    Route::get('/admin/amenity/add',[AdminAmenityController::class,'add'])->name('admin_amenity_add');
    Route::post('/admin/amenity/store',[AdminAmenityController::class,'store'])->name('admin_amenity_store');
    Route::get('/admin/amenity_edit/{id}',[AdminAmenityController::class,'edit'])->name('admin_amenity_edit');
    Route::post('/admin/amenity_update/{id}',[AdminAmenityController::class,'update'])->name('admin_amenity_update');
    Route::get('/admin/amenity_delete/{id}',[AdminAmenityController::class,'delete'])->name('admin_amenity_delete');
/*......... Rooms............ */

    Route::get('/admin/room/view',[AdminRoomController::class,'index'])->name('admin_room_view');
    Route::get('/admin/room/add',[AdminRoomController::class,'add'])->name('admin_room_add');
    Route::post('/admin/room/store',[AdminRoomController::class,'store'])->name('admin_room_store');
    Route::get('/admin/room_edit/{id}',[AdminRoomController::class,'edit'])->name('admin_room_edit');
    Route::post('/admin/room_update/{id}',[AdminRoomController::class,'update'])->name('admin_room_update');
    Route::get('/admin/room_delete/{id}',[AdminRoomController::class,'delete'])->name('admin_room_delete');

    Route::get('/admin/room/gallery/{id}', [AdminRoomController::class, 'gallery'])->name('admin_room_gallery');
    Route::post('/admin/room/gallery/store/{id}', [AdminRoomController::class, 'gallery_store'])->name('admin_room_gallery_store');
    Route::get('/admin/room/gallery/delete/{id}', [AdminRoomController::class, 'gallery_delete'])->name('admin_room_gallery_delete');

});




