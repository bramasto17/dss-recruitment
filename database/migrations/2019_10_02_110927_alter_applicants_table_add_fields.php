<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterApplicantsTableAddFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicants', function($table) {
            $table->string('address')->after('birthday');
            $table->string('gender')->after('address');
            $table->string('religion')->after('gender');
            $table->integer('marital_status')->after('address');
            $table->char('phone',20)->after('marital_status');
            $table->string('email')->after('phone');
            $table->char('id_card_no',20)->after('email');
            $table->string('id_card_address')->after('id_card_no');
            $table->char('npwp_no',20)->after('id_card_address');
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
    }
}
