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
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('assignUserId')->nullable();
            $table->unsignedBigInteger('project_id')->nullable();

            // Add foreign key constraints if needed
            // $table->foreign('createrId')->references('id')->on('users');
            $table->foreign('assignUserId')->references('id')->on('users');
            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn(['assignUserId', 'project_id']);
        });
    }
};
