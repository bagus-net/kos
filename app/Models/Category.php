<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

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
