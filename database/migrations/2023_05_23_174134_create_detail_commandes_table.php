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
        Schema::create('detail_commandes', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('commande_id');
            // $table->unsignedBigInteger('medicament_id');
            $table->integer('quantite_commandee');
            $table->decimal('prix_unitaire_commande', 8, 2);
            $table->foreignId('commande_id')->constrained();
            $table->foreignId('medicament_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_commandes');
    }
};
