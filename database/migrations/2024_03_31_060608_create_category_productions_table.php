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
        Schema::create('category_productions', function (Blueprint $table) {
            $table->id();
            $table->string('category_name')->nullable();
            $table->timestamps();
        });
        DB::table('category_productions')->insert([
            ['category_name' => 'Mobiles, Computers'],
            ['category_name' => 'TV, Appliances, Electronics'],
            ['category_name' => 'Men\'s Fashion'],
            ['category_name' => 'Women\'s Fashion'],
            ['category_name' => 'Home, Kitchen, Pets'],
            ['category_name' => 'Beauty, Health, Grocery'],
            ['category_name' => 'Books'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_productions');
    }
};
