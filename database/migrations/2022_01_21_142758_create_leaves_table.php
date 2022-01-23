<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_leaves', function (Blueprint $table) {
            $table->id();
            $table->date('leave_date');
            $table->integer('long_leave')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('employee_id');
            $table->timestamps();
            $table->foreign('employee_id')->references('id')->on('tb_employees')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
}
