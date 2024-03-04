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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('subject',200);
            $table->text('description');
            $table->integer('priority')->default(2); //1 = bassa // 2 = media // 3 = alta
            $table->string('image')->nullable();
            $table->integer('status')->default(1); //1 = aperto // 2 = in lavorazione // 3 = chiuso
            $table->text('answer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
