<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $fillable = [
        'title'
    ];

    protected $table = 'tags';

    public function faculties(){
        return $this->belongsToMany('App\Faculty');
    }


}
