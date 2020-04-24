<?php 

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;

class ImageS3Storage implements ImageStorage {

    public function store($file, $destinationPath) {
        Storage::disk('s3')->put($destinationPath, file_get_contents($file));
    }

    public function get($destinationPath) {
        return Storage::disk('s3')->url($destinationPath);
    }
}
