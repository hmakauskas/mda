<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierBranch extends Model
{
    protected $fillable = ['fiscal_id','country'];

    /**
     * Get the Company that owns the cost.
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Get all of the costs for that fiscal document.
     */
    public function fiscalDocuments()
    {
        return $this->hasMany(FiscalDocument::class);
    }
}
