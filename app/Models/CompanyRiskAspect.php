<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CompanyRiskAspect extends Model
{
    use HasFactory;
    use SoftDeletes;
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
