<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('project_id');
            $table->string('project_name');
            $table->longText('project_description');
            $table->string('project_category');
            $table->integer('project_constituency')->unsigned();
            $table->foreign('project_constituency')->references('constituency_id')->on('constituencies')->onDelete('cascade');
            $table->string('project_ward');
            $table->bigInteger('budget');
            $table->integer('completion');
            $table->string('contractor');
            $table->date('due_date');
            $table->string('added_by');
            $table->integer('project_status');
            $table->integer('balance');
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
        Schema::dropIfExists('projects');
    }
}
