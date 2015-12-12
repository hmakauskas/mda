<?php

namespace App\Repositories;

use App\CostStatus;

class CostStatusRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function allCostStatuses()
    {
        return Cost::orderBy('id', 'asc')
                    ->get();
    }

    public function getCostStatus($id)
    {
        return CostStatus::where('id', $id)
                    ->orderBy('id', 'asc')
                    ->get();
    }
    
}

?>