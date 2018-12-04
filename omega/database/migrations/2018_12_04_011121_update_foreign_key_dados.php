<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class UpdateForeignKeyDados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dados', function ($table) {
            $table->bigInteger('sensor_id')->unsigned()->change();
            $table->foreign('sensor_id')->references('id') -> on['sensores'] ->onDelete('cascade') ->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
