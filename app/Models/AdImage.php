<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\FileHelper;

class AdImage extends Model
{
    use HasFactory;

    public function getUrl()
    {
        return FileHelper::getUrl($this);
    }
    public static function storeFile($uploadedFile,$related_id)
    {
        $model_id_column = 'ad_id';


        return FileHelper::storeFile($uploadedFile,(new self),$model_id_column,$related_id);
    }

}
