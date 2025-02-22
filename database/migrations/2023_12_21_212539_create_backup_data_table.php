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
        Schema::create('backup_data', function (Blueprint $table) {
            $table->id();
            $table->string('stockName');
            $table->string('stockPrice');
            // $table->string('numberOfStocks');
            $table->string('quantity');
            $table->string('amount');
            // $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backup_data');
    }
};
