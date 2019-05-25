<!--https://w3layouts.com/splendid-signup-form-flat-responsive-widget-template/-->
<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!doctype html>
<html lang="en">
<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script src='/js/jquery.min.js'></script>
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
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="/css/member/register.css" rel='stylesheet' type='text/css' media="all"/>
    <!-- /css files -->
</head>
<body>

<!-- Title -->
<h1 class="header-w3ls"><img src="/img/logo.png"/> Register</h1>

<!-- Form -->
<div class="signup-w3ls">
    <form action="register.php" method="post">
        <!-- Username -->
        <div class="form-control">
            <label class="header">USERNAME* :</label>
            <input type="text" id="username" name="username" placeholder="Username"
                   title="Please enter your ID" required/>
        </div>

        <!-- Password -->
        <div class="form-control">
            <label class="header">Password* :</label>
            <input type="password" class="lock" name="password" placeholder="Password" id="password1"
                   title="Please enter your Password" required/>
        </div>
        <div class="form-control">
            <label class="header">Confirm Password* :</label>
            <input type="password" class="lock" name="confirm-password" placeholder="Confirm Your Password"
                   id="password2"
                   title="Please enter your Password again" required/>
        </div>

        <!-- Name -->
        <div class="form-control">
            <label class="header">First Name* :</label>
            <input type="text" id="firstname" name="firstname" placeholder="First Name"
                   title="Please enter your First Name" required/>
        </div>
        <div class="form-control">
            <label class="header">Last Name* :</label>
            <input type="text" id="lastname" name="lastname" placeholder="Last Name"
                   title="Please enter your Last Name" required/>
        </div>

        <!-- Email -->
        <div class="form-control">
            <label class="header">Email Address* :</label>
            <input type="email" id="email" name="email" placeholder="mail@example.com"
                   title="Please enter a valid email"/>
        </div>

        <!-- Phone -->
        <div class="form-control">
            <label class="header">Phone :</label>
            <input type="text" id="phone" placeholder="010-1234-5678"/>
        </div>

        <!-- Address -->
        <div class="form-control">
            <label class="header">Postcode :</label>
            <input type="text" id="postcode" name="postcode" onclick="execDaumPostcode()" placeholder="Postcode"
                   readonly/>
        </div>
        <div class="form-control">
            <label class="header">Address :</label>
            <input type="text" id="roadAddress" name="address" placeholder="Address" readonly/><br/>
            <label class="header transparent"></label>
            <input type="text" id="detailAddress" name="detailAddress" placeholder="Detail Address"/>
        </div>

        <!-- Register Button -->
        <input type="submit" class="register" value="Register"/>
    </form>

</div>

<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script src="/js/member/register.js"></script>
<p class="copyright">© 2016 Splendid Signup Form. All Rights Reserved | Design by <a href="https://w3layouts.com/"
                                                                                     target="_blank">W3layouts</a></p>
</body>
</html>