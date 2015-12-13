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
            $table->text('description')->nullable();
            $table->float('value');
            $table->timestamps();
            $table->bigInteger('fiscal_document_id')->nullable();;
            $table->bigInteger('supplier_id');
            $table->bigInteger('currency_id');
            $table->bigInteger('company_id');
            $table->bigInteger('marketing_channel_id');
            $table->bigInteger('category_id');
            $table->bigInteger('cost_status_id');
            
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
