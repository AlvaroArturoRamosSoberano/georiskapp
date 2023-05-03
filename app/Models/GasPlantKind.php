<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GasPlantKind extends Model
{
    use HasFactory;
    protected $fillable = ['gas_plant_id', 'gas_kind_id'];

    public function gasPlant()
    {
        return $this->belongsTo(GasPlant::class);
    }

    public function gasKind()
    {
        return $this->belongsTo(GasKind::class);
    }
}
