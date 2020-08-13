<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class tbuserOrder extends Model
{

    public function initialize(array $config)
    {
        $this->belongsTo('tbuser'); // 追加
        $this->belongsTo('tbproduct');
    }

}