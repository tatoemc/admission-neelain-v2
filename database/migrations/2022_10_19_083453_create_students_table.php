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
            $table->unsignedBigInteger('faculty_id')->unsigned()->nullable();
            $table->unsignedBigInteger('dept_id')->unsigned()->nullable();
            $table->unsignedBigInteger('degree_id')->unsigned()->nullable();
            $table->unsignedBigInteger('gender_id')->unsigned()->default(1);
            $table->unsignedBigInteger('doc_id')->unsigned(); 
            $table->unsignedBigInteger('admissiontype_id')->unsigned(); 
            $table->string('frmno');
            $table->string('N1');
            $table->string('N2');
            $table->string('N3');
            $table->string('N4');
            $table->string('SCHS');
            $table->string('N_FACS');
            $table->string('ENTS');
            $table->string('old_faculty');
            $table->string('dept_name'); 
            $table->softDeletes();
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
