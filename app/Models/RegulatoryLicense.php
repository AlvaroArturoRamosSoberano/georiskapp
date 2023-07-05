<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegulatoryLicense extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['license_id', 'regulatory_aspect_id'];

    public function regulatoryAspect()
    {
        return $this->belongsTo(RegulatoryAspect::class);
    }

    public function license()
    {
        return $this->belongsTo(License::class);
    }
}
