<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_bill');
            $table->unsignedBigInteger('id_sanpham');
            $table->integer('quantity');
            $table->double('unit_price');
            $table->foreign('id_bill')->references('id')->on('bills');
            $table->foreign('id_sanpham')->references('id')->on('sanpham');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_detail');
    }
}
