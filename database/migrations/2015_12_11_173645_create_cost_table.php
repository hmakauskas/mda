<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costs', function(Blueprint $table)
        {
            $table->increments('id');
            $table->dateTime('date_mgr');
            $table->dateTime('date_acc');
            $table->string('short_description', 256);
            $table->text('desciption');
            $table->float('value');
            $table->timestamps();
            $table->bigInteger('fk_fiscal_document');
            $table->bigInteger('fk_supplier');
            $table->bigInteger('fk_currency');
            $table->bigInteger('fk_company');
            $table->bigInteger('fk_channel');
            $table->bigInteger('fk_category');
            $table->bigInteger('fk_cost_status');
            
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
