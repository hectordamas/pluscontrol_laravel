<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('esps', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('device_id')->unique();
            $table->string('name');
            $table->string('plan');

            $table->string('status')->default('offline');
            $table->timestamp('last_session')->nullable();
            $table->timestamp('expiration_date')->nullable();

            $table->integer('flujo')->default(0);
            $table->integer('bajo_nivel')->default(0);
            $table->integer('wifi')->default(0);
            $table->integer('automatico')->default(0);
            $table->integer('salida_valvula')->default(0);
            $table->integer('sin_suministro')->default(0); 
            
            $table->float('high', 100, 2)->default(0);
            $table->float('volume', 100, 2)->default(0);
        });

        Schema::create('esp_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('esp_id')->unsigned();
            $table->foreign('esp_id')->references('id')->on('esps');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('role')->nullable();
            $table->string('alias')->nullable();
            $table->string('main')->nullable();
            $table->timestamp('payment')->nullable();
        });

        $esp = new App\Models\Esp();
        $esp->name = 'Tanque BMX';
        $esp->plan = 'Plus Master';
        $esp->bajo_nivel = 1;
        $esp->wifi = 1;
        $esp->high = 3.20;
        $esp->volume = 80000;
        $esp->device_id = Str::uuid(); 
        $esp->expiration_date = Carbon::now()->addYear();
        $esp->save();

        $esp->users()->attach([
            '1' => [
                'role' => 'Administrador',
                'alias' => 'Tanque BMX',
                'main' => 'Sí'
            ]
        ]);
        $esp->save();
    }

    public function down(): void
    {
        Schema::dropIfExists('esp_user');
        Schema::dropIfExists('esps');
    }
};
