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
        Schema::create('organisation_locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('organisation_id',false);
            $table->foreign('organisation_id')->references('id')->on('organisations');
            $table->string('address1',64);
            $table->string('address2',64)->nullable();
            $table->string('city',64);
            $table->string('state',64);
            $table->string('country',64);
            $table->string('phone',13)->nullable();
            $table->string('fax',13)->nullable();
            $table->boolean('is_primary')->default(0);
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
        Schema::dropIfExists('organisation_locations');
    }
};
