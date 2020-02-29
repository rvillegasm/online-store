<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Watch;

class Comment extends Model
{
    //attributes id, description, watch_id, created_at, updated_at
    protected $fillable = ['description', 'watch_id'];

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

    public function watch(){
        return $this->belongsTo(Watch::class);
    }
}

?>