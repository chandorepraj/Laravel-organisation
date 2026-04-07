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
        Schema::create('organisations', function (Blueprint $table) {
            $table->id();
            $table->string('organisation_name',100);
            $table->string('organisation_type',15)->default('practice');
            $table->bigInteger('npi',false)->nullable();
            $table->string('voip_number',20)->nullable();
            $table->boolean('is_deleted')->default(0);
            $table->unsignedBigInteger('created_by',false);
            $table->foreign('created_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisations');
    }
};
