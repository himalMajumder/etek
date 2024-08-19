<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function upazila()
    {
        return $this->hasMany(Upazila::class,  'district_id', 'id');
    }
}
