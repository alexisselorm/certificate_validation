<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseDbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_db', function (Blueprint $table) {
            $table->increments('courseid');
            $table->boolean('scoring')->default(false);
            $table->string('code', 10)->default('')->unique('code');
            $table->string('title', 200)->default('');
            $table->integer('credits')->default(3);
            $table->integer('level')->default(0);
            $table->integer('deptid')->default(0);
            $table->integer('semester')->default(0);
            $table->unsignedInteger('precode')->nullable();
            $table->integer('status')->default(1);
            $table->integer('type')->default(1);
            $table->unsignedInteger('related')->nullable();
            $table->unsignedInteger('sheet_id')->default(1);
            $table->string('survey_type', 11);

            $table->index(['code'], 'indexcode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_db');
    }
}
