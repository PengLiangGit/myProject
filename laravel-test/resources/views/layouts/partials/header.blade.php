<!-- header & grobal navi -->
<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


<script type="text/javascript">
$(document).ready(function(){
 
  //alert("Step1");

    // プルダウンのoption内容をコピー
    var pd2 = $("#state option").clone();
 
    // 1→2連動
    $("#country").change(function () {
        // lv1のvalue取得
        var lv1Val = $("#country").val();
        //alert(lv1Val);

        // lv2Pulldownのdisabled解除
        $("#state").removeAttr("disabled");
 
        // 一旦、lv2Pulldownのoptionを削除
        $("#state option").remove();
 
        // (コピーしていた)元のlv2Pulldownを表示
        $(pd2).appendTo("#state");
 
        // 選択値以外のクラスのoptionを削除
        $("#state option[class != p"+lv1Val+"]").remove();
 
        // 「▼選択」optionを先頭に表示
        $("#state").prepend('<option value="0" selected="selected">▼選択</option>');
     });
 
});

<script type="text/javascript">
    $('#”button_trade”').on('click', function(){
        $(this).attr('disabled', 'disabled');
        alert("submit");
        $('#trade_form').submit();
    });
</script>

</script>    
<nav class="navbar navbar-default" style="background-color: #FFFFFF;">
  <div class="container-fluid">
  <div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarEexample2">
  <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="#">
  <img alt="ダイアモンド購入" src="/img/logo.png" style="height: 20px;">
  </a>
  </div>
 
  <div class="collapse navbar-collapse" id="navbarEexample2">
  <ul class="nav navbar-nav">
  <li class="active"><a href="#">注文・商品</a></li>
  <li><a href="#">送り先・支払確認</a></li>
  <li><a href="#">注文確定</a></li>
  </ul>
  </div>
  </div>
</nav>