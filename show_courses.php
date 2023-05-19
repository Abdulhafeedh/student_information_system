<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_style/style.css">
    <script src="css_style/all.min.js"></script>
    <link rel="stylesheet" href="css_style/style.css">
    <title>Courses</title>
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
		<a  style="color: orange; href="show_courses.php"><i id="icon_id" class="' . $courses . '"></i>Courses</a>
		<a  href="show_exam.php"><i id="icon_id" class="' . $exams . '"></i>Exams</a>
		<a  href="show_admin.php"><i id="icon_id" class="' . $admins . '"></i>Admins</a>
		</nav>
    ';

    if (isset($_GET["delete"])) {

        $sql = mysqli_query($con, "delete from courses where cour_no=" . $_GET["delete"]);
    }
    $sql = mysqli_query($con, "select courses.cour_no ,courses.cour_name,teatcher.t_name,section.sec_name ,courses.cour_level,courses.cour_term FROM courses JOIN section ON courses.sec_no = section.sec_no JOIN teatcher ON courses.t_no = teatcher.t_no
    ");

    echo '<fieldset id="fieldtable" ><legend> Courses</legend>
		<div style="text-align: right;"><a href="add_update_courses.php?add=add"  class="button_add">Add Course</a></div><br>
	<table id="idtable2" >
		<tr>
		<th align=center>Number</th>
		<th align=center>Course Name</th>
		<th align=center>Teatcher Name</th>
	    <th align=center>Section Name</th>
		<th align=center>Level</th>
	    <th align=center>Term</th>
		
		<th align=center>Delete</th>
        <th align=center>Update</th>
		</tr>';
    $i = 1;
    while ($f = mysqli_fetch_array($sql)) {
        echo '<tr>';
        echo '<td align=center>' . $i . '</td>';
        echo '<td align=center>' . $f["cour_name"] . '</td>';
        echo '<td align=center>' . $f["t_name"] . '</td>';
        echo '<td align=center>' . $f["sec_name"] . '</td>';
        echo '<td align=center>' . $f["cour_level"] . '</td>';
        echo '<td align=center>' . $f["cour_term"] . '</td>';
      
        echo '<td align=center><a id="edetingancor" href=show_courses.php?delete=' . $f["cour_no"] . '><i class="fa-solid fa-trash"></i>&nbsp;Delete</a></td>';
        echo '<td align=center><a id="edetingancor" href=add_update_courses.php?update=' . $f["cour_no"] . '><i class="fa-solid fa-pen-to-square"></i>&nbsp;Update</a></td>';

        echo '</tr>';
        $i += 1;
    }
    echo '</table><br></fieldset>';






    ?>


</body>

</html>