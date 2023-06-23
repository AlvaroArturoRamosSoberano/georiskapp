<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemProtection extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'type'];

    public function gasPlant()
    {
        return $this->hasMany(GasPlant::class);
    }
    public function regulatorySystemProtection()
    {
        return $this->hasMany(RegulatorySystemProtection::class);
    }
}
