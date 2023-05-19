<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_style/style.css">
    <script src="css_style/all.min.js"></script>
    <link rel="stylesheet" href="css_style/style.css">
    <title>Exams</title>
</head>

<body>

    <?PHP
    include "header.php";
    include "connect.php";
    echo '
        <nav id="nav_id">
		<br>
		<a  href="home.php"><i id="icon_id" class="' . $home . '"></i>Home</a>
		<a  href="show_student.php"><i id="icon_id" class="' . $student . '"></i>Students</a>
		<a  href="show_teatcher.php"><i id="icon_id" class="' . $teatchers . '"></i>Teatchers</a>
		<a  href="show_section.php"><i id="icon_id" class="' . $sections . '"></i>Sections</a>
		<a  href="show_faculty.php"><i id="icon_id" class="' . $faculty . '"></i>Faculty</a>
		<a  href="show_courses.php"><i id="icon_id" class="' . $courses . '"></i>Courses</a>
		<a  style="color: orange; href="show_exam.php"><i id="icon_id" class="' . $exams . '"></i>Exams</a>
		<a  href="show_admin.php"><i id="icon_id" class="' . $admins . '"></i>Admins</a>
		</nav>
    ';

    if (isset($_GET["delete"])) {

        $sql = mysqli_query($con, "delete from exam where e_no=" . $_GET["delete"]);
        // $sql = mysqli_query($con, "delete from exam where Sid=" . $_GET["d"]);
        // $sql = mysqli_query($con, "delete from s_a where Sid=" . $_GET["d"]);
    }
    $sql = mysqli_query($con, "select exam.e_no, students.s_name, courses.cour_name,exam.e_date,exam.e_degree,exam.s_degree FROM exam JOIN students ON exam.s_no = students.s_no  JOIN courses  ON   exam.cour_no = courses.cour_no
    ");

    echo '<fieldset id="fieldtable" ><legend>Exams</legend>
		<div style="text-align: right;"><a href="add_update_exam.php?add=add"  class="button_add">Add Exam</a></div><br>
	<table id="idtable2" >
		<tr>
		<th align=center>Number</th>
		<th align=center>Student Name</th>
	    <th align=center>Course Name</th>
		<th align=center>Exam Date</th>
	    <th align=center>Exam Degree</th>
		<th align=center>Student Degree</th>
		<th align=center>Delete</th>
        <th align=center>Update</th>
		</tr>';
    $i = 1;
    while ($f = mysqli_fetch_array($sql)) {
        echo '<tr>';
        echo '<td align=center>' . $i . '</td>';
        echo '<td align=center>' . $f["s_name"] . '</td>';
        echo '<td align=center>' . $f["cour_name"] . '</td>';
        echo '<td align=center>' . $f["e_date"] . '</td>';
        echo '<td align=center>' . $f["e_degree"] . '</td>';
        echo '<td align=center>' . $f["s_degree"] . '</td>';
        echo '<td align=center><a id="edetingancor" href=show_exam.php?delete=' . $f["e_no"] . '><i class="fa-solid fa-trash"></i>&nbsp;Delete</a></td>';
        echo '<td align=center><a id="edetingancor" href=add_update_exam.php?update=' . $f["e_no"] . '><i class="fa-solid fa-pen-to-square"></i>&nbsp;Update</a></td>';

        echo '</tr>';
        $i += 1;
    }
    echo '</table><br></fieldset>';






    ?>


</body>

</html>