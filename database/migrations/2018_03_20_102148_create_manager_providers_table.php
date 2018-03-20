<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagerProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_con_p');
            $table->string('surname_con_p')->nullable();
            $table->string('patronymic_con_p')->nullable();
            $table->string('position_con_p')->nullable();
            $table->integer('mobile_con_p')->nullable();
            $table->integer('office_con_p')->nullable();
            $table->integer('officedob_con_p')->nullable();
            $table->string('email_con_p')->nullable();
            $table->integer('id_provider');
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
        Schema::dropIfExists('manager_providers');
    }
}
