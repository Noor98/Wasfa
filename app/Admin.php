<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "admin";
    
    
    public function links()
    {
        return $this->belongsToMany('App\Link','admin_link','admin_id','link_id');
    }
}
