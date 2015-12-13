<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{

	protected $fillable = ['date_mgr','date_acc','short_description','desciption','value','fk_fiscal_document','fk_supplier','fk_currency','fk_company','fk_marketing_channel','fk_category','fk_cost_status'];
	
	/**
     * Get the Fiscal Document that owns the cost.
     */
    public function fiscalDocument()
    {
        return $this->belongsTo(FiscalDocument::class);
    }
}


