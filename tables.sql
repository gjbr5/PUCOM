/*사용자 테이블*/
CREATE TABLE member
(
    username   VARCHAR(11) PRIMARY KEY, /*사용자ID*/
    password   VARCHAR(255),/*비밀번호*/
    name       VARCHAR(20),/*이름*/
    email      VARCHAR(50),/*이메일*/
    phone      VARCHAR(13),/*전화번호*/
    postcode   INT(11),/*우편번호*/
    address    VARCHAR(100)/*주소*/
);

/*상품 테이블*/
CREATE TABLE product
(
    num         INT(11) PRIMARY KEY AUTO_INCREMENT,/*기본키*/
    category    INT(11),/*카테고리*/
    name        VARCHAR(100) NOT NULL,/*상품명*/
    description TEXT,/*설명*/
    price       DECIMAL(11, 2),/*가격*/
    img_url     VARCHAR(200),/*이미지파일*/
    upload_date TIMESTAMP DEFAULT current_timestamp(),/*업로드시간*/
    sales       INT(3)    DEFAULT 0,/*할인율*/
    product_id  INT(11)/*상품코드*/
);

/*게시글 테이블*/
CREATE TABLE post
(
    post_num INT(11) PRIMARY KEY AUTO_INCREMENT,/*게시글번호*/
    title    VARCHAR(50) NOT NULL,/*게시글제목*/
    content  TEXT,/*내용*/
    member   VARCHAR(11) NOT NULL,/*사용자ID*/
    wrt_date TIMESTAMP DEFAULT current_timestamp(),/*작성일시*/
    hits     INT(11) DEFAULT 0,/*조회수*/
    FOREIGN KEY (member) REFERENCES member (username)
);


/*

카테고리번호
100 : Desktop
200 : Laptop
300 : Mice
400 : Keyboards
500 : Accessories

Product ID : 상품종류4자리/색상2자리

*/
