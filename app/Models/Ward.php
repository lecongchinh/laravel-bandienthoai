<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'ward';
    public function villages() {
        return $this->hasMany('App\Models\Village', 'wardid', 'wardid');
    }
    public function district() {
        return $this->belongsTo('App\Models\District', 'districtid', 'wardid');
    }
}
