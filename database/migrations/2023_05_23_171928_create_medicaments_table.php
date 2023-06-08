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
        Schema::create('medicaments', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description');
            $table->string('dosage');
            $table->string('fabricant');
            $table->decimal('prix_unitaire', 8, 2);
            $table->integer('quantite_en_stock');
            $table->date('date_expiration');
            $table->foreignId('categorie_id')->constrained();
            $table->foreignId('emplacement_id')->constrained();
            $table->foreignId('fournisseur_id')->constrained();

            
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicaments');
    }
};
