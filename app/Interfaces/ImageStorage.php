<?php 

namespace App\Interfaces;

interface ImageStorage {
    public function store($file, $destinationPath);
    public function get($destinationPath);
}
