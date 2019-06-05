<?php
session_start();
$lang = null;
include "../func/Database.php";
include "../func/Language.php";

?>
<!DOCTYPE html>
<html lang="<?php echo $lang['lang']; ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo $lang['logintitle']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../img/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="../css/member/util.css">
    <link rel="stylesheet" type="text/css" href="../css/member/login.css">
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-26">
						<a href="../"><img src="../img/logo.png"/></a>
					</span>
                <span class="login100-form-title p-b-48">
						<?php echo $lang['login']; ?>
					</span>

                <div class="wrap-input100 validate-input" data-validate="<?php echo $lang['enterusername']; ?>">
                    <input class="input100" type="text" name="username">
                    <span class="focus-input100" data-placeholder="<?php echo $lang['username']; ?>"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="<?php echo $lang['enterpassword']; ?>">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                    <input class="input100" type="password" name="password">
                    <span class="focus-input100" data-placeholder="<?php echo $lang['password']; ?>"></span>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            <?php echo $lang['login']; ?>
                        </button>
                    </div>
                </div>

                <div class="text-center p-t-115">
						<span class="txt1">
							<?php echo $lang['donthaveaccount']; ?>
						</span>

                    <a class="txt2" href="register.php">
                        <?php echo $lang['register']; ?>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/member/login.js"></script>
<?php
if (isset($_POST['username']) && isset($_POST['password'])
    && login($_POST['username'], $_POST['password'])) {
    $_SESSION['username'] = $_POST['username'];
    echo "<script>location.replace('../');</script>";
} else
    echo "<script>alert('Login Failed');</script>";
?>

</body>
</html>