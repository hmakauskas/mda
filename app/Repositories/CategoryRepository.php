<?php

namespace App\Repositories;

use App\Category;

class CategoryRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */

    public function getCategory($id)
    {
        return Category::where('id', $id)
                    ->orderBy('id', 'asc')
                    ->get();
    }
    
}

?>