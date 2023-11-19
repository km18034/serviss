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
        Schema::create('auto_model', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->boolean('is_public')->default(false);
            $table->unsignedBigInteger('auto_brand_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('auto_brand_id')->references('id')->on('auto_brand')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auto_model');
    }
};
