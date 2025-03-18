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
        Schema::create('rendezvous', function (Blueprint $table) {
            $table->id();
            $table->date('dateRendezVous');
            $table->string('typeRendezVous');
            $table->string('descriptionRendezVous');
            $table->date('heureDebutRendezVous');
            $table->date('heureFinRendezVous');

            $table->unsignedBigInteger('idCommerciaux');
            $table->foreign('commerciaux')
				->references('id')
				->on('commerciaux')
				->onDelete('restrict')
				->onUpdate('restrict');

            $table->unsignedBigInteger('idClient');
            $table->foreign('clients')
                ->references('id')
                ->on('clients')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            
            $table->unsignedBigInteger('idUsers');
            $table->foreign('users')
                ->references('id')
                ->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendezvous');
    }
};
