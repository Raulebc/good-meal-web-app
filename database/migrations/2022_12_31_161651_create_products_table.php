<?php

use App\Models\Categories\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            $table->integer('discount')->nullable();
            $table->integer('stock')->default(0);
            $table->string('image')->nullable();
            $table->foreignId('category_id')
                ->constrained()
                ->onDelete('set default')
                ->default(Category::NO_CATEGORY);
            $table->foreignId('store_id')
                ->constrained()
                ->onDelete('cascade');
            
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
        Schema::disableForeignKeyConstraints();
        
        Schema::dropIfExists('products');
        
        Schema::enableForeignKeyConstraints();
    }
};
