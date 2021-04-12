<?php

namespace App\Tasks;

use App\Models\Ad;
use App\Models\AdHolderJob;
use Illuminate\Database\Eloquent\Builder;
use DateTime;

class AdDequeueDurationTask {
    
    public function __invoke()
    {
        $jobs = AdHolderJob::where('stage',1)->whereHas('ad',function (Builder $query)
        {
            $query->whereRaw('last_hold + INTERVAL duration MINUTE <= NOW()');
        })->get();

        foreach ($jobs as $job) {
            $job->stage = 2;
            $job->save();
            $ad = $job->ad;
            $ad->last_done = new DateTime();
            $ad->save();
        }

        // dd($ads_to_dequeue);

        $jobs = AdHolderJob::oldest()->where('stage',0)->get();

        foreach ($jobs->unique('holder_id') as $job) {
            $job->stage = 1;
            $job->save();
            $ad = $job->ad;
            $ad->last_hold = new DateTime();
            $ad->save();
        }
    }
}