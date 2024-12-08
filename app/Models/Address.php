<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = ['street', 'uf', 'city', 'cep', 'neighborhood'];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function coordinates()
    {
        return $this->hasMany(Coordinate::class);
    }

}
