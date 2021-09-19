<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
//            $table->foreignId('role_market_id')->constrained();
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger("mobile");
            $table->boolean("isActive")->default(false);
            $table->enum("type",["market","company","sales"]);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
//            $table->foreignId('current_team_id')->nullable();
//            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('markets');
    }
}
