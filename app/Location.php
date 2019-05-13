<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';
    protected $fillable = [
      'state','city','zip'
    ];
    public function faculties(){
        return $this->hasMany('App\Faculty');
    }
}
