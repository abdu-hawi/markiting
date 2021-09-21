<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesmanStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salesman_store', function (Blueprint $table) {
            $table->id();
            $table->foreignId("company_id")->constrained();
            $table->foreignId("package_id")->constrained();
            $table->foreignId("salesman_id")->constrained();
            $table->foreignId("store_id")->constrained();
            $table->boolean("isStorePay")->default(0);
            $table->text('store_data');
            $table->text('package_data');
            $table->timestamp('paid_at');
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
        Schema::dropIfExists('salesman_store');
    }
}
