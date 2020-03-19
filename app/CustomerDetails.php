<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Order;

class CustomerDetails extends Model
{
    //attributes id, name, adress, phone_number, zip, created_at, updated_at
    protected $fillable = ['name', 'adress', 'phone_number', 'zip'];

    public static function validate(Request $request) {
        $request->validate([
            "name" => "required",
            "adress" => "required",
            "phone_number" => "required|numeric|gt:0",
            "zip" => "required|numeric|gt:0",
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
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getAdress()
    {
        return $this->attributes['adress'];
    }

    public function setAdress($adress)
    {
        $this->attributes['adress'] = $adress;
    }

    public function getPhoneNumber()
    {
        return $this->attributes['phone_number'];
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->attributes['phone_number'] = $phoneNumber;
    }
    public function getZip()
    {
        return $this->attributes['zip'];
    }

    public function setZip($zip)
    {
        $this->attributes['zip'] = $zip;
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

?>