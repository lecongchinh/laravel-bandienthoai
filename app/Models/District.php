<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'district';
    public function wards() {
        return $this->hasMany('App\Models\Ward', 'districtid', 'districtid');
    }
    public function province() {
        return $this->belongsTo('App\Models\Province', 'provinceid', 'districtid');
    }
}
