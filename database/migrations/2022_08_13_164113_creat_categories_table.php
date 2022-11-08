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
        Schema::create('categories',function(Blueprint $table){
            
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable()->default(123);
            $table->tinyInteger('status')->default('0')->comment('0==visible,1==hidden');
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
