<?php 

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage {
    public function store($file, $destinationPath){
            Storage::disk('public')->put($destinationPath, file_get_contents($file));
    }
}
