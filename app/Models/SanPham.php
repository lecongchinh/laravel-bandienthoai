<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{

    protected $table = "sanpham";

    public function comments() {
        return $this->hasMany('App\Models\Comments', 'sanpham_id', 'id');
    }

    public function hang_sx() {
        return $this->belongsTo('App\Models\Hang_sx', 'hang_sx_id', 'id');
    }
}
