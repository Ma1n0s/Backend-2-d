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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('OGRN')->nullable();
            $table->string('OKPO')->nullable();
            $table->string('BIC')->nullable();
            $table->string('postalCode')->nullable();
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('home')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }

};
