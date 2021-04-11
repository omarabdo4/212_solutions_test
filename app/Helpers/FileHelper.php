<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

Class FileHelper
{
    public static function storeFile($uploadedFile,$fileModel,$related_model_id_name,$related_model_id)
    {
        $fileModel->original_filename = $uploadedFile->getClientOriginalName();
        $fileModel->extension = $uploadedFile->extension();
        $fileModel->type = mime_content_type($uploadedFile->path());
        $fileModel->path = $uploadedFile->store('files');
        $fileModel[$related_model_id_name] = $related_model_id;
        $fileModel->save();
        return $fileModel;
    }
    public static function getUrl($fileModel)
    {
        return Storage::url($fileModel->path);
    }
}