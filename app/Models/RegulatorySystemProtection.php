<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegulatorySystemProtection extends Model
{
    use HasFactory;

    protected $fillable = ['regulatory_aspect_id', 'system_protection_id', 'quantity'];

    public function regulatoryAspect()
    {
        return $this->belongsTo(RegulatoryAspect::class);
    }
    public function systemProtection()
    {
        return $this->belongsTo(SystemProtection::class);
    }
}
