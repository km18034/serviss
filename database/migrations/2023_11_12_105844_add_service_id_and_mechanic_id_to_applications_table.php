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
        Schema::table('applications', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id')->unsigned();
            $table->unsignedBigInteger('mechanic_id')->unsigned();

            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('mechanic_id')->references('id')->on('admin_user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn('service_id');
            $table->dropColumn('mechanic_id');
        });
    }
};
