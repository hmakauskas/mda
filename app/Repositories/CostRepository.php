<?php

namespace App\Repositories;

use App\Cost;
use App\FiscalDocument;

class CostRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function allCosts()
    {
        return Cost::orderBy('created_at', 'desc')
                    ->get();
    }

    
    
}

?>