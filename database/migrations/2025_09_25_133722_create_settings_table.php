<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('home_heading')->nullable();
            $table->text('home_desc')->nullable();
            $table->string('company')->nullable();
            $table->string('logo')->nullable();
            $table->string('contact_mail')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('address')->nullable();
            $table->string('google_map')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
