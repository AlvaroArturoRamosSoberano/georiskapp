<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class RegulatoryAspect extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['conservation_program', 'gas_production', 'explosiveness', 'emergency_plan', 'company_id'];

    public function gasPlant()
    {
        return $this->hasMany(GasPlant::class);
    }

    public function regulatoryLicenses()
    {
        return $this->hasMany(RegulatoryLicense::class);
    }

    public function regulatorySystemProtection()
    {
        return $this->hasMany(RegulatorySystemProtection::class);
    }
}
