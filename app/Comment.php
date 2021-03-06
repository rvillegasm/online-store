<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Watch;
use App\User;

class Comment extends Model
{
    //attributes id, description, watch_id, user_id, created_at, updated_at
    protected $fillable = ['description', 'watch_id', 'user_id'];

    public static function validate(Request $request) {
        $request->validate([
            "description" => "required",
            "watch_id" => "required|numeric|gt:0",
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

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($desc)
    {
        $this->attributes['description'] = $desc;
    }

    public function getWatchId()
    {
        return $this->attributes['watch_id'];
    }

    public function setWatchId($pId)
    {
        $this->attributes['watch_id'] = $pId;
    }

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($pId)
    {
        $this->attributes['user_id'] = $pId;
    }

    public function getDate()
    {
        return $this->attributes['created_at'];
    }

    public function watch(){
        return $this->belongsTo(Watch::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

?>