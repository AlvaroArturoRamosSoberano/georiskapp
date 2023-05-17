<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeographicDetail extends Model
{
    use HasFactory;
    protected $fillable = ['latitude', 'longitude', 'address', 'zip_code', 'colony_id', 'township_id', 'state_id'];

    public function company()
    {
        return $this->hasOne(Company::class);
    }
    public function colony()
    {
        return $this->belongsTo(Colony::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function township()
    {
        return $this->belongsTo(Township::class);
    }
}
