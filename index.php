<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <link rel="stylesheet" href="css_style/sign_in_style.css">

    <link rel="stylesheet" href="css_style/all.min.css">
    <script src="css_style/all.min.js"></script>

    <title>Sign In</title>
</head>

<body>
    <?php
        include "connect.php";
    ?>
    <header id="headId">

    <span><i><img src="images/logo.png" alt="No Image"></i>Student Information System</span>

    </header>

    <div class="container">
        <div class="left">
            <div class="text">
            </div>
            <div class="img">
                <img src="images/img.png" alt="no image">
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
        </div>
    </div>
</body>

</html>



<?php

if (isset($_POST['log'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    session_start(); 
    $_SESSION['email'] = $email;


    $sql = "select * from admin where admin_email='" . $email . "' and admin_password='" . $password . "'";

    $r = mysqli_query($con, $sql);
    if (mysqli_num_rows($r) == 0)
        echo "<script> alert('Error in your email or password..!'); </script>";
    else {
        // echo "wellcome";     
        header("location: home.php");
    }
}

?>