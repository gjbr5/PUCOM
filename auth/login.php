<?php
session_start();
if(isset($_POST['id']) && isset($_POST['password'])) {
    $db = mysqli_connect('localhost', 'pucom', 'puadmin', 'pucom');

// ID, PW, 이름, 생년월일, 주소(juso.go.kr), 우편번호, 전화번호, 이메일주소
    $id = $_POST['id'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $member = mysqli_query($db, "SELECT id, password FROM member WHERE id=$id, password=$password;");
    if (mysqli_num_rows($member) == 1) {
        $_SESSION['id'] = $member;
        echo "<script>location.replace('/');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>PUCOM Login</title>
</head>
<body>
<form method="post" action="login.php">
    <input type="text" name="id" placeholder="ID"/>
    <input type="password" name="password" placeholder="PW"/>
    <input type="submit"/>
</form>
</body>
</html>
