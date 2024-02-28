<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('whatsapps', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger("number")->unsigned()->nullable();
            $table->longText("link")->nullable();
        });

        $whatsapp = new \App\Models\Whatsapp();
        $whatsapp->number = 584242904810;
        $whatsapp->link = "https://api.whatsapp.com/send?phone=584242904810&text=¡Hola! Necesito ayuda con relación a la App de PlusControl";
        $whatsapp->save();
    }

    public function down(): void
    {
        Schema::dropIfExists('whatsapps');
    }
};
