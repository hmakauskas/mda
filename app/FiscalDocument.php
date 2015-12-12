<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FiscalDocument extends Model
{

	protected $fillable = ['file_attached','fiscal_document_number','value','fk_supplier_branch','fk_currency','fk_company','fk_fiscal_document_status'];
	
    public function costs()
    {
        return $this->hasMany(Cost::class);
    }
}
