<?php
include "../func/Database.php";
if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['member'])) {
    $db = connDB();
    $_POST['content']=str_replace("\n", "<br/>", $_POST['content']);
    mysqli_real_escape_string($db, $_POST['title']);
    mysqli_real_escape_string($db, $_POST['content']);
    mysqli_real_escape_string($db, $_POST['member']);
    mysqli_query($db, "INSERT INTO post(title, content, member) VALUES ('{$_POST['title']}','{$_POST['content']}', '{$_POST['member']}')");
    mysqli_close($db);
} else {
    echo '<script>alert("Wrong Access.")</script>';
}
?>

<script>location.replace("qna.php");</script>
