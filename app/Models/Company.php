<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['identifier_key', 'description', 'image_path', 'kind_company', 'brand_id', 'geographic_detail_id'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function geographicDetail()
    {
        return $this->belongsTo(GeographicDetail::class);
    }
}
