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
    if (isset($_GET['add'])) {
        if (isset($_POST['sub'])) {

            $r = mysqli_query($con, "insert into admin(admin_name, admin_email, admin_password, admin_phone_number) values ('" . $_POST["name"] . "','" . $_POST["email"] . "', '" . $_POST["password"] . "', '" . $_POST["phone_number"] . "')");
            echo '<h2 style=" text-align: center ; background-color: rgba(211, 219, 211, 0.384);
                    color: green;" >Add done</h2>';
            echo '<meta http-equiv="refresh" content="2; url=i.php">';
        }
        echo '
    
    <br><br>
    <!-- <div class="bg-image"></div> -->
    <form> <!-- Header -->
        <div class="head">
            <h1>Contact Form</h1>
            <p>Please fill all the texts in the fields</p>
        </div> <!-- /Header -->

        <!-- Main Form Started -->
        <label for="fullName">Your Name:</label>
        <input type="text" placeholder="Full Name" name="fullName" id="fullName">

        <label for="email">Your Email:</label>
        <input type="email" placeholder="abcd@xyz.com" name="email" id="email" required>

        <label for="subject">Subject:</label>
        <input type="subject" placeholder="Job Enquiry" name="text" id="subject" required>

        <label for="message">Message:</label>
        <textarea placeholder="Your Message Here" name="message" id="message" required></textarea>

        <!-- Submit Button -->
        <button>Submit</button>

    </form>';
    }
    if (isset($_GET["update"])) {
        if (isset($_POST['sub'])) {

            $r = mysqli_query($con, "update admin set admin_name='" .  $_POST["name"] . "',admin_email='" . $_POST["email"] . "', admin_password=" . $_POST["password"] . ",  admin_phone_number=" . $_POST["phone_number"] . " where admin_id=1"); //,Ctime='".$t."'   Cid=".$i.",
            echo '<h2 style=" text-align: center ; background-color: rgba(211, 219, 211, 0.384);
                    color: green;" >Update done</h2>';
            echo '<meta http-equiv="refresh" content="2; url=i.php">';
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
        <!-- <button submit_button>Submit</button> -->
        ';
        }
    } ?>
        </form>


        </form>
        <!-- /Main Form Ended -->
</body>

</html>