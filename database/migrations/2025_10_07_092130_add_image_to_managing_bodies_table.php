<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('managing_bodies', function (Blueprint $table) {
            $table->string('image')->nullable()->after('team_structure');
        });
    }

    public function down(): void
    {
        Schema::table('managing_bodies', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
