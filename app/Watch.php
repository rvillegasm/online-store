<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Category;
use App\Item;
use App\Comment;

/*
    Watch Model Class
    Attributes : id, name, quantity, color, brand, reference, gender, price, image, description, id_category
*/

class Watch extends Model
{
    private const NAME = 'name';
    private const QUANTITY = 'quantity';
    private const COLOR = 'color';
    private const BRAND = 'brand';
    private const REFERENCE = 'reference';
    private const PRICE = 'price';
    private const IMAGE = 'image';
    private const GENDER = 'gender';
    private const DESCRIPTION = 'description';
    private const CATEGORY = 'category_id';


    protected $fillable = [
        Watch::NAME,Watch::QUANTITY,Watch::COLOR,Watch::BRAND,Watch::REFERENCE,Watch::PRICE,Watch::IMAGE,Watch::GENDER,Watch::DESCRIPTION,Watch::CATEGORY
    ];

    public static function validate(Request $request) {
        $request->validate([
            "name" => "required",
            "brand" => "required",
            "reference" => "required",
            "color" => "required",
            "price" => "required|numeric|gt:0",
            "quantity" => "required|numeric|gt:0",
            "gender" => "required",
            "description" => "required",
            "category_id" => "required",
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
        return $this->attributes[Watch::NAME];
    }

    public function setName($name)
    {
        $this->attributes[Watch::NAME] = $name;
    }

    public function getQuantity()
    {
        return $this->attributes[Watch::QUANTITY];
    }

    public function setQuantity($quantity)
    {
        $this->attributes[Watch::QUANTITY] = $quantity;
    }


    public function getColor()
    {
        return $this->attributes[Watch::COLOR];
    }

    public function setColor($color)
    {
        $this->attributes[Watch::COLOR] = $color;
    }

    public function getBrand()
    {
        return $this->attributes[Watch::BRAND];
    }

    public function setBrand($brand)
    {
        $this->attributes[Watch::BRAND] = $brand;
    }

    public function getReference()
    {
        return $this->attributes[Watch::REFERENCE];
    }

    public function setReference($reference)
    {
        $this->attributes[Watch::REFERENCE] = $reference;
    }

    public function getPrice()
    {
        return $this->attributes[Watch::PRICE];
    }

    public function setPrice($price)
    {
        $this->attributes[Watch::PRICE] = $price;
    }

    public function getImage()
    {
        return $this->attributes[Watch::IMAGE];
    }

    public function setImage($image)
    {
        $this->attributes[Watch::IMAGE] = $image;
    }

    public function getGender()
    {
        return $this->attributes[Watch::GENDER];
    }

    public function setGender($gender)
    {
        $this->attributes[Watch::GENDER] = $gender;
    }

    public function getDescription()
    {
        return $this->attributes[Watch::DESCRIPTION];
    }

    public function setDescription($description)
    {
        $this->attributes[Watch::DESCRIPTION] = $description;
    }

    public function getCategory()
    {
        return $this->attributes[Watch::CATEGORY];
    }

    public function setCategory($category)
    {
        $this->attributes[Watch::CATEGORY] = $category;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

?>