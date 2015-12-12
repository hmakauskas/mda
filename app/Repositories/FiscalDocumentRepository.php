<?php

namespace App\Repositories;

use App\Cost;
use App\FiscalDocument;

class FiscalDocumentRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function allFiscalDocuments()
    {
        return FiscalDocument::orderBy('created_at', 'desc')
                    ->get();
    }

    public function getFiscalDocument($id)
    {
        return FiscalDocument::where('id', $id)
                    ->orderBy('created_at', 'desc')
                    ->get();
    }
}

?>