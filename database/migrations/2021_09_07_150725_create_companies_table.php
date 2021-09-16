<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId("market_id")->constrained();
            $table->foreignId("country_id")->constrained();
            $table->foreignId("city_id")->constrained();
            $table->foreignId("geolocation_id")->constrained();
            $table->string("company_code",2);
            $table->timestamp('expire_date');
            $table->enum("amount_type",["percent","fixed"])->comment("type of discount for store");
            $table->float("amount")->comment("number of discount for store");
            $table->float("sales_owed")->comment("percent of market client");
            $table->boolean("isActive")->default(true);
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
        Schema::dropIfExists('companies');
    }
}
