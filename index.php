<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="all.min.css">
    <link rel="stylesheet" href="sign_in.css">

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->

    <title>Sign In</title>
</head>

<body>
    <div class="container">
        <div class="left">
            <div class="text">
            </div>
            <div class="img">
                <img src="logo.png" alt="pic">
            </div>
        </div>
        <div class="right">
            <form action="" method="POST">
                <h1> تسجيل الدخول</h1>
                <div>
                    <i class="fas fa-user a"></i>
                    <input type="text" name="email" placeholder="Email" />
                </div>
                <div>
                    <i class="fas fa-lock b"></i>
                    <input type="password" name="password" placeholder="Password" />

                </div>

                <div>
                    <input type="submit" value="Login" class="send" name="log">

                </div>
            </form>
            <div class="text">
                <p><a href="sign_up.php">إنشاء حساب جديد</a></p>
                <p>or sign in with social media</p>
            </div>
        </div>
    </div>
</body>

</html>



<?php

if (isset($_POST['log'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];


    session_start();
    $_SESSION['admin'] = $email;


    $sql = "select * from admin where admin_email='" . $email . "' and admin_password='" . $password . "'";

    $r = mysqli_query($connect, $sql);
    if (mysqli_num_rows($r) == 0)
        echo "<script> alert('Error in your email or password..!'); </script>";
    else {
        echo "wellcome";
        // header("location: adminpannel.php");
    }
}

?>