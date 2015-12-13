<?php

namespace App\Repositories;

use App\MarketingChannel;

class MarketingChannelRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function allMarketingChannels()
    {
        return MarketingChannel::orderBy('id', 'asc')
                    ->get();
    }

    public function getMarketingChannel($id)
    {
        return MarketingChannel::where('id', $id)
                    ->orderBy('id', 'asc')
                    ->get();
    }
    
}

?>