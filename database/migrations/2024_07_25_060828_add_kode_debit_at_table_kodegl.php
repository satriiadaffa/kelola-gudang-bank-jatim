<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKodeDebitAtTableKodegl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('kodegl', function (Blueprint $table) {
            $table->string('kode_debit')->after('kode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('kodegl', function (Blueprint $table) {
            $table->dropColumn('kode_debit');
        });
    }
}
