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
        $table->id();
        $table->string('name'); // Colonna per il nome della categoria
        $table->timestamps();
    });

    $categories = ['politica', 'economia', 'food&drink', 'sport', 'intrattenimento', 'tech'];

    foreach ($categories as $category) {
        \App\Models\Category::create(['name' => $category]);
    }
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
