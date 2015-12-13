<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{

	protected $fillable = ['date_mgr','date_acc','short_description','desciption','value','fiscal_document_id','supplier_id','currency_id','company_id','marketing_channel_id','category_id','cost_status_id'];
	
	/**
     * Get the Fiscal Document that owns the cost.
     */
    public function fiscalDocument()
    {
        return $this->belongsTo(FiscalDocument::class);
    }

    /**
     * Get the Company that owns the cost.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the Supplier that owns the cost.
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}


