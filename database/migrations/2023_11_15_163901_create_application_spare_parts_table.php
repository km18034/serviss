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
        Schema::create('application_spare_parts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id')->unsigned();
            $table->unsignedBigInteger('spare_part_id')->unsigned();
            $table->integer('amount')->default(1);
            
            $table->timestamps();

            $table->foreign('application_id')->references('id')->on('application')->onDelete('cascade');
            $table->foreign('spare_part_id')->references('id')->on('spare_parts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_spare_parts');
    }
};
