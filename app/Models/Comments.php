<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function sanpham() {
        return $this->belongsTo('App\Models\SanPham', 'sanpham_id', 'id');
    }
}
