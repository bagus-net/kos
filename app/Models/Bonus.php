<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bonus extends Model
{
    use HasFactory,SoftDeletes;

    public $fillable=[
        'boarding_house_id',
        'image',
        'name',
        'description'
       

    ];

    public function boardinghouse()
    {
        return $this->belongsTo(BoardingHouse::class);
    }

    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }
}
