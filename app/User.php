<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public static function IsExists($email,$id=NULL){
        if($id==NULL)
            return User::where("email",$email)->count()>0;
        else
            return User::whereRaw("id!=$id")->where("email",$email)->count()>0;
    }
    
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    public function generateToken()
    {
        $this->api_token = str_random(150);
        $this->save();

        return $this->api_token;
    }
}
