<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tbuserModel;
use App\Models\tbproductTable;

class MyOrderController extends Controller
{
  public function orderConfirm()
  {
    //Model を利用しない場合
    //$data[shares] = DB::table('tbuser')
    $dataUser = DB::table('tbuser')
        ->leftjoin('tbproduct', 'tbuser.user_id', '=', 'tbproduct.user_id')
        ->where('tbuser.user_id','=', 5)
        ->get()->first();

        // echo $dataUser->first_name;
        // echo '<br>';
        // echo $dataUser->product_count;

    //成功しました

    $productlist = DB::table('tbproduct')
        ->where('tbproduct.user_id','=', $dataUser->user_id)
        ->get();

    $totalCash1 = 0;
    foreach ($productlist as $product):
      $totalCash1 = $totalCash1 + $product -> product_price;
    endforeach;


    // ビューを返す
    return view('users/list', 
    ['data' => $dataUser, 
    'dataProduct' => $productlist,
    'totalCash' => $totalCash1]
    );
  }

}
