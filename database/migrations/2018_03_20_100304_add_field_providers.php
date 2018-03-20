<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldProviders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('providers', function (Blueprint $table) {
            $table->string('full_name_provider')->nullable();
            $table->string('ur_address_provider')->nullable();
            $table->string('fz_address_provider')->nullable();
            $table->integer('inn_provider')->nullable();
            $table->integer('kpp_provider')->nullable();
            $table->integer('rsch_provider')->nullable();
            $table->integer('krch_provider')->nullable();
            $table->string('bancon_provider')->nullable();
            $table->integer('bik_provider')->nullable();
            $table->integer('ogrn_provider')->nullable();
            $table->string('telephone_provider')->nullable();
            $table->string('director_provider')->nullable();
            $table->string('email_provider')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('providers', function (Blueprint $table) {
            $table->dropColumn('full_name_provider')->nullable();
            $table->dropColumn('ur_address_provider')->nullable();
            $table->dropColumn('fz_address_provider')->nullable();
            $table->dropColumn('inn_provider')->nullable();
            $table->dropColumn('kpp_provider')->nullable();
            $table->dropColumn('rsch_provider')->nullable();
            $table->dropColumn('krch_provider')->nullable();
            $table->dropColumn('bancon_provider')->nullable();
            $table->dropColumn('bik_provider')->nullable();
            $table->dropColumn('ogrn_provider')->nullable();
            $table->dropColumn('telephone_provider')->nullable();
            $table->dropColumn('director_provider')->nullable();
            $table->dropColumn('email_provider')->nullable();
        });
    }
}
