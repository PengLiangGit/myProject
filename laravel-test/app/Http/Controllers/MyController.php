<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\tbuserModel;
use App\Models\tbproductTable;
use Illuminate\Support\Facades\DB;

class MyController extends Controller
{
  public function model()
  {
    // Frameworksモデルのインスタンス化
    $md = new tbuserModel();
    // データ取得
    $data = $md->getData();

    echo $data->first_name;
    echo "this is test2";

    
    $productlist = DB::table('tbproduct')
        ->where('tbproduct.user_id','=', 5)
        ->get();

    $totalCash1 = 0;
    foreach ($productlist as $product):
      $totalCash1 = $totalCash1 + $product -> product_price;
    endforeach;

    // ビューを返す
    return view('users/list', 
    ['data' => $data, 
    'dataProduct' => $productlist,
    'totalCash' => $totalCash1]
    );
  }

  public function user_list()
  {

       // Frameworksモデルのインスタンス化
       $md = new tbuserModel();
       // データ取得
       $data = $md->getData();
   
       //echo $data->zip_code;
       //echo "this is test2";
       
       $productlist = DB::table('tbproduct')
       ->where('tbproduct.user_id','=', 5)
       ->get();

       $totalCash1 = 0;
       foreach ($productlist as $product):
         $totalCash1 = $totalCash1 + $product -> product_price;
       endforeach;
   
       // ビューを返す
       return view('users/list', 
       ['data' => $data, 
       'dataProduct' => $productlist,
       'totalCash' => $totalCash1]
       );
  }
  public function trade()
  {
    //$request=request();
    //print($request);
    //上記の$requestを利用して、データの取得できます

    //下記のやりかたでもできる
    $first_name=isset($_REQUEST['firstName'])? $_REQUEST['firstName'] : "";
    $last_name=isset($_REQUEST['lastName'])? $_REQUEST['lastName'] : "";
    $username=isset($_REQUEST['userName'])? $_REQUEST['userName'] : "";
    $email=isset($_REQUEST['email'])? $_REQUEST['email'] : "";
    $address=isset($_REQUEST['address'])? $_REQUEST['address'] : "";
    $address2=isset($_REQUEST['address2'])? $_REQUEST['address2'] : "";
    $country=isset($_REQUEST['country'])? $_REQUEST['country'] : "";
    $state=isset($_REQUEST['state'])? $_REQUEST['state'] : "";
    $zip_code=isset($_REQUEST['zip'])? $_REQUEST['zip'] : "";
  
  
    //登録処理
 
        $md = new tbuserModel();
        $md->insert([
          //'user_id'    => nextval('tbuser_id_seq'),
          'first_name' => $first_name,
          'last_name'  => $last_name,
          'username'   => $username,	
          'email'      => $email,	
          'address'    => $address,	
          'address2'   => $address2,	
          'country'    => $country,	
          'state'      => $state,
          'zip_code'   => $zip_code,
          'created_at' => now(),
          'updated_at' => now()
        ]);
  

      print('<br>追加後のデータを取得します。<br><br>');
  

      return redirect()->to('users/list'); 

  }
}
