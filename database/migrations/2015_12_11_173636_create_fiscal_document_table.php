<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiscalDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiscal_documents', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('file_attached');
            $table->string('fiscal_document_number');
            $table->float('value');
            $table->timestamps();
            $table->bigInteger('fk_supplier_branch');
            $table->bigInteger('fk_currency');
            $table->bigInteger('fk_company');
            $table->bigInteger('fk_fiscal_document_status');
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
