<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['store_name','billing_country','legal_entity_name','legal_entity_tax_register'];

    /**
     * Get all of the costs for that fiscal document.
     */
    public function costs()
    {
        return $this->hasMany(Cost::class);
    }   
}
