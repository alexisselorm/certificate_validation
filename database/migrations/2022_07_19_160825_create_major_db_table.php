<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMajorDbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('major_db', function (Blueprint $table) {
            $table->increments('majorid');
            $table->unsignedInteger('subjectid_1')->nullable()->default(0);
            $table->unsignedInteger('subjectid_2')->nullable()->default(0);
            $table->unsignedInteger('subjectid_3')->nullable()->default(0);
            $table->unsignedInteger('subjectid_4')->nullable()->default(0);
            $table->string('progid', 6)->default('');
            $table->integer('level')->default(0);
            $table->string('comments', 100)->default('');
            $table->integer('deptid')->default(0);

            $table->index(['subjectid_1', 'subjectid_2', 'subjectid_3', 'subjectid_4', 'progid', 'level'], 'majorcode');
            $table->index(['progid', 'level'], 'progid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('major_db');
    }
}
