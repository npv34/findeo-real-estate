<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = [
        'title','status', 'price', 'type', 'price',
        'image', 'area','rooms', 'address','city',
        'state','zip_code','description','user_id'
    ];
}
