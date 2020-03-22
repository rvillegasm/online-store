<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Watch;
use App\Oder;

class Item extends Model 
{
    private const PRODUCT_QUANTITY = 'product_quantity';
    private const SUB_TOTAL = 'sub_total';
    private const WATCH_ID = 'watch_id';
    private const ORDER_ID = 'order_id';

    //attributes id, productQuantity, subTotal, watch_id, order_id, created_at, updated_at
    protected $fillable = [Item::PRODUCT_QUANTITY, Item::SUB_TOTAL, Item::WATCH_ID, Item::ORDER_ID];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getProductQuantity() 
    {
        return $this->attributes[Item::PRODUCT_QUANTITY];
    }

    public function setProductQuantity($quantity)
    {
        $this->attributes[Item::PRODUCT_QUANTITY] = $quantity;
    }

    public function getSubTotal()
    {
        return $this->attributes[Item::SUB_TOTAL];
    }

    public function setSubTotal($subTotal)
    {
        $this->attributes[Item::SUB_TOTAL] = $subTotal;
    }

    public function getWatchId()
    {
        return $this->attributes[Item::WATCH_ID];
    }

    public function setWatchId($wId)
    {
        $this->attributes[Item::WATCH_ID] = $wId;
    }

    public function getOrderId()
    {
        return $this->attributes[Item::ORDER_ID];
    }

    public function setOrderId($oId)
    {
        $this->attributes[Item::ORDER_ID] = $oId;
    }

    public function watch()
    {
        return $this->belongsTo(Watch::class);
    }

    public function order()
    {
        return $this->belongsTo(Oder::class);
    }
}

?>