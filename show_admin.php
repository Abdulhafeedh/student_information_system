<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_style/style.css">
    <script src="css_style/all.min.js"></script>
	<link rel="stylesheet" href="css_style/style.css">
	<title>Admin</title>
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
		<a  href="show_exam.php"><i id="icon_id" class="' . $exams . '"></i>Exams</a>
		<a  style="color: orange; href="show_admin.php"><i id="icon_id" class="' . $admins . '"></i>Admins</a>
		</nav>
    ';

	if (isset($_GET["admin_id"])) {

		$sql = mysqli_query($con, "delete from admin where admin_id=" . $_GET["admin_id"]);
		// $sql = mysqli_query($con, "delete from exam where Sid=" . $_GET["d"]);
		// $sql = mysqli_query($con, "delete from s_a where Sid=" . $_GET["d"]);
	}
	$sql = mysqli_query($con, "select * from admin");

	echo '<fieldset id="fieldtable" ><legend>Admins</legend>
		<div style="text-align: right;"><a href="add_update_admin.php?add=add"  class="button_add">Add Admin</a></div><br>
	<table id="idtable2" >
		<tr>
		<th align=center>Number</th>
		<th align=center>Nmae</th>
		<th align=center>Email</th>
	    <!--<th align=center>Password</th>-->
		<th align=center>Phone Number</th>
		<th align=center>Delete</th>
		</tr>';
	$i = 1;
	while ($f = mysqli_fetch_array($sql)) {
		echo '<tr>';
		echo '<td align=center>' . $i . '</td>';
		echo '<td align=center>' . $f["admin_name"] . '</td>';
		echo '<td align=center>' . $f["admin_email"] . '</td>';
		// echo '<td align=center>' . $f["admin_password"] . '</td>';
		echo '<td align=center>' . $f["admin_phone_number"] . '</td>';
		echo '<td align=center><a id="edetingancor" href=i.php?admin_id=' . $f["admin_id"] . '><i class="fa-solid fa-trash"></i>&nbsp;Delete</a></td>';
		echo '</tr>';
		$i += 1;
	}
	echo '</table><br></fieldset>';






	?>


</body>

</html>