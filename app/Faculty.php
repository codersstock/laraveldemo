<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = [
'name','email','phone','address','emailsecondary','fax','location_id'
    ];


    public function location(){
        return $this->hasOne('App\Location','location_id');
    }

    public function tags(){
        return $this->belongsToMany('App\Tags');
    }


}



