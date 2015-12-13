<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['supplier_name'];

    /**
     * Get all of the costs for that fiscal document.
     */
    public function costs()
    {
        return $this->hasMany(Cost::class);
    } 

    /**
     * Get all of the branches for that fiscal document.
     */
    public function supplierBranches()
    {
        return $this->hasMany(SupplierBranch::class);
    } 
}
