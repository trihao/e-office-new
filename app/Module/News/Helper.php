<?php

namespace App\Module\News;

class Helper extends \Illuminate\Database\Eloquent\Model
{
    public function uploadFile($file)
    {
        /**
         * Upload user image and get the path then save it into database
         */
        $userId = session("current_user");
        $timestamp = time();
        $fileExtension = \File::extension($file->getClientOriginalName());
        $fileName = "user_$userId" . "_" . "$timestamp" . "." .$fileExtension;
        $filePath = 'public/users-upload/news/';
        $file->storeAs($filePath, $fileName);
        return $fileName;
    }

    public function getNewsImagePath($fileName,$userID)
    {
        /** Different path due to symbolic link */
        return "storage/users-uploads/".$fileName;
    }

}