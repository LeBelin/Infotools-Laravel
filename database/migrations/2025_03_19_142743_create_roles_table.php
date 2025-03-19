<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Création de la table roles
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Le nom du rôle (par exemple, 'admin', 'client', etc.)
            $table->timestamps();
        });

        // Ajouter la colonne role_id à la table users pour lier un utilisateur à un rôle
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
        });
    }

    public function down()
    {
        // Supprimer la relation et la colonne role_id dans la table users
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });

        // Supprimer la table roles
        Schema::dropIfExists('roles');
    }
};
