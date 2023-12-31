<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('slug');
            $table->text('sort_desc')->nullable();
            $table->text('desc')->nullable();
            $table->string('tages')->nullable();
            $table->unSignedInteger('quentity')->default(1);
            $table->integer('regular_price')->default(0);
            $table->integer('offer_price')->nullable();
            $table->string('sku_code')->nullable();
            $table->integer('product_type')->default(0)->comment('0 for new 1 for old');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('featured_item')->default(0)->comment('0 for normarl 1 for Featured');
            $table->integer('status')->default(0)->comment('0 for inactive 1 for active');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
