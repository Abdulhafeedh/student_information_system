<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="css_style/form_style.css">
    <link rel="stylesheet" href="css_style/style.css">
    <link rel="stylesheet" href="css_style/style.css">
    <script src="css_style/all.min.js"></script>
</head>

<body>
    <?php
    include "connect.php";
    include "header.php";
    if (isset($_GET['add'])) {
        if (isset($_POST['sub'])) {

            $r = mysqli_query($con, "insert into courses(cour_name, t_no, sec_no, cour_level, cour_term) values ('" . $_POST["name"] . "','" . $_POST["teatcher_no"] .
                "','" . $_POST["section_no"] . "', '" . $_POST["level"] . "', '" . $_POST["term"] . "')");
            echo '<h2 style=" text-align: center ; background-color: rgba(211, 219, 211, 0.384);
                    color: green;" >Add done</h2>';
            echo '<meta http-equiv="refresh" content="2; url=show_courses.php">';
        }
        echo '
    
    <br><br>
    <form method=post> 
    
        <div class="head">
        <h1>Add course Information</h1>
        </div>

        <label>Name:</label>
        <input type="text" placeholder="Name" name="name">

        <label >Section Name:</label>
        <select name="section_no" id="">
        <option value="">Select Section</option>       
        ';
        $r = mysqli_query($con, "select sec_no, sec_name from section ");
        while ($f = mysqli_fetch_array($r)) {

            echo '<option value=' . $f["sec_no"] . '>' . $f["sec_name"] . '</option>';
        }
        echo '
        </select>
        <label >teatcher Name:</label>
        <select name="teatcher_no" id="">
        <option value="">Select teatcher</option>';
        $r = mysqli_query($con, "select t_no, t_name from teatcher");
        while ($f = mysqli_fetch_array($r)) {

            echo '<option value=' . $f["t_no"] . '>' . $f["t_name"] . '</option>';
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
        
        <label >Term:</label>
        <select name="term" id="">
        <option value="">Select term</option>
        <option value="Term 1">Term 1</option>
        <option value="Term 2">Term 2</option>
        <option value="Term 3">Term 3</option>
        </select>  

        <input class="submit_button" type="submit" name="sub" value="save">

    </form> <br>';
    }
    if (isset($_GET["update"])) {
        if (isset($_POST['sub'])) {

            $r = mysqli_query($con, "update courses set cour_name='" .  $_POST["name"] . "',t_no=" .
                $_POST["teatcher_no"] .  ", sec_no =" . $_POST["section_no"] . ",
            cour_level='" .  $_POST["level"] . "',
            cour_term='" .  $_POST["term"] . "' where cour_no=" . $_GET["update"]);

            echo '<h2 style=" text-align: center ; background-color: rgba(211, 219, 211, 0.384);color: green;" >Update done</h2>';

            echo '<meta http-equiv="refresh" content="2; url=show_courses.php">';
        }

        $r = mysqli_query($con, "select courses.cour_no ,courses.cour_name,
        teatcher.t_name,section.sec_name ,courses.cour_level,courses.cour_term 
        FROM courses JOIN section ON courses.sec_no = section.sec_no 
        JOIN teatcher ON courses.t_no = teatcher.t_no
        where courses.cour_no=" . $_GET["update"]);
        // "select * from admin where admin_id=1"); //. $_GET["d"]

    ?>

        <br><br>
        <form method=post>
            <div class="head">
                <h1>Update courses Information</h1>
            </div>
        <?php
        while ($f = mysqli_fetch_array($r)) {
            echo '
    
            <label>Name:</label>
            <input type="text" placeholder="Name" name="name" value=' . $f["cour_name"] . '>
                
            <label >Section Name:</label>
            <select name="section_no" id="">
            <option value="">Select Section</option>
           
            ';
            $r = mysqli_query($con, "select sec_no, sec_name from section ");
            while ($f = mysqli_fetch_array($r)) {

                echo '<option value=' . $f["sec_no"] . '>' . $f["sec_name"] . '</option>';
            }
            echo '
                 </select>
                 <label >teatcher Name:</label>
                 <select name="teatcher_no" id="">
                 <option value="">Select teatcher</option>';
            $r = mysqli_query($con, "select t_no, t_name from teatcher");
            while ($f = mysqli_fetch_array($r)) {

                echo '<option value=' . $f["t_no"] . '>' . $f["t_name"] . '</option>';
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
            
            <label >Term:</label>
            <select name="term" id="">
            <option value="">Select term</option>
            <option value="Term 1">Term 1</option>
            <option value="Term 2">Term 2</option>
            <option value="Term 3">Term 3</option>
            </select> 
    
            <input class="submit_button" type="submit" name="sub" value="save">
    
        </form> <br>
        ';
        }
    } ?>
</body>

</html>