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
        Schema::create('message_appointments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('email');
            $table->date('date');
            $table->time('time');
            $table->text('message');
        });
    }
//            $table->bigInteger('phone_no');
//            $table->string('email')->nullable();
//            $table->time('time');
//            $table->date('date');
//            $table->string('service');
//            $table->timestamps();
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_appointments');
    }
};
