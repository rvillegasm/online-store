<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;
use App\User;

class Order extends Model 
{
    private const DATE_SHIPPED = 'dateShipped';
    private const STATUS = 'status';
    private const USER_ID = 'user_id';

    //attributes id, dateShipped, status, created_at, updated_at
    protected $fillable = [Order::DATE_SHIPPED, Order::STATUS, Order::USER_ID];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getDateShipped()
    {
        return $this->attributes[Order::DATE_SHIPPED];
    }

    public function setDateShipped($date)
    {
        $this->attributes[Order::DATE_SHIPPED] = $date;
    }

    public function getStatus()
    {
        return $this->attributes[Order::STATUS];
    }

    public function setStatus($status)
    {
        $this->attributes[Order::STATUS] = $status;
    }

    public function getItemId()
    {
        return $this->attributes[Order::ITEM_ID];
    }

    public function setItemId($iId)
    {
        $this->attributes[Order::ITEM_ID] = $iId;
    }

    public function getUserId()
    {
        return $this->attributes[Order::USER_ID];
    }

    public function setUserId($uId)
    {
        $this->attributes[Order::USER_ID] = $uId;
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

?>