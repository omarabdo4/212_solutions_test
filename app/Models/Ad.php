<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
        'date_from',
        'date_to',
        'duration',
        'frequency',
        'holder_id',
        'published',
    ];

    public function image()
    {
        return $this->hasOne(AdImage::class);
    }

    public function set_image($file)
    {
        if($this->image){
            // delete the current
            $this->image->delete_actual_file();
            $this->image->delete();
        }
        return AdImage::storeFile($file,$this->id);
    }

    public function jobs()
    {
        return $this->hasMany(AdHolderJob::class);
    }

}
