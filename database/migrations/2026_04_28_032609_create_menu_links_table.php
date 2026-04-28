<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_links', function (Blueprint $table) {
            $table->id();
            $table->string('group');          // e.g. "Profil", "Perangkat Daerah", "Aduan", "Data"
            $table->string('label');           // Display name e.g. "BUMD"
            $table->string('url');             // The target URL
            $table->boolean('is_external')->default(true);  // Opens in new tab
            $table->integer('order')->default(0);           // Sort order within group
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_links');
    }
};
