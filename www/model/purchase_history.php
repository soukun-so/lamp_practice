<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function get_all_purchase_history($db, $user){
    $sql = 'SELECT
        orders.order_id,
        created,
        SUM(item_price*amount)    
        FROM
            orders
        INNER JOIN
            order_items
        ON
            orders.order_id = order_items.order_id
        GROUP BY
            order_id';

    return fetch_all_query($db, $sql);
}

function get_purchase_history($db, $user){
    $sql = 'SELECT
        user_id,
        orders.order_id,
        created,
        SUM(item_price*amount)    
        FROM
            orders
        INNER JOIN
            order_items
        ON
            orders.order_id = order_items.order_id
        WHERE
            user_id = ?
        GROUP BY
            order_id';

    return fetch_all_query($db, $sql, [$user['user_id']]);
}

function get_allpurchase_history_detail($db, $user, $order_id){
        $sql = '
            SELECT
                orders.order_id,
                created,
                amount,
                item_name,
                item_price
            FROM
                orders
            INNER JOIN
                order_items
            ON
                orders.order_id = order_items.order_id
            WHERE
                orders.order_id = ?
        ';
        return fetch_all_query($db, $sql, [$order_id]);
}

function get_purchase_history_detail($db, $user, $order_id){
        $sql = '
        SELECT
            orders.order_id,
            created,
            amount,
            item_name,
            item_price
        FROM
            orders
        INNER JOIN
            order_items
        ON
            orders.order_id = order_items.order_id
        WHERE 
            user_id = ? AND orders.order_id = ?
        ';
        return fetch_all_query($db, $sql, [$user['user_id'], $order_id]);
}

?>
