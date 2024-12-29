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
        
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('fname')->nullable();
            $table->string('message')->nullable();
            $table->string('subject')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->integer('status')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
