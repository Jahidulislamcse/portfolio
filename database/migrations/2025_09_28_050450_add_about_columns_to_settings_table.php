<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('about_header')->nullable()->after('linkedin');
            $table->text('about_desc')->nullable()->after('about_header');
            $table->string('branches_header')->nullable()->after('about_desc');
            $table->text('branches_desc')->nullable()->after('branches_header');
            $table->text('mission_vision')->nullable()->after('branches_header');

        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['about_header', 'about_desc','branches_header', 'branches_desc']);
        });
    }
};
