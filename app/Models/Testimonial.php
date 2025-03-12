<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable=[
        'boarding_house_id',
        'photo',
        'name',
        'content',
        'rating'
       

    ];

    public function boardinghouse()
    {
        return $this->belongsTo(BoardingHouse::class);
    }

}


