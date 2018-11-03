<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('companyId');
            $table->foreign('companyId')->references('id')->on('companies')->onDelete('cascade');
            $table->unsignedInteger('userId');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->string('deliverDate');
            $table->boolean('open')->default(true);
            $table->softDeletes();
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
        Schema::dropIfExists('OrdersTableSeeder');
    }
}
