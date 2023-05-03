<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GasKind extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function companie()
    {
        return $this->hasMany(Company::class);
    }
}
