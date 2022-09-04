<?php

namespace App\Helpers;

use App\Models\Association;
use App\Models\File;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class UploadHelper
{
    /**
     * Upload file to storage system
     *
     * @param [type] $file
     * @param Association $association
     * @return string (image path in storage system)
     */
    public static function uploadImage($file, Association $association)
    {
        if(in_array($file->extension(), ['jpg', 'jpeg', 'png', 'svg'])) {
            $path = 'images/' . $association->slug . '/' . uniqid() . '.' . $file->extension();
            try {
                Storage::disk('local')->put($path, $file);
                $uploaded_file = File::create([
                    'path' => 'storage/' . $path,
                    'type' => 'image',
                ]);
            } catch (Exception $e) {
                return;
            }
            return $uploaded_file->id;
        }
    }

    /**
     * Upload video to storage system
     *
     * @param [type] $file
     * @param Association $association
     * @return string (video path in storage system)
     */
    public static function uploadVideo($file, Association $association)
    {
        if(in_array($file->extension(), ['mp4', 'mov'])) {
            $path = 'videos/' . $association->slug . '/' . Carbon::now()->timestamp . '.' . $file->extension();
            try {
                Storage::disk('local')->put($path, $file);
                $uploaded_file = File::create([
                    'path' => 'storage/' . $path,
                    'type' => 'video',
                ]);
            } catch (Exception $e) {
                return;
            }
            return $uploaded_file->id;
        }
    }
}
