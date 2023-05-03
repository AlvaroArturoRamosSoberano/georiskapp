<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegulatoryAspect extends Model
{
    use HasFactory;
    protected $fillable = ['conservation_program','gas_production','explosiveness'];

    public function gasPlat()
    {
        return $this->hasMany(GasPlant::class);
    }
}
