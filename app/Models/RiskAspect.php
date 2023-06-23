<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiskAspect extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type'];
    public function companyRiskAspect()
    {
        return $this->hasMany(CompanyRiskAspect::class);
    }
}
