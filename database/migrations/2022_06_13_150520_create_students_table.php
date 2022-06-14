<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('fname', 20);
            $table->string('mname', 20);
            $table->string('lname', 20);
            $table->string('doa', 7)->nullable();
            $table->string('doc', 7)->nullable();
            $table->string('regno', 25);
            $table->decimal('cgpa', 2, 1);
            $table->string('cert_no', 25);
            $table->foreignId('program_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
