<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('application_id')->nullable();
            $table->foreign('application_id')->references('id')->on('applications');
            $table->unsignedInteger('skill_type_id')->nullable();
            $table->foreign('skill_type_id')->references('id')->on('skill_types');
            $table->string('name');
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
        Schema::dropIfExists('applicant_skills');
    }
}
