@extends('layouts.layout')
@section('title', 'bootstrap 導入')
@section('content')

<div class="container">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h2>商品購入手続き</h2>
    <p class="lead">この度、弊社製品のご購入ありがとうございます。<br>お手数ですが、下記のご購入手続きをお願いいたします。</p>
  </div>

<!-- cart info display earea-->
  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill">3</span>
      </h4>

      <ul class="list-group mb-3">

      <?php foreach ($dataProduct as $product): ?>
        <tr>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><?= $product->product_name ?></h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$<?= $product->product_price ?></span>
            </li>
        </tr>
        <?php endforeach; ?>
        
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <strong>${{$totalCash}}</strong>
        </li>
      </ul>

      <form class="card p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Promo code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </div>
      </form>
    </div>
<?php

    $country_ary = array(
        "japan" => array("東京", "大阪", "北海道", "沖縄"),
        "usa" => array("ワシントン", "ニューヨーク", "ロサンゼルス")
    );
    
    // 選択リストの値を取得
    $country_name = "country";
    $selected_country_value = $data->country;

    $state_name = "state";
    $selected_state_value = $data->country;

    // 配列から選択リストを作成する関数
    // パラメータ：配列／選択リスト名／選択値
    function disp_country($array, $country_name, $selected_country_value = "") {
        echo "<select class=\"custom-select d-block w-100\" id=\"country\" required>";
        foreach ($array as $key => $val) {
            echo "<option ";
            if ($selected_country_value == $key) {
                echo " selected ";
            }
            echo ' value="'.$key.'">' . $key . "</option>";
        }
        echo "</select>";
    }

    function disp_State($array, $state_name, $selected_country_value = "",$selected_state_value = "") {
        echo "<select class=\"custom-select d-block w-100\" id=\"state\"  disabled=\"disabled\" required>";
        foreach ($array as $key => $val) {
            //if ($selected_country_value == $key) {
                if (is_array($val)) {
                    //echo "<select class=\"custom-select d-block w-100\" id=\"state\"  required>";
                    foreach ($val as $val2) {
                        echo "<option class=\"p".$key."\"";
                        if ($selected_state_value == $val2) {
                            echo " selected ";
                        }
                        echo ' value="'.$val2.'">' . $val2 . "</option>";
                    }
                }
            //}
        }
        echo "</select>";
    }
?>
<?php //phpinfo(); ?>
    <!-- User info input earea-->
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <form class="needs-validation" novalidate  action="{{ url('/users/trade')}}" method="POST" id="trade_form">
      {{ csrf_field() }}
 <!-- 1 Row-->
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="{{$data->first_name}}" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="{{$data->last_name}}" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="username">Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control" name="userName" id="userName" value="{{$data->username}}" placeholder="Username" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email <span class="text-muted">(Optional)</span></label>
          <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" value="{{$data->email}}">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required value="{{$data->address}}">
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="mb-3">
          <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" name="address2" id="address2" placeholder="Apartment or suite" value="{{$data->address2}}">
        </div>
<!-- 2 Row   国、県-->
        <div class="row">
          <div class="col-md-4 mb-3">
            <label for="country">Country</label><br>
            <?php echo disp_country($country_ary, $country_name, $selected_country_value); ?>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">State</label><br>
            <?php echo disp_State($country_ary, $state_name, $selected_country_value,$selected_state_value); ?>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" name="zip" id="zip" placeholder="" required value="{{$data->zip_code}}">
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="same-address">
          <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="save-info">
          <label class="custom-control-label" for="save-info">Save this information for next time</label>
        </div>
        <hr class="mb-4">

        <h4 class="mb-3">Payment</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="credit">Credit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="debit">Debit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="paypal">PayPal</label>
          </div>
        </div>

        <!-- 3 Row-->
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cc-name">Name on card</label>
            <input type="text" class="form-control" id="cc-name" placeholder="" required>
            <small class="text-muted">Full name as displayed on card</small>
            <div class="invalid-feedback">
              Name on card is required
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="cc-number">Credit card number</label>
            <input type="text" class="form-control" id="cc-number" placeholder="" required>
            <div class="invalid-feedback">
              Credit card number is required
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="cc-expiration">Expiration</label>
            <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
            <div class="invalid-feedback">
              Expiration date required
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="cc-cvv">CVV</label>
            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
            <div class="invalid-feedback">
              Security code required
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit" id=”button_trade” value=”test”>Continue to checkout</button>
      </form>
    </div>
  </div>
XXXXXXX
@endsection