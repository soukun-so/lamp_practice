<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴一覧</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'login.css'); ?>"> </head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <div class="container">
    <h1>購入履歴一覧</h1>
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <?php if(count($histories) > 0){ ?>
    <table class="table table-bordered text-center">
      <thead class="thead-light">
        <tr>
          <th>注文番号</th>
          <th>購入日時</th>
          <th>合計金額</th>
          <th>購入明細</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($histories as $history){ ?>
        <tr>
          <td>
              <?php print (h($history['order_id'])); ?>
          </td>
          <td>
              <?php print (h($history['created'])); ?>
          </td>
          <td>
              <?php print (h($history['SUM(item_price*amount)'])); ?>
          </td>
          <td>
            <form method="post" action="purchase_historydetail.php">
              <input type="submit" value="明細" class="btn btn-secondary">
              <input type="hidden" name="order_id" value="<?php print (h($history['order_id'])); ?>">
              <input type="hidden" name="token" value="<?php print $token; ?>"> </form>
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