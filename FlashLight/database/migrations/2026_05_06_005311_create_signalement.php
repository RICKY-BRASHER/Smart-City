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
        Schema::create('categories', function (Blueprint $table) {
            $table->id('id_categorie')->autoIncrement();
            $table->string('icone_categorie')->unique();
            $table->string('nom_categorie');
        });

        DB::table('categories')->insert([
            ['nom_categorie' => 'Etat Routier', 'icone_categorie' => 'bi-road-front'],
            ['nom_categorie' => 'Eclairage',    'icone_categorie' => 'bi-lightbulb'],
            ['nom_categorie' => 'Ordures',      'icone_categorie' => 'bi-trash'],
            ['nom_categorie' => 'Inondation',   'icone_categorie' => 'bi-water'],
            ['nom_categorie' => 'Espaces verts','icone_categorie' => 'bi-tree'],
            ['nom_categorie' => 'Incidents',    'icone_categorie' => 'bi-exclamation-octagon'],
            ['nom_categorie' => 'Fuites D\'eau','icone_categorie' => 'bi-droplet'],
            ['nom_categorie' => 'Travaux',      'icone_categorie' => 'bi-cone-striped'],
            ['nom_categorie' => 'General',      'icone_categorie' => 'bi-info-circle'],

        ]);

        Schema::create('signalement', function (Blueprint $table) {
            $table->id('id_signalement')->autoIncrement();
            $table->unsignedBigInteger('id_categorie');
            $table->foreign('id_categorie')->references('id_categorie')->on('categories')->onDelete('cascade');
            $table->string('titre');
            $table->text('description');
            $table->string('quartier');
            $table->string('adresse');
            $table->string('latitude')->nullable();// Utiliser string pour stocker les coordonnées GPS
            $table->string('longitude')->nullable();
            $table->enum('type_urgence', ['Basse', 'Moyenne', 'Haute'])->default('Moyenne');
            $table->enum('etat', ['En attente', 'En cours', 'Résolu', 'Rejeté'])->default('En attente');
            $table->json('photo')->nullable(); // Stocker les chemins des photos dans un champ JSON
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
