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
        Schema::table('articles', function (Blueprint $table) {
            
            $table->unsignedBigInteger('category_id')->nullable()->after('image'); //creato la colonna che conterrà l'id di categoria
            $table->foreign('category_id')->references('id')->on('categories');
            //foreign('il nome della colonna chiave esterna')->references('chiave primaria associata')->on('nome della tabella alla quale ci stiamo collegando')
        
            // $table->foreignId('category_id')->constrained(); 
            // assume che esista un campo id all'interno di una tabella categories
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign(['category_id']); // rimuovendo il vincolo di referenza
            $table->dropColumn('category_id');
        });
    }
};
