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
        Schema::create('weekdays', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('day')->nullable();
            $table->string('name')->nullable();
        });

        DB::table('weekdays')->insert([
            ['day' => 1, 'name' => 'Domingo'],
            ['day' => 2, 'name' => 'Lunes'],
            ['day' => 3, 'name' => 'Martes'],
            ['day' => 4, 'name' => 'Miércoles'],
            ['day' => 5, 'name' => 'Jueves'],
            ['day' => 6, 'name' => 'Viernes'],
            ['day' => 7, 'name' => 'Sábado'],
        ]);

        Schema::create('timer_weekday', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('weekday_id')->unsigned();
            $table->foreign('weekday_id')->references('id')->on('weekdays');

            $table->bigInteger('timer_id')->unsigned();
            $table->foreign('timer_id')->references('id')->on('timers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timer_weekday');
        Schema::dropIfExists('weekdays');
    }
};
