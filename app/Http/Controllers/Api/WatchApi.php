<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Category;
use App\Watch;

class WatchApi extends Controller
{
    public function showSport()
    {
        $sportCategory = Category::where('name', 'Sports')->first();
        if (!$sportCategory) {
            return null;
        }
        $sportWatches = Watch::where('category_id', $sportCategory->getId())->get();
        foreach ($sportWatches as $watch) {
            $watch->setImage($watch->getImage());
        }

        return $sportWatches;
    }
}

?>