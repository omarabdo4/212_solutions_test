<?php

namespace App\Tasks;

use App\Models\Ad;
use Illuminate\Database\Eloquent\Builder;
use DateTime;

class AdDequeueDurationTask {
    
    public function __invoke()
    {
        $ads_to_dequeue = Ad::where('published',1)
        ->whereHas('jobs',function (Builder $query)
        {
            $query->where('stage',1);
        })
        ->whereRaw('last_hold + INTERVAL duration MINUTE <= NOW()')
        ->get();

        // dd($ads_to_dequeue);

        foreach ($ads_to_dequeue as $ad) {
            $job = $ad->jobs()->where('ad_holder_jobs.stage',1)->first();
            $job->stage = 2;
            $job->save();
            $ad->last_done = new DateTime();
            $ad->save();
        }

        $ads_to_enqueue = Ad::where('published',1)
        ->whereHas('jobs',function (Builder $query)
        {
            $query->where('stage',0);
        })
        ->get();

        foreach ($ads_to_enqueue as $ad) {
            $job = $ad->jobs()->where('ad_holder_jobs.stage',0)->oldest()->first();
            $job->stage = 1;
            $job->save();
            $ad->last_hold = new DateTime();
            $ad->save();
        }
    }
}