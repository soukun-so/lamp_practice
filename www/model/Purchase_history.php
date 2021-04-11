<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function get_purchase_history($db, $user){
    $sql = '
        SELECT
            order_num,
            created,
            item_num,
            amount,
            item_name,
            item_value
        FROM
            buy_history
        INNER JOIN
            buy_amount
        ON
            buy_history.order_num = buy_amount.order_num
        INNER JOIN
            buy_history.order_num = item_details.order_num
    ';
    if ($user['user_id'] !== 1){
        $sql = 'WHERE user_id = ?';
    }

    return fetch_all_query($db, $sql, [$user['user_id']]);
}

?>