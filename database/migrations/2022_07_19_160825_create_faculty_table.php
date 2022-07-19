<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty', function (Blueprint $table) {
            $table->unsignedInteger('facultyid')->default(0)->primary();
            $table->string('long_name', 100)->default('');
            $table->string('short_name', 50)->default('');
            $table->unsignedInteger('collegeid')->nullable();
            $table->string('type', 15)->default('Academic');
            $table->tinyInteger('fte_norms')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculty');
    }
}
