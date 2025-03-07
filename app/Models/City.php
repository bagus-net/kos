<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public $fillable=[
        'image',
        'name',
        'slug'
    ];

    public function boardinghouses()
    {
        return $this->hasMany(BoardingHouse::class);
    }
}
