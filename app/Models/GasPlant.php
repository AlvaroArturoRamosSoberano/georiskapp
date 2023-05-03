<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GasPlant extends Model
{
    use HasFactory;
    protected $fillable = ['company_id', 'regulatory_aspect_id'];

    public function companie()
    {
        return $this->belongsTo(Company::class);
    }

    public function regulatoryAspect()
    {
        return $this->belongsTo(RegulatoryAspect::class);
    }
}
