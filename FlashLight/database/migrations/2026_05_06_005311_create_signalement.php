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
        Schema::create('signalement', function (Blueprint $table) {
            $table->id('id_signalement')->autoIncrement();
            $table->string('categorie');
            $table->string('titre');
            $table->text('description');
            $table->string('quartier');
            $table->string('adresse');
            $table->string('latitude')->nullable();// Utiliser string pour stocker les coordonnées GPS
            $table->string('longitude')->nullable();
            $table->string('type_urgence');
            $table->json('photo')->nullable(); // Stocker les chemins des photos dans un champ JSON
            $table->string('etat')->default('En attente');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signalement');
    }
};
