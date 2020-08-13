<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>取引確認</title> 
</head> 
<body> 
<div>this is test of insert</div>
<?php


  echo "登録処理".$_SERVER["REQUEST_METHOD"];
  $first_name=isset($_GET['firstName'])? $_GET['firstName'] : "";
  echo "first_name get:".$first_name;

  $first_name=isset($_POST['firstName'])? $_POST['firstName'] : "";
  echo "first_name podt:".$first_name;

  $first_name=isset($_REQUEST['firstName'])? $_REQUEST['firstName'] : "";
  echo "first_name REQUEST:".$first_name;
  echo "first_name REQUEST:".($request->firstName);

  $last_name=isset($_REQUEST['lastName'])? $_REQUEST['lastName'] : "";
  $username=isset($_REQUEST['userName'])? $_REQUEST['userName'] : "";
  $email=isset($_REQUEST['email'])? $_REQUEST['email'] : "";
  $address=isset($_REQUEST['address'])? $_REQUEST['address'] : "";
  $address2=isset($_REQUEST['address2'])? $_REQUEST['address2'] : "";
  $country=isset($_REQUEST['country'])? $_REQUEST['country'] : "";
  $state=isset($_REQUEST['state'])? $_REQUEST['state'] : "";
  $zip_code=isset($_REQUEST['zip'])? $_REQUEST['zip'] : "";

  echo "first_name".$first_name;

  //登録処理
?>
</body>
</html>