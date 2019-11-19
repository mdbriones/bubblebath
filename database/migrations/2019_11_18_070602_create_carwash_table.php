<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarwashTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carwash', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customerName')->nullable();
            $table->string('plateNumber');
            $table->string('model');
            $table->string('email')->nullable();
            $table->date('dateOfService');
            $table->decimal('bodyWash', 9,2)->default(0);
            $table->decimal('handWax', 9,2)->default(0);
            $table->decimal('engineWash', 9,2)->default(0);
            $table->decimal('armorAll', 9,2)->default(0);
            $table->decimal('orbitalWax', 9,2)->default(0);
            $table->decimal('underWash', 9,2)->default(0);
            $table->decimal('asphaltRemoval', 9,2)->default(0);
            $table->decimal('seatCover', 9,2)->default(0);
            $table->decimal('leatherConditioning', 9,2)->default(0);
            $table->decimal('interior', 9,2)->default(0);
            $table->decimal('exterior', 9,2)->default(0);
            $table->decimal('glassDetail', 9,2)->default(0);
            $table->decimal('engineDetail', 9,2)->default(0);
            $table->decimal('full', 9,2)->default(0);
            $table->string('payment_method');
            $table->integer('paid')->comment('0-UnPaid, 1-Paid')->default(0);
            $table->timestamps();
            $table->integer('id_delete')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carwash');
    }
}
