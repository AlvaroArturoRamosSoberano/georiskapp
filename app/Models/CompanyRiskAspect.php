<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyRiskAspect extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'risk_aspect_id'];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function riskAspect()
    {
        return $this->belongsTo(RiskAspect::class);
    }
}
