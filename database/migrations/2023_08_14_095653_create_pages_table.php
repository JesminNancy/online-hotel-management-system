<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->text('about_heading');
            $table->text('about_content');
            $table->integer('about_status');
            $table->text('terms_heading');
            $table->text('terms_content');
            $table->integer('terms_status');
            $table->text('privacy_heading');
            $table->text('privacy_content');
            $table->integer('privacy_status');
            $table->text('contact_heading');
            $table->text('contact_map');
            $table->integer('contact_status');
            $table->text('photo_gallery_heading');
            $table->integer('photo_gallery_status');
            $table->text('fqa_heading');
            $table->integer('fqa_status');
            $table->text('blog_heading');
            $table->integer('blog_status');
            $table->text('room_heading');
            $table->text('cart_heading');
            $table->integer('cart_status');
            $table->text('checkout_heading');
            $table->integer('checkout_status');
            $table->text('payment_heading');
            $table->text('signup_heading');
            $table->integer('signup_status');
            $table->text('signin_heading');
            $table->integer('signin_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
