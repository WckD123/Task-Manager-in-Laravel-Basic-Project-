<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPkToTableTaskUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_user', function (Blueprint $table) {
            //
        });
        DB::statement('ALTER TABLE task_user ADD PRIMARY KEY(user_id,task_id)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_user', function (Blueprint $table) {
            //
        });
        DB::statement('ALTER TABLE task_user DROP PRIMARY KEY');
    }
}
