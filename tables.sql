CREATE TABLE member
(
    username   VARCHAR(11) PRIMARY KEY,
    password   VARCHAR(255),
    name       VARCHAR(20),
    email      VARCHAR(50),
    phone      VARCHAR(13),
    postcode   INT(11),
    address    VARCHAR(100),
    used_money INT(11)     DEFAULT 0,
    membership VARCHAR(10) DEFAULT 'FAMILY'
);

CREATE TABLE product
(
    num         INT(11) PRIMARY KEY AUTO_INCREMENT,
    category    INT(11),
    name        VARCHAR(50),
    description TEXT,
    price       INT(11),
    img_url     VARCHAR(200),
    upload_date DATE,
    sales       INT(3)
);

CREATE TABLE post
(
    post_num INT(11) PRIMARY KEY AUTO_INCREMENT,
    title    VARCHAR(50) NOT NULL,
    content  TEXT,
    member   VARCHAR(11) NOT NULL,
    wrt_date DATETIME DEFUALT NOW(),
    hits     INT(11),
    FOREIGN KEY (member) REFERENCES member (username)
);

CREATE TABLE reply
(
    repl_num  INT(11) PRIMARY KEY AUTO_INCREMENT,
    post_num  INT(11) NOT NULL,
    comm_date DATE DEFUALT NOW(),
    content   TEXT,
    FOREIGN KEY (post_num) REFERENCES post (post_num)
);

/*
DROP TABLE comments;
DROP TABLE post;
DROP TABLE product;
DROP TABLE member;
*/
