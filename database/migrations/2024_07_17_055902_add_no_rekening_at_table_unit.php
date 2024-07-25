<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNoRekeningAtTableUnit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('unit', function (Blueprint $table) {
            $table->string('no_rekening')->after('namaUnit');
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
        Schema::table('unit', function (Blueprint $table) {
            $table->dropColumn('no_rekening');
        });
    }
}
