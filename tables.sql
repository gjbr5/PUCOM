CREATE TABLE member
(
    username   VARCHAR(11) PRIMARY KEY,
    password   VARCHAR(255),
    name       VARCHAR(20),
    email      VARCHAR(50),
    phone      VARCHAR(13),
    postcode   INT(11),
    address    VARCHAR(100)
);

CREATE TABLE product
(
    num         INT(11) PRIMARY KEY AUTO_INCREMENT,
    category    INT(11),
    name        VARCHAR(50) NOT NULL,
    description TEXT,
    price       DECIMAL(11, 2),
    img_url     VARCHAR(200),
    upload_date TIMESTAMP DEFAULT current_timestamp(),
    sales       INT(3)    DEFAULT 0
);

CREATE TABLE post
(
    post_num INT(11) PRIMARY KEY AUTO_INCREMENT,
    title    VARCHAR(50) NOT NULL,
    content  TEXT,
    member   VARCHAR(11) NOT NULL,
    wrt_date TIMESTAMP DEFAULT current_timestamp(),
    hits     INT(11),
    FOREIGN KEY (member) REFERENCES member (username)
);

CREATE TABLE reply
(
    repl_num  INT(11) PRIMARY KEY AUTO_INCREMENT,
    post_num  INT(11) NOT NULL,
    comm_date TIMESTAMP DEFAULT current_timestamp(),
    content   TEXT,
    FOREIGN KEY (post_num) REFERENCES post (post_num)
);

CREATE TABLE orders
(
    order_num  INT(11) PRIMARY KEY AUTO_INCREMENT,
    member     VARCHAR(11) NOT NULL,
    order_date TIMESTAMP DEFAULT current_timestamp(),
    FOREIGN KEY (member) REFERENCES member (username)
);

CREATE TABLE order_product
(
    order_num   INT(11),
    product_num INT(11),
    quantity    INT(11),
    PRIMARY KEY (order_num, product_num),
    FOREIGN KEY (order_num) REFERENCES orders (order_num),
    FOREIGN KEY (product_num) REFERENCES product (num)
);
/*

100 : desktop
200 : laptop
300 : mice
400 : key
500 : acc

ID : xxx/xxxx/xx

상품카테고리/상품종류/옵션(색상)

 */


/*
DROP TABLE comments;
DROP TABLE post;
DROP TABLE product;
DROP TABLE member;
*/
