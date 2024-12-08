<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'cpf', 'photo','address_id'];


    public function coordinate()
    {
        return $this->belongsTo(Coordinate::class)->with('address');
    }
}
