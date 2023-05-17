<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="s.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
        include "connect.php";
        include "header.php";

        // echo '<nav id="nav_id">
        //     <br>
        //     <a " href="index.php"><i class="fa-solid fa-house"></i>&nbsp;Home&nbsp;&nbsp;</a>
        //     <a  href="course.php"><i class="fa-solid fa-book-open-reader"></i>&nbsp;Course&nbsp;&nbsp;</a>
        //     <a  href="Questions.php"><i class="fa-solid fa-clipboard-question"></i>&nbsp;Questions&nbsp;&nbsp;</a>
        //     <a  href="student_exams.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;exams</a>
        //     <a  style="color: orange; href="student_exams.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Add Admin</a>
        //     </nav>';

        if (isset($_POST['sub'])) {

            $r = mysqli_query($con, "insert into admin(admin_name, admin_email, admin_password, admin_phone_number) values ('" . $_POST["name"] . "','". $_POST["email"] ."', '". $_POST["password"] ."', '". $_POST["phone_number"] ."')");
            echo '<h2 style=" text-align: center ; background-color: rgba(211, 219, 211, 0.384);
                    color: green;" >Add done</h2>';
            echo '<meta http-equiv="refresh" content="2; url=add_admin.php">';
        }

    ?>
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

        <!-- <label for="message">Message:</label>
        <textarea placeholder="Your Message Here" name="message" id="message" required></textarea> -->
        <input class="submit_button" type="submit" name="sub" value="save">
        <!-- <button submit_button>Submit</button> -->

    </form>
</body>

</html>