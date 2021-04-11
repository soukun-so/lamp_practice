<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴一覧</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'login.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
    <div class="container">
        <h1>購入履歴一覧</h1>

        <?php include VIEW_PATH . 'templates/messages.php'; ?>

        <?php print $user['type']; ?>
    </div>
</body>
</html>