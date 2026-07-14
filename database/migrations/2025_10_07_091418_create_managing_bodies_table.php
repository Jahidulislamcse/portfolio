<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('managing_bodies', function (Blueprint $table) {
            $table->id();
            $table->string('director');
            $table->text('speech')->nullable();
            $table->text('team_structure')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('managing_bodies');
    }
};
