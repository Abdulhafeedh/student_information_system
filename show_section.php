<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_style/style.css">
    <script src="css_style/all.min.js"></script>
	<link rel="stylesheet" href="css_style/style.css">
	<title>Sections</title>
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
		<a  style="color: orange; href="show_section.php"><i id="icon_id" class="' . $sections . '"></i>Sections</a>
		<a  href="show_faculty.php"><i id="icon_id" class="' . $faculty . '"></i>Faculty</a>
		<a  href="show_courses.php"><i id="icon_id" class="' . $courses . '"></i>Courses</a>
		<a  href="show_exam.php"><i id="icon_id" class="' . $exams . '"></i>Exams</a>
		<a  href="show_admin.php"><i id="icon_id" class="' . $admins . '"></i>Admins</a>
		</nav>
    ';

	if (isset($_GET["delete"])) {

		$sql = mysqli_query($con, "delete from section where sec_no=" . $_GET["delete"]);
		// $sql = mysqli_query($con, "delete from exam where Sid=" . $_GET["d"]);
		// $sql = mysqli_query($con, "delete from s_a where Sid=" . $_GET["d"]);

	}
	$sql = mysqli_query($con, "SELECT section.sec_no,section.sec_name,section.sec_date,faculty.f_name from section JOIN faculty ON section.f_no=faculty.f_no
    ");

	echo '<fieldset id="fieldtable" ><legend>section</legend> <table id="idtable2" >

	<div style="text-align: right;"><a href="add_update_section.php?add=add"  class="button_add">Add Section</a></div><br>
		<tr>
		<th align=center>Number</th>
		<th align=center>Section</th>
		<th align=center>Date created</th>
        <th align=center>Faculty</th>	
		<th align=center>Delete</th>
		<th align=center>update</th>

		</tr>';
	$i = 1;
	while ($f = mysqli_fetch_array($sql)) {
		echo '<tr>';
		echo '<td align=center>' . $i . '</td>';
		echo '<td align=center>' . $f["sec_name"] . '</td>';
		echo '<td align=center>' . $f["sec_date"] . '</td>';
		echo '<td align=center>' . $f["f_name"] . '</td>';
		echo '<td align=center><a id="edetingancor" href=show_section.php?delete=' . $f["sec_no"] . '><i class="fa-solid fa-trash"></i>&nbsp;Delete</a></td>';
		echo '<td align=center><a id="edetingancor" href=add_update_section.php?update=' . $f["sec_no"] . '><i class="fa-solid fa-pen-to-square"></i>&nbsp;Update</a></td>';

		echo '</tr>';
		$i += 1;
	}
	echo '</table></fieldset>';






	?>


</body>

</html>