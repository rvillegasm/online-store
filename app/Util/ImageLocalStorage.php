<?php 

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class ImageLocalStorage implements ImageStorage {

    public function store($file, $destinationPath) {
            Storage::disk('public')->put($destinationPath, file_get_contents($file));
    }

    public function get($destinationPath) {
        return URL::to('/')."/storage/".$destinationPath;
    }
}
