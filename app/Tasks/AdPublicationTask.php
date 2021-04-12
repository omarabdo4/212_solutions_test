<?php

namespace App\Tasks;

use App\Models\Ad;

class AdPublicationTask {

    public function __invoke()
    {
        Ad::where('published',1)
        ->whereRaw('NOW() >= date_to')
        ->update(['published' => 0]);

        Ad::where('published',0)
        ->whereRaw('NOW() BETWEEN date_from AND date_to')
        ->update(['published' => 1]);

    }
}