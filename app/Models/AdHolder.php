<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdHolder extends Model
{
    use HasFactory;

    public function jobs()
    {
        return $this->hasMany(AdHolderJob::class,'holder_id');
    }
}
