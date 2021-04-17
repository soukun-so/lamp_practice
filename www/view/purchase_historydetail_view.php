<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴一覧</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'login.css'); ?>"> </head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <div class="container">
    <h1>購入履歴明細</h1>
    <p>注文番号：<?php print (h($order_id));?></p>
    <p>購入日時：<?php print (h($history['created']));?></p>
    <p>合計金額：<?php print (h($sumprice));?></p>
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <?php if(count($histories) > 0){ ?>
    <table class="table table-bordered text-center">
      <thead class="thead-light">
        <tr>
          <th>商品名</th>
          <th>価格</th>
          <th>購入数</th>
          <th>小計</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($histories as $history){ ?>
        <tr>
          <td>
              <?php print (h($history['item_name'])); ?>
          </td>
          <td>
              <?php print (h($history['item_price'])); ?>
          </td>
          <td>
              <?php print (h($history['amount'])); ?>
          </td>
          <td>
              <?php print (h($history['item_price']*$history['amount'])); ?>
          </td>
      </tr>
      <?php }?>
      </tbody>
    </table>
    <?php } else { ?>
    <p>商品はありません。</p>
    <?php } ?> 
  </div>
</body>
</html>