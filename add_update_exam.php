<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exams</title>
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
            $date=date('Y-m-d',strtotime( $_POST["exam_date"]));
            $r = mysqli_query($con, "insert into exam(s_no , cour_no , e_date, e_degree, s_degree) values (" . $_POST["student_name"] . "," . $_POST["course_name"] . ", '" . $date .
                "', '" . $_POST["exam_degree"] . "', '" . $_POST["student_degree"] . "')");
            echo '<h2 style=" text-align: center ; background-color: rgba(211, 219, 211, 0.384);color: green;" >Add done</h2>';
            echo '<meta http-equiv="refresh" content="2; url=show_exam.php">';
        }
        echo '
    
    <br><br>
    <form method=post> 
    
        <div class="head">
        <h1>Add Exam Information</h1>
        </div>

        <label>Student Name:</label>
        <select name="student_name" id="">
        <option value="">Select Student Name</option>
       
        ';
        $r = mysqli_query($con, "select s_no, s_name from students");
        while ($f = mysqli_fetch_array($r)) {

            echo '<option value=' . $f["s_no"] . '>' . $f["s_name"] . '</option>';
        }

        echo '
        </select>

        <label>Course Name:</label>
        <select name="course_name" id="">
        <option value="">Select Course Name</option>

        ';
        $r = mysqli_query($con, "select cour_no, cour_name from courses");
        while ($f = mysqli_fetch_array($r)) {

            echo '<option value=' . $f["cour_no"] . '>' . $f["cour_name"] . '</option>';
        }

        echo '
        </select>

        <label >Exam Date:</label>
        <input type="date" placeholder="Exam Date" name="exam_date" required>

        <label>Exam Degree:</label>
        <input type="text" placeholder="Exam Degree" name="exam_degree">

        <label>Student Degree:</label>
        <input type="text" placeholder="Student Degree" name="student_degree" required>


        <input class="submit_button" type="submit" name="sub" value="save">

    </form> <br>';
    }
    if (isset($_GET["update"])) {
        if (isset($_POST['sub'])) {
            $date=date('Y-m-d',strtotime( $_POST["exam_date"]));
            $r = mysqli_query($con, "update exam set s_no=" .  $_POST["student_name"] . ",cour_no=" .
                $_POST["course_name"] . " , e_date='" . $date . "',  e_degree=" .  $_POST["exam_degree"] . ",
            s_degree=" . $_POST["student_degree"] . " where e_no=" . $_GET["update"]);

            echo '<h2 style=" text-align: center ; background-color: rgba(211, 219, 211, 0.384);color: green;" >Update done</h2>';

            echo '<meta http-equiv="refresh" content="2; url=show_exam.php">';
        }

        $r = mysqli_query($con, "select exam.e_no, students.s_name,
         courses.cour_name,exam.e_date,exam.e_degree,exam.s_degree FROM exam JOIN students 
         ON exam.s_no = students.s_no  JOIN courses  ON   exam.cour_no = courses.cour_no
        where exam.e_no=" . $_GET["update"]);
    ?>

        <br><br>
        <form method=post>
            <div class="head">
                <h1>Update Exam Information</h1>
            </div>
        <?php
        while ($ff = mysqli_fetch_array($r)) {
            echo '
    
            <label>Student Name:</label>
        <select name="student_name" id="">
        <option value="">Select Student Name</option>
       
        ';
            $r = mysqli_query($con, "select s_no, s_name from students");
            while ($f = mysqli_fetch_array($r)) {

                echo '<option value=' . $f["s_no"] . '>' . $f["s_name"] . '</option>';
            }

            echo '
        </select>

        <label>Course Name:</label>
        <select name="course_name" id="">
        <option value="">Select Course Name</option>

        ';
            $r = mysqli_query($con, "select cour_no, cour_name from courses");
            while ($f = mysqli_fetch_array($r)) {

                echo '<option value=' . $f["cour_no"] . '>' . $f["cour_name"] . '</option>';
            }

            echo '
        </select>

        <label >Exam Date:</label>
        <input type="date" placeholder="Exam Date" name="exam_date" value=' . $ff["e_date"] . '>

        <label>Exam Degree:</label>
        <input type="text" placeholder="Exam Degree" name="exam_degree" value=' . $ff["e_degree"] . '>

        <label>Student Degree:</label>
        <input type="text" placeholder="Student Degree" name="student_degree" value=' . $ff["s_degree"] . '>


            <input class="submit_button" type="submit" name="sub" value="save" >
    
        </form> <br>
        ';
        }
    } ?>

</body>

</html>