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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->bigInteger('customer_id')->nullable()->default(null)->references('id')->on('customers');
            $table->string('name')->nullable()->default(null);
            $table->string('species')->nullable()->default(null);
            $table->string('breed')->nullable()->default(null);
            $table->integer('year_birth')->nullable()->default(null);
            $table->boolean('is_sterilized')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
