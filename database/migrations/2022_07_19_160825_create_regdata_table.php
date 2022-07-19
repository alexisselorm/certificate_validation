<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regdata', function (Blueprint $table) {
            $table->increments('regid');
            $table->string('regcode', 26)->default('')->unique('regcode');
            $table->unsignedInteger('studid')->default(0)->index('studid');
            $table->unsignedInteger('courseid')->default(0);
            $table->integer('session')->default(0);
            $table->integer('regtype')->nullable()->default(0);
            $table->unsignedTinyInteger('mycredits');
            $table->integer('audit')->nullable()->default(0);
            $table->unsignedInteger('groupnum')->nullable()->default(0)->index('group');

            $table->unique(['regcode'], 'regcode_2');
            $table->unique(['regcode'], 'regcode_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regdata');
    }
}
