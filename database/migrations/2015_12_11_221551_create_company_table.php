<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('store_name', 256);
            $table->string('billing_country', 256);
            $table->string('legal_entity_name', 256);
            $table->string('legal_entity_tax_register', 256);
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
        //
    }
}
