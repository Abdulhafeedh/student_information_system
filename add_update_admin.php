<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css_style/form_style.css">
    <link rel="stylesheet" href="css_style/style.css">
    <link rel="stylesheet" href="css_style/style.css">
    <script src="css_style/all.min.js"></script>
</head>

<body>
    <?php
    include "connect.php";
    include "header.php";
    echo ' <div>';
    if (isset($_GET['add'])) {
        if (isset($_POST['sub'])) {

            $r = mysqli_query($con, "insert into admin(admin_name, admin_email, admin_password, admin_phone_number) values ('" . $_POST["name"] . "','" . $_POST["email"] . "', '" . $_POST["password"] . "', '" . $_POST["phone_number"] . "')");
            echo '<h2 style=" text-align: center ; background-color: rgba(211, 219, 211, 0.384);
                    color: green;" >Add done</h2>';
            echo '<meta http-equiv="refresh" content="2; url=show_admin.php">';
        }
        echo '
    
    <br><br>
    <form method=post> 
        <div class="head">
        <h1>Add Admin Information</h1>
        </div>
        <label for="fullName">Name:</label>
        <input type="text" placeholder="Name" name="name">

        <label for="email">Email:</label>
        <input type="email" placeholder="Email" name="email" required>

        <label for="subject">Password:</label>
        <input type="text" placeholder="Password" name="password" required>

        <label for="subject">Phone Number:</label>
        <input type="text" placeholder="Phone Number" name="phone_number" required>
        <input class="submit_button" type="submit" name="sub" value="save">
    
        

    </form>';
    }
    if (isset($_GET["update"])) {
        if (isset($_POST['sub'])) {

            $r = mysqli_query($con, "update admin set admin_name='" .  $_POST["name"] . "',admin_email='" . $_POST["email"] . "', admin_password=" . $_POST["password"] . ",  admin_phone_number=" . $_POST["phone_number"] . " where admin_id=1"); //,Ctime='".$t."'   Cid=".$i.",
            echo '<h2 style=" text-align: center ; background-color: rgba(211, 219, 211, 0.384);
                    color: green;" >Update done</h2>';
            echo '<meta http-equiv="refresh" content="2; url=show_admin.php">';
        }

        $r = mysqli_query($con, "select * from admin where admin_id=1"); //. $_GET["d"]

    ?>

        <br><br>
        <form method=post>
            <div class="head">
                <h1>Update Admin Information</h1>
            </div>
        <?php
        while ($f = mysqli_fetch_array($r)) {
            echo '
        <label for="fullName">Name:</label>
       <input type="text" placeholder="Name" name="name" value=' . $f["admin_name"] . '>

        <label for="email">Email:</label>
        <input type="email" placeholder="Email" name="email" required value=' . $f["admin_email"] . '>

        <label for="subject">Password:</label>
        <input type="text" placeholder="Password" name="password" required value=' . $f["admin_password"] . '>

        <label for="subject">Phone Number:</label>
        <input type="text" placeholder="Phone Number" name="phone_number" required value=' . $f["admin_phone_number"] . '>

        <!-- <label for="message">Message:</label>
        <textarea placeholder="Your Message Here" name="message" id="message" required></textarea> -->
        <input class="submit_button" type="submit" name="sub" value="save">
        ';
        }
    } ?>
        </form>


        </form>
        </div>
</body>

</html>