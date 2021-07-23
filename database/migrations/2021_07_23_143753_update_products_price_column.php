<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProductsPriceColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('price', 15,10)->default(0)->change();
            $table->decimal('discount_price', 15,10)->nullable()->default(0)->change();
            $table->decimal('capacity', 15,10)->nullable()->default(0)->change();
            $table->decimal('package_items_count', 15,10)->nullable()->default(0)->change(); // added
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('price', 8, 2)->default(0)->change();
            $table->decimal('discount_price', 8, 2)->nullable()->default(0)->change();
            $table->decimal('capacity', 9, 2)->nullable()->default(0)->change();
            $table->decimal('package_items_count', 9, 2)->nullable()->default(0)->change(); // added
        });
    }
}
