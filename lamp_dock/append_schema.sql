CREATE TABLE buy_history (
    order_num int(11) AUTO_INCREMENT,
    user_id int(11),
    created datetime,
    PRIMARY KEY (order_num)
);

CREATE TABLE buy_amount (
    Processing_number int(11) AUTO_INCREMENT,
    order_num int(11),
    item_num int(11),
    amount int(11),
    PRIMARY KEY (Processing_number)
);

CREATE TABLE item_details (
    Processing_number int(11) AUTO_INCREMENT,
    order_num int(11),
    item_num int(11),
    item_name VARCHAR(100),
    item_value int(11),
    PRIMARY KEY (Processing_number)
);