<?php

namespace App\Helpers;

Class BannerHolders {

    public static function holders_array()
    {        
        // used in seeding and validation
        return [
            [
                'id' => 1,
                'title'=> 'top banner'
            ],
            [
                'id' => 2,
                'title'=> 'side banner'
            ]
        ];
    }

    public static function holders_collection(){
        return collect(self::holders_array());
    }

    public static function holders_ids(){
        return self::holders_collection()->pluck('id');
    }

}