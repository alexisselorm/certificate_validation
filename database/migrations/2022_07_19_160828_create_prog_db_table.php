<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgDbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prog_db', function (Blueprint $table) {
            // $table->string('progid', 6)->default('000000')->primary();
            $table->id('progid');
            $table->integer('facultyid')->default(0);
            $table->integer('deptid')->default(1);
            $table->string('long_name', 100)->default('');
            $table->string('short_name', 100)->default('');
            $table->boolean('major_combination')->default(true);
            $table->string('prefix', 7)->default('');
            $table->string('duration', 10)->default('0');
            $table->unsignedBigInteger('progtype')->default(1);
            $table->unsignedBigInteger('runtype')->default(0);
            $table->integer('graduating_credit')->default(0);
            $table->unsignedInteger('degreeid')->default(0);
            $table->integer('status')->nullable();


            // Foreign key constraints
            $table->foreign('runtype')->references('runtype')->on('prog_runtypes');
            $table->foreign('progtype')->references('type')->on('prog_types');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prog_db');
    }
}
