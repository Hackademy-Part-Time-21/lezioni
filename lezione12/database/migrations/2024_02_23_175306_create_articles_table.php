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
        Schema::create('articles', function (Blueprint $table) {
            $table->id(); //crea il campo id 
            /* id sarà 
                bigint 
                unsigned -->( perché non si possono avere id negativi)
                auto_increment
            */
            $table->string('title', 50); // i titoli sono delle stringhe di massimo 50 cartteri
            $table->text('content');
            $table->timestamps(); // crea i campi created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
