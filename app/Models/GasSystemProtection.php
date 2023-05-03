<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GasSystemProtection extends Model
{
    use HasFactory;
    protected $fillable = ['gas_plant_id', 'system_protection_id', 'quantity'];
    
    public function gasPlant()
    {
        return $this->belongsTo(GasPlant::class);
    }

    public function systemProtection()
    {
        return $this->belongsTo(SystemProtection::class);
    }
}
