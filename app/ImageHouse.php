<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageHouse extends Model
{
    protected $table = 'image_house';
    protected $fillable = ['url', 'house_id'];

    public function house()
    {
        return $this->belongsTo(House::class);
    }
}
