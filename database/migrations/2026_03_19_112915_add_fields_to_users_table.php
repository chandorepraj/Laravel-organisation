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
        Schema::table('users', function (Blueprint $table) {
        $table->string('phone')->nullable();
        $table->string('fax')->nullable();
        $table->string('verification_code')->nullable();
        $table->string('is_verified')->nullable();
        $table->string('user_type')->nullable();
        $table->boolean('is_deleted')->default(false);
        $table->string('authentication_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'fax', 'verification_code','is_verified', 'user_type', 'is_deleted', 'authentication_token']);
        });
    }
};
