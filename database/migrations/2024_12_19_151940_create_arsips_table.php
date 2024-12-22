<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('arsips', function (Blueprint $table) {
            $table->id(); //ini bawaan laravel untuk id primary key
            $table->string('nama');
            $table->string('nomor');
            $table->dateTime('tanggal'); 
            $table->string('kategori')->default('1');
            $table->timestamps(); // ini bawaan juga timestamp akan menghasilkan dua kolom createAt & updateAt
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsips');
    }
};
