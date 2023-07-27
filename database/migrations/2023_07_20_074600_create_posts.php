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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->char('name');
            $table->integer('category_id');
            $table->char('time');
            $table->integer('post_admin_id');
            $table->char('thumbcontent');
            $table->char('thumbimg');
            $table->char('thumbimgcap');
            $table->char('bodycontent1');
            $table->char('bodycontent1_img');
            $table->char('bodycontent1_img_cap');
            $table->char('bodycontent2');
            $table->char('bodycontent2_img');
            $table->char('bodycontent2_img_cap');
            $table->char('bodycontent3');
            $table->char('bodycontent3_img');
            $table->char('bodycontent3_img_cap');
            $table->char('bodycontent4');
            $table->char('bodycontent4_img');
            $table->char('bodycontent4_img_cap');
            $table->char('youtubevideo');
            $table->integer('wpshare');
            $table->integer('flag');
            $table->integer('flag_visitor_id');
            $table->integer('public_visibility');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
