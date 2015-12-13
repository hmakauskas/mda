<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FiscalDocument extends Model
{

	protected $fillable = ['fiscal_document_number','value','supplier_branch_id','currency_id','company_id','fiscal_document_status_id','filename'];
	
	/**
     * Get all of the costs for that fiscal document.
     */
    public function costs()
    {
        return $this->hasMany(Cost::class);
    } 

    /**
     * Get the Supplier Branch that owns the cost.
     */
    public function supplierBranches()
    {
        return $this->belongsTo(SupplierBranch::class);
    }  
}
