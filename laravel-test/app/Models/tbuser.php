<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class tbuser extends Model
{
    //
    protected $table = 'tbuser';

    protected $guarded = array('user_id','first_name');

    public $timestamps = true;

    public function getData()
    {
        $data = DB::table($this->table)->get()->first();

        return $data;
    }
}