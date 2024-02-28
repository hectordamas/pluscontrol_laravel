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
        Schema::create('phone_tokens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('device_token');
            
            $table->bigInteger('esp_id')->unsigned();
            $table->foreign('esp_id')->references('id')->on('esps');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone_tokens');
    }
};
