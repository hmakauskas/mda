<?php

namespace App\Repositories;

use App\FiscalDocumentStatus;

class FiscalDocumentStatusRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    
    public function getFiscalDocumentStatus($id)
    {
        return FiscalDocumentStatus::where('id', $id)
                    ->orderBy('id', 'asc')
                    ->get();
    }
    
}

?>