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
        Schema::create('esp_logs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float('level', 100, 2)->nullable();
            $table->float('pressure', 100, 2)->nullable();
            $table->float('litrosPorMinuto', 100, 2)->nullable();
            $table->float('litrosPorMinuto2', 100, 2)->nullable();

            $table->string('device_id')->nullable();

            $table->bigInteger('esp_id')->unsigned();
            $table->foreign('esp_id')->references('id')->on('esps');
        });

        $esplog = new App\Models\EspLog();
        $esplog->level = 0;
        $esplog->pressure = 0;
        $esplog->litrosPorMinuto = 0;
        $esplog->litrosPorMinuto2 = 0;
        $esplog->esp_id = 1;
        $esplog->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('esp_logs');
    }
};
