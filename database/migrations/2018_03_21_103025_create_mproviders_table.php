<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMprovidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mproviders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_con_p');
            $table->string('surname_con_p')->nullable();
            $table->string('patronymic_con_p')->nullable();
            $table->string('position_con_p')->nullable();
            $table->string('mobile_con_p')->nullable();
            $table->string('office_con_p')->nullable();
            $table->integer('officedob_con_p')->nullable();
            $table->string('email_con_p')->nullable();
            $table->integer('provider_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('mproviders');
    }
}
