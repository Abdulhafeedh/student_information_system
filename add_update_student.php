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
    if (isset($_GET['add'])) {
        if (isset($_POST['sub'])) {
            $date=date('Y-m-d',strtotime( $_POST["dob"]));
            $r = mysqli_query($con, "insert into students(s_name, s_id, s_sex, s_address, s_dob, s_phone_number, s_nationality, sec_no, s_level) values ('" . $_POST["name"] . "','" . $_POST["id"] . "', '" . $_POST["sex"] .
             "', '" . $_POST["address"] . "', '" . $date . "','" . $_POST["phone_number"] . "', '" . $_POST["nationality"] . "', '" . $_POST["section_no"] . "', '" . $_POST["level"] . "')");
            echo '<h2 style=" text-align: center ; background-color: rgba(211, 219, 211, 0.384);
                    color: green;" >Add done</h2>';
            echo '<meta http-equiv="refresh" content="2; url=show_student.php">';
        }
        echo '
    
    <br><br>
    <form method=post> 
    
        <div class="head">
        <h1>Add Student Information</h1>
        </div>

        <label>Name:</label>
        <input type="text" placeholder="Name" name="name">

        <label>ID:</label>
        <input type="text" placeholder="ID" name="id" required>

        <label >Sex:</label>
        <select name="sex" id="">
        <option value="">Select Sex</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        </select>

        <label >Address:</label>
        <input type="text" placeholder="Address" name="address" required>

        <label>DOB:</label>
        <input type="date" placeholder="DOB" name="dob">

        <label>Phone Number:</label>
        <input type="text" placeholder="Phone Number" name="phone_number" required>

        <label >Nationality:</label>
        <input type="text" placeholder="Nationality" name="nationality" required>
            
        <label >Section Name:</label>
        <select name="section_no" id="">
        <option value="">Select Section</option>
       
        ';
        $r = mysqli_query($con, "select sec_no, sec_name from section where sec_no=1");
        while ($f = mysqli_fetch_array($r)) {

            echo '<option value=' . $f["sec_no"] . '>' . $f["sec_name"] . '</option>';
        }

        echo '
        </select>
        <label >Level:</label>
        <select name="level" id="">
        <option value="">Select Level</option>
        <option value="Level 1">Level 1</option>
        <option value="Level 2">Level 2</option>
        <option value="Level 3">Level 3</option>
        <option value="Level 4">Level 4</option>
        <option value="Level 5">Level 5</option>
        </select>

        <input class="submit_button" type="submit" name="sub" value="save">

    </form> <br>';
    }
    if (isset($_GET["update"])) {
        if (isset($_POST['sub'])) {
            $date=date('Y-m-d',strtotime( $_POST["dob"]));
            $r = mysqli_query($con, "update students set s_name='" .  $_POST["name"] . "',s_id=" .
            $_POST["id"] ." , s_sex='" . $_POST["sex"] . "',  s_address='" .  $_POST["address"] . "',
            s_dob='" . $date . "', s_phone_number=" . $_POST["phone_number"] . ",
            s_nationality='" .  $_POST["nationality"]. "', sec_no =" . $_POST["section_no"] . ",
            s_level='" .  $_POST["level"] . "' where s_no=". $_GET["update"]); 

            echo '<h2 style=" text-align: center ; background-color: rgba(211, 219, 211, 0.384);color: green;" >Update done</h2>';
           
            echo '<meta http-equiv="refresh" content="2; url=show_student.php">';
        }

        $r = mysqli_query($con, "select 	students.s_no, students.s_name, students.s_id,
        students.s_sex,students.s_address,students.s_dob,students.s_phone_number,
        students.s_nationality,section.sec_name ,students.s_level FROM students 
        JOIN section ON students.sec_no = section.sec_no 
        where students.s_no=". $_GET["update"]);

    ?>

        <br><br>
        <form method=post>
            <div class="head">
                <h1>Update Student Information</h1>
            </div>
        <?php
        while ($f = mysqli_fetch_array($r)) {
            echo '
    
            <label>Name:</label>
            <input type="text" placeholder="Name" name="name" value=' . $f["s_name"] . '>
    
            <label>ID:</label>
            <input type="text" placeholder="ID" name="id"  value=' . $f["s_id"] . '>
    
            <label >Sex:</label>
            <select name="sex" id="">
            <option value="">Select Sex</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            </select>
    
            <label >Address:</label>
            <input type="text" placeholder="Address" name="address" value=' . $f["s_address"] . '>
    
            <label>DOB:</label>
            <input type="date" placeholder="DOB" name="dob" value=' . $f["s_dob"] . '>
    
            <label>Phone Number:</label>
            <input type="text" placeholder="Phone Number" name="phone_number" value=' . $f["s_phone_number"] . '>
    
            <label >Nationality:</label>
            <input type="text" placeholder="Nationality" name="nationality" value=' . $f["s_nationality"] . '>
                
            <label >Section Name:</label>
            <select name="section_no" id="">
            <option value="">Select Section</option>
           
            ';
            $r = mysqli_query($con, "select sec_no, sec_name from section");
            while ($f = mysqli_fetch_array($r)) {
    
                echo '<option value=' . $f["sec_no"] . '>' . $f["sec_name"] . '</option>';
            }
    
            echo '
            </select>
            <label >Level:</label>
            <select name="level" id="">
            <option value="">Select Level</option>
            <option value="Level 1">Level 1</option>
            <option value="Level 2">Level 2</option>
            <option value="Level 3">Level 3</option>
            <option value="Level 4">Level 4</option>
            <option value="Level 5">Level 5</option>
            </select>
    
            <input class="submit_button" type="submit" name="sub" value="save">
    
        </form> <br>
        ';
        }
    } ?>
</body>

</html>