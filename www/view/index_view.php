<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  
  <title>商品一覧</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'index.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  

  <div class="container">
    <h1>商品一覧</h1>
    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <div class="card-deck">
      <div class="row">
      <?php foreach($items as $item){ ?>
        <div class="col-6 item">
          <div class="card h-100 text-center">
            <div class="card-header">
              <?php print (h($item['name'])); ?>
            </div>
            <figure class="card-body">
              <img class="card-img" src="<?php print (h(IMAGE_PATH . $item['image'])); ?>">
              <figcaption>
                <?php print (h(number_format($item['price']))); ?>円
                <?php if($item['stock'] > 0){ ?>
                  <form action="index_add_cart.php" method="post">
                    <input type="submit" value="カートに追加" class="btn btn-primary btn-block">
                    <input type="hidden" name="item_id" value="<?php print (h($item['item_id'])); ?>">
                    <input type="hidden" name="token" value="<?php print $token; ?>">
                  </form>
                <?php } else { ?>
                  <p class="text-danger">現在売り切れです。</p>
                <?php } ?>
              </figcaption>
            </figure>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>

    <h1>商品ランキング</h1>

    <?php if(count($rankings) > 0){ ?>
      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th>順位</th>
            <th>画像</th>
            <th>商品名</th>
            <th>値段</th>
            <th>購入</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($rankings as $index => $ranking){ ?>
          <tr>
            <td><p><?php print ($index + 1);?></p></td>
            <td><img src="<?php print (h(IMAGE_PATH . $ranking['image']));?>" style="width: 200px"></td>
            <td><?php print(h($ranking['name'])); ?></td>
            <td><?php print (h(number_format($ranking['price']))); ?>円</td>
            <td>
              <?php if($ranking['stock'] > 0){ ?>
                <form action="index_add_cart.php" method="post">
                  <input type="submit" value="カートに追加" class="btn btn-primary btn-block">
                  <input type="hidden" name="item_id" value="<?php print (h($ranking['item_id'])); ?>">
                  <input type="hidden" name="token" value="<?php print $token; ?>">
                </form>
                <?php } else { ?>
                  <p class="text-danger">現在売り切れです。</p>
                <?php } ?>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <p>ランキングはありません</p>
    <?php } ?> 

  </div>
  
</body>
</html>