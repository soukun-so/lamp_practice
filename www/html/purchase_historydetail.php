<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'purchase_history.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

if ((is_valid_csrf_token(get_post('token'))) === false){
  set_error('不正なアクセスです');
  redirect_to(HOME_URL);
}

$db = get_db_connect();
$user = get_login_user($db);
$order_id = get_post('order_id'); 



if ($user['user_id'] === 4){
  $histories = get_allpurchase_history_detail($db, $user, $order_id);
} else {
  $histories = get_purchase_history_detail($db, $user, $order_id);
}

foreach ($histories as $history){
  $sumprice += $history['item_price']*$history['amount'];
}

include_once VIEW_PATH . 'purchase_historydetail_view.php';