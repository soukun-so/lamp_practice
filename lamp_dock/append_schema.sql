CREATE TABLE orders (
    order_id int(11) AUTO_INCREMENT,
    user_id int(11),
    created datetime,
    PRIMARY KEY (order_id)
);

CREATE TABLE order_items (
    id int(11) AUTO_INCREMENT,
    order_id int(11),
    item_id int(11),
    amount int(11),
    item_name VARCHAR(100),
    item_price int(11)
    PRIMARY KEY (id)
);