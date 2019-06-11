<?php
$lang = null;
include "../func/Language.php";
include "../func/Database.php";
?>
<!DOCTYPE html>
<html lang="<?php echo $lang['lang']; ?>">
<head>
    <title><?php echo $lang['registertitle']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <script src='../js/jquery.min.js'></script>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- font files -->
    <link href='//fonts.googleapis.com/css?family=Muli:400,300,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>
    <!-- /font files -->
    <!-- css files -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/member/register.css" rel='stylesheet' type='text/css' media="all"/>
    <!-- /css files -->
</head>
<body>

<!-- Title -->
<h1 class="header-w3ls"><img src="../img/logo.png" style="max-width: 20%;"/> <?php echo $lang['register']; ?></h1>

<!-- Form -->
<div class="signup-w3ls">
    <form action="../func/auth.php" method="post">
        <input type="hidden" name="action" value="register"/>
        <!-- Username -->
        <div class="form-control">
            <label class="header"><?php echo $lang['username']; ?>* :</label>
            <input type="text" id="username" name="username" placeholder="<?php echo $lang['username']; ?>"
                   title="<?php echo $lang['enterusername']; ?>" required/>
        </div>

        <!-- Password -->
        <div class="form-control">
            <label class="header"><?php echo $lang['password']; ?>* :</label>
            <input type="password" class="lock" name="password" placeholder="Input Password at least 6 Characters."
                   id="password1"
                   title="<?php echo $lang['enterpassword']; ?>" required/>

        </div>
        <div class="form-control">
            <label class="header"><?php echo $lang['passwordconfirm']; ?>* :</label>
            <input type="password" class="lock" name="confirm-password"
                   placeholder="Input Your Password Again." id="password2"
                   title="<?php echo $lang['passwordconfirmtitle']; ?>" required/>
        </div>

        <!-- Name -->
        <div class="form-control">
            <label class="header"><?php echo $lang['name']; ?>* :</label>
            <input type="text" id="name" name="name" placeholder="<?php echo $lang['name']; ?>"
                   title="<?php echo $lang['nametitle']; ?>" required/>
        </div>

        <!-- Email -->
        <div class="form-control">
            <label class="header"><?php echo $lang['email']; ?>* :</label>
            <input type="email" id="email" name="email" placeholder="mail@example.com"
                   title="<?php echo $lang['emailtitle']; ?>" required/>
        </div>

        <!-- Phone -->
        <div class="form-control">
            <label class="header"><?php echo $lang['phone']; ?> :</label>
            <input type="text" id="phone" name='phone' placeholder="010-1234-5678"/>
        </div>

        <!-- Address -->
        <div class="form-control">
            <label class="header"><?php echo $lang['postcode']; ?> :</label>
            <input type="text" id="postcode" name="postcode" onclick="execDaumPostcode()"
                   placeholder="<?php echo $lang['postcode']; ?>"
                   readonly/>
        </div>
        <div class="form-control">
            <label class="header"><?php echo $lang['address']; ?> :</label>
            <input type="text" id="roadAddress" name="address" placeholder="<?php echo $lang['address']; ?>"
                   readonly/><br/>
            <label class="header transparent"></label>
            <input type="text" id="detailAddress" name="detailAddress"
                   placeholder="<?php echo $lang['detailaddress']; ?>"/>
        </div>

        <!-- Register Button -->
        <input type="submit" class="register" value="<?php echo $lang['register']; ?>"/>
    </form>

</div>

<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script>
    <!-- Validation Script -->
    window.onload = function () {
        document.getElementById("password1").onchange = validatePassword;
        document.getElementById("password2").onchange = validatePassword;
    };

    function validatePassword() {
        var pass1 = document.getElementById("password1").value;
        var pass2 = document.getElementById("password2").value;

        if (pass1.length < 6)
            document.getElementById("password1").setCustomValidity("Password is too short.");
        else
            document.getElementById("password1").setCustomValidity('');

        if (pass1 !== pass2)
            document.getElementById("password2").setCustomValidity("<?php echo $lang['passval'];?>");
        else
            document.getElementById("password2").setCustomValidity('');
        //empty string means no validation error
    }
</script>
<script src="../js/member/register.js"></script>
<p class="copyright">© 2016 Splendid Signup Form. All Rights Reserved | Design by <a href="https://w3layouts.com/"
                                                                                     target="_blank">W3layouts</a></p>


</body>
</html>