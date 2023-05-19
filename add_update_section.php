<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sections</title>
    <link rel="stylesheet" href="css_style/style.css">
    <link rel="stylesheet" href="css_style/form_style.css">
    <link rel="stylesheet" href="css_style/style.css">
    <script src="css_style/all.min.js"></script>
</head>

<body>

    <?php
    include "connect.php";
    include "header.php";

    if (isset($_GET['add'])) {
        if (isset($_POST['sub'])) {

            $date = date('Y-m-d', strtotime($_POST["date"]));
            $r = mysqli_query($con, "insert into section(sec_name, sec_date,f_no) values ('" . $_POST["name"] . "','" . $date . "'," . $_POST["faculty_no"] . " )");
            echo '<h2 style=" text-align: center ; background-color: rgba(211, 219, 211, 0.384);
                    color: green;" >Add done</h2>';
            echo '<meta http-equiv="refresh" content="2; url=show_section.php">';
        }


        echo '
    <br><br>
    <!-- <div class="bg-image"></div> -->
    <form  method=post> <!-- Header -->
        <div class="head">
            <h1>Add section Information</h1>
       
        </div> <!-- /Header -->

        <!-- Main Form Started -->
        <label >section Name :</label>
        <input type="text" placeholder="section Name" name="name" >

        <label > create date :</label>
        <input type="date" placeholder="date" name="date"  required>

		<label >faculty Name :</label>
        <select name="faculty_no" id="">
        <option value="">Select faculty</option>       
        ';
        $r = mysqli_query($con, "select f_no, f_name from faculty ");
        while ($f = mysqli_fetch_array($r)) {

            echo '<option value=' . $f["f_no"] . '>' . $f["f_name"] . '</option>';
        }
        echo '</select>
     
		<input class="submit_button" type="submit" name="sub" value="save">
        <!-- Submit Button -->

    </form>';
    }
    if (isset($_GET["update"])) {

        if (isset($_POST['sub'])) {
            $date = date('Y-m-d', strtotime($_POST["date"]));
            $r = mysqli_query($con, "update section set sec_name='" .  $_POST["name"] . "',
            sec_date='" . $date . "',f_no=" . $_POST["faculty_no"] . " where sec_no=" . $_GET["update"]); //,Ctime='".$t."'   Cid=".$i.",
            echo '<h2 style=" text-align: center ; background-color: rgba(211, 219, 211, 0.384);
                    color: green;" >Update done</h2>';
            echo '<meta http-equiv="refresh" content="2; url=show_section.php">';
        }

        $r = mysqli_query($con, "select * from section where sec_no=" . $_GET["update"]); //. $_GET["d"]

    ?>

        <br><br>
        <form method=post>
            <div class="head">
                <h1>Update section Information</h1>
            </div>
        <?php
        while ($f = mysqli_fetch_array($r)) {
            echo '
        <label >Name:</label>
       <input type="text" placeholder="Name" name="name" value=' . $f["sec_name"] . '>

        <label>create date:</label>
        <input type="date" placeholder=""  name="date"  required value=' . $f["sec_date"] . '>
       
        <label >faculty Name :</label>
        <select name="faculty_no" id="">
        <option value="">Select faculty</option>       
        ';
            $r = mysqli_query($con, "select f_no, f_name from faculty ");
            while ($f = mysqli_fetch_array($r)) {

                echo '<option value=' . $f["f_no"] . '>' . $f["f_name"] . '</option>';
            }
            echo '</select>
      
        <input class="submit_button" type="submit" name="sub" value="save">
        <!-- <button submit_button>Submit</button> -->
        ';
        }
    } ?>


</body>

</html>