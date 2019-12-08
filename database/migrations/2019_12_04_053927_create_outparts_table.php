<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutpartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outparts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('out_date')->nullable();
            $table->string('description')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('amount', 18, 4)->nullable();
            $table->string('supplier')->nullable();
            $table->integer('paid')->default(0);
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
        Schema::dropIfExists('outparts');
    }
}
