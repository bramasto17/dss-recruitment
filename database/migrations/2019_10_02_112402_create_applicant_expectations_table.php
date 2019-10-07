<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantExpectationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_expectations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('applicant_id')->nullable();
            $table->foreign('applicant_id')->references('id')->on('applicants');
            $table->unsignedInteger('expectation_id')->nullable();
            $table->foreign('expectation_id')->references('id')->on('expectations');
            $table->integer('grade');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicant_expectations');
    }
}
