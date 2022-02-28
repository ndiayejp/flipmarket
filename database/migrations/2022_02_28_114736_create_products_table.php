<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_fr');
            $table->string('name_en');
            $table->string('slug_fr');
            $table->string('slug_en');
            $table->string('code');
            $table->integer('quantity');
            $table->string('tags_fr');
            $table->string('tags_en');
            $table->string('size_fr')->nullable();
            $table->string('size_en')->nullable();
            $table->string('color_fr');
            $table->string('color_en');
            $table->float('selling_price');
            $table->float('discount_price')->nullable();
            $table->string('short_description_fr');
            $table->string('short_description_en');
            $table->text('long_description_fr');
            $table->text('long_description_en');
            $table->string('thumbnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0);

            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('sub_category_id')->constrained()->onDelete('cascade');
            $table->foreignId('sub_sub_category_id')->constrained()->onDelete('cascade');
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
}
