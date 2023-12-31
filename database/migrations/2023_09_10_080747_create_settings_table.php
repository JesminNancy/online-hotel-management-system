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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('fevicon');
            $table->text('logo');
            $table->text('top_bar_phone')->nullable();
            $table->text('top_bar_email')->nullable();
            $table->text('home_feature_status');
            $table->text('home_room_total');
            $table->text('home_room_status');
            $table->text('home_testimonial_status');
            $table->text('home_latest_post_total');
            $table->text('home_latest_post_status');
            $table->text('footer_address');
            $table->text('footer_email');
            $table->text('footer_phone');
            $table->text('copyright')->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linkedin')->nullable();
            $table->text('pinterest')->nullable();
            $table->text('theme_color_1');
            $table->text('theme_color_2');
            $table->text('analytic_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
