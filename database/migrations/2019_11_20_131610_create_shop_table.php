<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_')->nullable();
            $table->string('plateNumber_')->nullable();
            $table->string('make_model_')->nullable();
            $table->date('date_')->nullable();
            $table->string('email_')->nullable();
            $table->string('terms_')->nullable();
            $table->string('service_description_')->nullable();
            $table->decimal('service_amount_')->default(0);
            $table->integer('paid')->default('0')->comment('0-notPaid 1-Paid');
            $table->text('is_delete')->comment('0-NotDeleted 1-deleted')->default(0);
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
        Schema::dropIfExists('shop');
    }
}
