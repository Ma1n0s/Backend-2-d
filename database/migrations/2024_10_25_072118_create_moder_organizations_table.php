<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('moder_organizations', function (Blueprint $table) {
            $table->id();
            $table->string('inn_comp');
            $table->string('OGRN')->nullable();
            $table->string('OKPO')->nullable();
            $table->string('BIC')->nullable();
            $table->string('street');
            $table->string('home');
            $table->string('region');
            $table->string('site');
            $table->string('comment')->nullable();
            $table->string('file')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moder_organizations');
    }
};
