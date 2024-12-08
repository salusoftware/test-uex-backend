<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinate extends Model
{
    use HasFactory;
    protected $fillable = ['lat', 'lng', 'address_id'];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}