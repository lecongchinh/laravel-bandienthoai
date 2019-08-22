<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hang_sx extends Model
{

    protected $table = "hang_sx";

    public function sanphams() {
        return $this->hasMany('App\Models\SanPham');
    }
}
