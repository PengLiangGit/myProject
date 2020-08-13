<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class tbuserModel extends Model
{
    //
    protected $table = 'tbuser';

    protected $guarded = array('user_id','first_name');

    public $timestamps = true;

    public function getData()
    {
        $data = DB::table($this->table)->orderBy('user_id', 'DESC')->get()->first();
            //$data = DB::table($this->table).where("user_id","=","2")->get()->first();
            //::orderBy('id', 'DESC')->get();

            //SQL 書き方まとめ
            //特定のカラム「name」に文字列「hoge」が入っているレコードを抽出する
            // $res = $this->Sample->find('all', array(
            //     'conditions' => array('Sample.name' => 'hoge'),
            // ));

            //条件でIN句を使う
            // $res = $this->Sample->find('all', array(
            //     'conditions' => array('Sample.color' => array('blue', 'yellow', 'red')),
            // ));

            //LIKE句などでワールドカード「%」を使い、文末に「tmp」のあるレコードを抽出する場合
            // $res = $this->Sample->find('all', array(
            //     'conditions' => array('Sample.name LIKE' => '%tmp'),
            // ));

            //条件でBETWEEN句を使う
            // $res = $this->Sample->find('all', array(
            // 	'conditions' => array('Sample.price BETWEEN ? AND ?' => array(1000, 2000)),
            // ));


            //
            // FROM users
            //     WHERE (
            //         pref = '東京都'
            // 	OR pref = '神奈川県'
            //     )
            //     AND WHERE age >= 20
            // SELECT * 
            // ⇒g
            //  DB::table('users')
            //     ->where(function($query)
            //     {
            //         $query->where('pref', '=', '東京都')
            //               ->orWhere('pref', '=', '神奈川県');
            //     })
            //     ->where('age', '>=', 20)
            //     ->get();

        return $data;
    }
}