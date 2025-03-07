<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    public $fillable=[
        'boarding_house_id',
        'photo',
        'name',
        'rating'
       

    ];

    public function boardinghouse()
    {
        return $this->belongsTo(BoardingHouse::class);
    }

}


