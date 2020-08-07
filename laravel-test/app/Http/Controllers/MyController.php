<?php

namespace App\Http\Controllers;

use App\Models\tbuser;

class MyController extends Controller
{
  public function model()
  {
    // Frameworksモデルのインスタンス化
    $md = new tbuser();
    // データ取得
    $data = $md->getData();

    echo $data->first_name;
    echo "this is test2";

    // ビューを返す
    return view('users/list', ['data' => $data]);
  }

  public function user_list(){

       // Frameworksモデルのインスタンス化
       $md = new tbuser();
       // データ取得
       $data = $md->getData();
   
       //echo $data->zip_code;
       //echo "this is test2";
   
       // ビューを返す
       return view('users/list', ['data' => $data]);
        //return view('users.list');
    }
}
