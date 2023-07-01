<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegulatorySystemProtection extends Model
{
    use HasFactory;
    use SoftDeletes;
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
