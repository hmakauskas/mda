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
            $table->string('filename')->nullable();
            $table->string('fiscal_document_number');
            $table->float('value');
            $table->timestamps();
            $table->bigInteger('supplier_branch_id');
            $table->bigInteger('currency_id');
            $table->bigInteger('company_id');
            $table->bigInteger('fiscal_document_status_id');
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
