<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeographicDetail extends Model
{
    use HasFactory;
    protected $fillable = ['latitude', 'longitude', 'address', 'zip_code', 'township', 'state'];

    public function company()
    {
        return $this->hasMany(Company::class);
    }
}
