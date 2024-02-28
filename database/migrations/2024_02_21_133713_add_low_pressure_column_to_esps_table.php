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
        Schema::table('esps', function (Blueprint $table) {
            $table->float('lowPressure', 100, 2)->default(0);
            $table->float('highPressure', 100, 2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('esps', function (Blueprint $table) {
            //
        });
    }
};
