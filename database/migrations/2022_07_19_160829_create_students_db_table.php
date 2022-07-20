<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsDbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_db', function (Blueprint $table) {
            // $table->increments('studid');
            $table->id('studid');
            $table->string('regno', 30)->nullable()->unique('regno');
            $table->string('lname', 50)->nullable()->index('lname');
            $table->string('fname', 50)->nullable()->index('fname');
            $table->string('mname', 50)->nullable()->index('mname');
            $table->boolean('verified')->nullable()->default(false);
            $table->dateTime('verification_date')->nullable();
            $table->string('title', 8)->nullable();
            $table->char('sex', 1)->nullable();
            $table->enum('marital_status', ['Single', 'Married', 'Divorced', 'Widowed'])->default('Single');
            $table->string('workplace_id', 200);
            $table->date('dob')->nullable();
            $table->string('doa', 7)->nullable();
            $table->string('doc', 7)->nullable();
            $table->string('progid', 6)->nullable();
            $table->string('majorid', 5)->nullable();
            $table->char('level', 3)->nullable();
            $table->char('entrylevel', 3)->nullable();
            $table->tinyInteger('entry_modeid')->nullable();
            $table->string('hallid', 8)->nullable()->default('NONE');
            $table->unsignedInteger('centreid')->default(1);
            $table->string('resident_status', 12)->nullable();
            $table->string('room_no', 10)->nullable();
            $table->string('non_res_add', 100)->nullable();
            $table->string('gps_address', 20)->nullable();
            $table->string('ssnit', 13)->nullable();
            $table->string('pob_town', 50)->nullable();
            $table->unsignedInteger('pob_region')->nullable();
            $table->string('nationality', 50)->nullable();
            $table->unsignedTinyInteger('nationalityid');
            $table->string('hometown', 50)->nullable();
            $table->string('post_box', 200)->nullable();
            $table->string('post_town', 20)->nullable();
            $table->string('homeadd', 80)->nullable();
            $table->string('homephone', 20)->nullable();
            $table->string('cellphone', 30)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('previous_name', 100)->nullable();
            $table->integer('status')->default(1)->index('status');
            $table->integer('studyleave')->default(0);
            $table->unsignedInteger('schoolid')->nullable()->default(0);
            $table->integer('applicant_id')->nullable()->unique('applicant_id');
            $table->char('paytype', 2)->default('NR');
            $table->char('taking_ssnit', 1)->nullable();
            $table->integer('loan_take_times')->nullable();
            $table->unsignedInteger('bank_branchid')->nullable();
            $table->string('bank_account', 30)->nullable();
            $table->integer('completed')->default(0);
            $table->integer('graduate')->default(0);
            $table->integer('withdrawn')->nullable();
            $table->boolean('biometric_enrolment')->nullable()->default(false);
            $table->dateTime('biometric_enrolment_date')->nullable();
            $table->integer('card_print')->default(0)->comment('indicates whether ID card has been printed');
            $table->decimal('cgpa', 3, 1)->nullable();
            $table->decimal('cgpa_raw', 5, 4)->nullable();
            $table->char('cert_no', 8)->nullable()->unique('cert_no');
            $table->integer('idcardstatus');
            $table->unsignedInteger('disabilityid')->nullable()->default(0);
            $table->string('ref_no', 25)->index('ref_no');
            $table->string('admission_no', 25)->nullable()->default('');
            $table->string('teachers_regno', 11)->nullable();
            $table->string('alt_email', 100)->nullable();
            $table->string('inst_email', 100)->nullable()->unique('inst_email');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->dateTime('updated_at')->nullable();

            $table->index(['regno'], 'regno_2');
            $table->unique(['regno', 'inst_email'], 'regno_3');
            $table->unique(['regno', 'email'], 'regno_4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_db');
    }
}
