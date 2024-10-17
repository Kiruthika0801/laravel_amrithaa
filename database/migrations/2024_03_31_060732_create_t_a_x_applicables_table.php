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
        Schema::create('t_a_x_applicables', function (Blueprint $table) {
            $table->id();
            $table->string('tax_applicable')->nullable();
            $table->timestamps();
        });
        DB::table('t_a_x_applicables')->insert([
            ['tax_applicable' => 'none'],
            ['tax_applicable' => 'Exclusive'],
            ['tax_applicable' => 'Professional'],
            ['tax_applicable' => 'Entertainment'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_a_x_applicables');
    }
};
