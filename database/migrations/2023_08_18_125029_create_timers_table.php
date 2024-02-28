<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('timers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title')->nullable();

            $table->integer('hour_start')->nullable();
            $table->integer('minute_start')->nullable();

            $table->integer('hour_end')->nullable();
            $table->integer('minute_end')->nullable();
            
            $table->bigInteger('esp_id')->unsigned();
            $table->foreign('esp_id')->references('id')->on('esps');
        });

        $title = ['Primer Horario', 'Segundo Horario', 'Tercer Horario'];
        for ($i = 0; $i < count($title); $i++) {
            $timer = new App\Models\Timer();
            $timer->title = $title[$i];
            $timer->esp_id = 1;
            $timer->save();
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('timers');
    }
};
