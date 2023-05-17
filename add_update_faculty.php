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
       
          $date=date('Y-m-d',strtotime( $_POST["date"]));
            $r = mysqli_query($con, "insert into faculty(f_name, f_date) values ('" . $_POST["name"] . "','$date' )");
            echo '<h2 style=" text-align: center ; background-color: rgba(211, 219, 211, 0.384);
                    color: green;" >Add done</h2>';
            // echo '<meta http-equiv="refresh" content="2; url=i.php">';
        }


        echo '
    <br><br>
    <!-- <div class="bg-image"></div> -->
    <form  method=post> <!-- Header -->
        <div class="head">
            <h1>Add faculty Information</h1>
       
        </div> <!-- /Header -->

        <!-- Main Form Started -->
        <label >faculty Name :</label>
        <input type="text" placeholder="faculty Name" name="name" >

        <label > date:</label>
        <input type="date" placeholder="1-1-2000" name="date"  required>
		

		<input class="submit_button" type="submit" name="sub" value="save">
        <!-- Submit Button -->
  

    </form>';
    }
    if (isset($_GET["update"])) {
        if (isset($_POST['sub'])) {
            $date=date('Y-m-d',strtotime( $_POST["date"]));
            $r = mysqli_query($con, "update faculty set f_name='" .  $_POST["name"] . "',f_date=" . $date . " where f_no=" . $_GET["update"]); //,Ctime='".$t."'   Cid=".$i.",
            echo '<h2 style=" text-align: center ; background-color: rgba(211, 219, 211, 0.384);
                    color: green;" >Update done</h2>';
            // echo '<meta http-equiv="refresh" content="2; url=i.php">';
        }

        $r = mysqli_query($con, "select * from faculty where f_no=" . $_GET["update"]); //. $_GET["d"]

    ?>

        <br><br>
        <form method=post>
            <div class="head">
                <h1>Update faculty Information</h1>
            </div>
        <?php
        while ($f = mysqli_fetch_array($r)) {
            echo '
        <label >Name:</label>
       <input type="text" placeholder="Name" name="name" value=' . $f["f_name"] . '>

       <label > date:</label>
       <input type="date" placeholder="1-1-2000" name="date"   required value='.$f["f_date"].' >

      
        <input class="submit_button" type="submit" name="sub" value="save">
        <!-- <button submit_button>Submit</button> -->
        ';
        }
    } ?>


</body>

</html>