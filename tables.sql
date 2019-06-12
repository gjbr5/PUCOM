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
    sales       INT(3)    DEFAULT 0,
    product_id  INT(11)
);

CREATE TABLE post
(
    post_num INT(11) PRIMARY KEY AUTO_INCREMENT,
    title    VARCHAR(50) NOT NULL,
    content  TEXT,
    member   VARCHAR(11) NOT NULL,
    wrt_date TIMESTAMP DEFAULT current_timestamp(),
    hits     INT(11) DEFAULT 0,
    FOREIGN KEY (member) REFERENCES member (username)
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
