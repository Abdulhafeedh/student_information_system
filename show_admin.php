<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../fontawesome-free-6.1.1-web/css/all.min.css">
	<link rel="stylesheet" href="style.css">
	<title>Admin</title>
</head>

<body>

	<?PHP
	include "header.php";
	include "connect.php";
	echo '<nav id="nav_id">
		<br>
		<a " href="index.php"><i class="fa-solid fa-house"></i>&nbsp;Home&nbsp;&nbsp;</a>
		<a  href="show_student.php"><i class="fa-solid fa-book-open-reader"></i>&nbsp;Students&nbsp;&nbsp;</a>
		<a  href="show_teatcher.php"><i class="fa-solid fa-clipboard-question"></i>&nbsp;Teatchers&nbsp;&nbsp;</a>
		<a  href="show_section.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;sections</a>
        <a  href="show_faculty.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Faculty</a>
        <a  href="show_course.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Courses</a>
		<a  href="show_exam.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Exams</a>
        <a  style="color: orange; href="show_admin.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Admins</a>
		</nav>';

	if (isset($_GET["admin_id"])) {

		$sql = mysqli_query($con, "delete from admin where admin_id=" . $_GET["admin_id"]);
		// $sql = mysqli_query($con, "delete from exam where Sid=" . $_GET["d"]);
		// $sql = mysqli_query($con, "delete from s_a where Sid=" . $_GET["d"]);
	}
	$sql = mysqli_query($con, "select * from admin");

	echo '<fieldset id="fieldtable" ><legend>Students</legend>
		<div style="text-align: right;"><a href="add_update_admin.php?add=add"  class="button_add">Add Admin</a></div><br>
	<table id="idtable2" >
		<tr>
		<th align=center>Id</th>
		<th align=center>Nmae</th>
		<th align=center>email</th>
	    <!--<th align=center>password</th>-->
		<th align=center>phone number</th>
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
		echo '<td align=center><a id="edetingancor" href=i.php?admin_id=' . $f["admin_id"] . '>Delete&nbsp;<i class="fa-solid fa-file-circle-minus"></i></a></td>';
		echo '</tr>';
		$i += 1;
	}
	echo '</table><br></fieldset>';






	?>


</body>

</html>