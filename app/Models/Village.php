<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $table = 'village';
    public function ward() {
        return $this->belongsTo('App\Models\Ward', 'wardid', 'villageid');
    }
}
