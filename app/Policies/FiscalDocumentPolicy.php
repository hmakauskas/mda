<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class FiscalDocumentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /*public function destroy(User $user, FiscalDocument $fiscalDocument)
    {
        return $user->id === $task->user_id;
    }*/
}
