<?php

namespace App\Tasks;

use App\Models\Ad;
use App\Models\AdHolderJob;
use DateTime;

class AdEnqueueFrequencyTask {
    
    public function __invoke()
    {
     
        $fresh_ads = Ad::where('published',1)
        ->whereNull('last_processed')
        ->get();
        $old_ads = Ad::where('published',1)
        ->whereRaw('last_processed < last_done AND last_done + INTERVAL frequency MINUTE <= NOW()')
        ->get();

        foreach ($fresh_ads->concat($old_ads) as $ad) {
            $job = new AdHolderJob();
            $job->stage = 0;
            $job->holder_id = $ad->holder_id;
            $job->ad_id = $ad->id;
            $job->save();
            $ad->last_processed = new DateTime();
            $ad->save();              
        }

    }
}