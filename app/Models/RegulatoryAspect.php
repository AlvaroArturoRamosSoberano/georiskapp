<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegulatoryAspect extends Model
{
    use HasFactory;
    protected $fillable = ['conservation_program', 'gas_production', 'explosiveness', 'license_id', 'emergency_plan', 'company_id'];

    public function gasPlant()
    {
        return $this->hasMany(GasPlant::class);
    }

    public function license()
    {
        return $this->belongsTo(License::class);
    }

    public function regulatorySystemProtection()
    {
        return $this->hasMany(RegulatorySystemProtection::class);
    }
}
