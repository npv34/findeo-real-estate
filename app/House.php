<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class House extends Model
{
    protected $fillable = [
        'title','status', 'price', 'type', 'price',
        'image', 'area','rooms', 'address','city',
        'state','zip_code','description','user_id'
    ];

    public function getAddress()
    {
        return Str::limit("$this->state, $this->address, $this->city", 30);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function diffForHumans()
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatus()
    {
        return ($this->status == "1") ? 'For Sale' : 'For Rent';
    }
}
