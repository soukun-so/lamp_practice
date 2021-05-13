<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'purchase_history.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);

if ($user['user_id'] === 4){
  $histories = get_all_purchase_history($db, $user);
} else {
  $histories = get_purchase_history($db, $user);
}

$histories = array_reverse($histories);

$token = get_csrf_token();

include_once VIEW_PATH . 'purchase_history_view.php';
