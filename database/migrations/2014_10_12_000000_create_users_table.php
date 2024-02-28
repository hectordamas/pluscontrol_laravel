<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->rememberToken();

            $table->string('avatar')->nullable();
            $table->string('role')->nullable(); //Usuario, Administrador
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('identification_card')->nullable();
            $table->string('age')->nullable();
        });

        $user = new \App\Models\User();
        $user->name = "Héctor Damas";
        $user->role = "Administrador";
        $user->email = "hectorgabrieldm@hotmail.com";
        $user->password = bcrypt("alinware98_");
        $user->save();
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
