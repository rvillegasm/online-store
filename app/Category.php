<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Watch;

/*
    Category Model Class
    Attributes : id, name, image, description
*/

class Category extends Model
{
    private const NAME = 'name';
    private const IMAGE = 'image';
    private const DESCRIPTION = 'description';
    
    protected $fillable = [Category::NAME,Category::IMAGE,Category::DESCRIPTION];

    public static function validate(Request $request) {
        $request->validate([
            "name" => "required",
            "image" => "required",
            "description" => "required",
        ]);
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName()
    {
        return $this->attributes[Category::NAME];
    }

    public function setName($name)
    {
        $this->attributes[Category::NAME] = $name;
    }

    public function getImage()
    {
        return $this->attributes[Category::IMAGE];
    }

    public function setImage($image)
    {
        $this->attributes[Category::IMAGE] = $image;
    }

    public function getDescription()
    {
        return $this->attributes[Category::DESCRIPTION];
    }

    public function setDescription($description)
    {
        $this->attributes[Category::DESCRIPTION] = $description;
    }

    public function watches()
    {
        return $this->hasMany(Watch::class);
    }
}