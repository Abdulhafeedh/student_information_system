<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="s.css">
</head>

<body>

<?php
    include "connect.php";
    include "header.php";

    if (isset($_GET['add'])) {
        if (isset($_POST['sub'])) {

            $r = mysqli_query($con, "insert into teatcher(t_name, t_phone_number, t_address, t_salary) values ('" . $_POST["fullName"] . "','" . $_POST["phoneNumber"] . "','" . $_POST["address"] . "', " . $_POST["salary"] . "  )");
            echo '<h2 style=" text-align: center ; background-color: rgba(211, 219, 211, 0.384);
                    color: green;" >Add done</h2>';
            // echo '<meta http-equiv="refresh" content="2; url=i.php">';
        }
        echo '
    
    <br><br>
    <!-- <div class="bg-image"></div> -->
    <form  method=post> <!-- Header -->
        <div class="head">
            <h1>Add teatchar Information</h1>
       
        </div> <!-- /Header -->

        <!-- Main Form Started -->
        <label > Name:</label>
        <input type="text" placeholder="Full Name" name="fullName" >

        <label > phone number:</label>
        <input type="text" placeholder="phone number" name="phoneNumber"  required>
		<label>Address:</label>
        <input type="text" placeholder="Address:" name="address"   required >
        <label >salary:</label>
        <input type="tetx" placeholder="salary" name="salary"  required>

		<input class="submit_button" type="submit" name="sub" value="save">
        <!-- Submit Button -->
  

    </form>';
    }
    if (isset($_GET["t_no"])) {
        if (isset($_POST['sub'])) {

            $r = mysqli_query($con, "update teatcher set t_name='" .  $_POST["name"] . "',t_phone_number=" . $_POST["phoneNumper"] . ", t_address='" . $_POST["address"] . "',  t_salary=" . $_POST["salary"] . " where t_no=". $_GET["t_no"] ); //,Ctime='".$t."'   Cid=".$i.",
            echo '<h2 style=" text-align: center ; background-color: rgba(211, 219, 211, 0.384);
                    color: green;" >Update done</h2>';
            // echo '<meta http-equiv="refresh" content="2; url=i.php">';
        }

        $r = mysqli_query($con, "select * from teatcher where t_no=".$_GET["t_no"]  );//. $_GET["d"]

    ?>

        <br><br>
        <form method=post>
            <div class="head">
                <h1>Update teatchar Information</h1>
            </div>
        <?php
        while ($f = mysqli_fetch_array($r)) {
            echo '
        <label >Name:</label>
       <input type="text" placeholder="Name" name="name" value=' . $f["t_name"] . '>

        <label>phone Numper:</label>
        <input type="text" placeholder=" phone number" name="phoneNumper" required value=' . $f["t_phone_number"] . '>

        <label >Address:</label>
        <input type="text" placeholder="Address:" name="address" required value=' . $f["t_address"] . '>
        <label>salary:</label>
        <input type="text" placeholder="salary:" name="salary" required value=' . $f["t_salary"] . '>
        <input class="submit_button" type="submit" name="sub" value="save">
        <!-- <button submit_button>Submit</button> -->
        ';
        }
    } ?>


</body>

</html>