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
        Schema::create('prod_tab', function (Blueprint $table) {
            $table->id();
            $table -> string('name');
			$table -> string('type');
			$table -> string('brand');
			$table -> decimal('mrp',10,2);
			$table -> decimal('buy_price',10,2);
			$table -> decimal('sell_price',10,2);
			$table -> unsignedInteger('quantity') -> default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prod_tab');
    }
};
