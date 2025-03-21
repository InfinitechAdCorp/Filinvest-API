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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('property_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('landline');
            $table->string('mobile');
            $table->string('email');
            $table->string('city');
            $table->string('country');
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
