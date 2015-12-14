<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['currency_code','currency_symbol','currency_name','country'];

    /**
     * Get all of the fiscal documents for that currency.
     */
    public function fiscalDocuments()
    {
        return $this->hasMany(FiscalDocument::class);
    }
}
