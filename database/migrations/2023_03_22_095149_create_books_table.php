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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('publisher');
            $table->string('isbn');
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->string('language')->nullable();
            $table->integer('pages')->nullable();
            $table->integer('year')->nullable();
            $table->string('edition')->nullable();
            $table->string('size')->nullable();
            $table->string('weight')->nullable();
            $table->double('price')->nullable();
            $table->integer('stock')->default(0);
            $table->boolean('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
