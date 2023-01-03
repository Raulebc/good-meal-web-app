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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('pickup_date')->nullable();
            $table->string('pickup_time')->nullable();
            $table->json('items');
            $table->integer('delivery_fee')->default(0);
            $table->integer('total');
            $table->unsignedTinyInteger('status')->default(1); 

            $table->foreignId('store_id')->constrained()->onDelete('cascade');

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
        
        Schema::dropIfExists('purchase_orders');
        
        Schema::enableForeignKeyConstraints();
    }
};
