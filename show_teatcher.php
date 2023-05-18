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
	<a " href="home.php"><i class="fa-solid fa-house"></i>&nbsp;Home&nbsp;&nbsp;</a>
	<a  href="show_student.php"><i class="fa-solid fa-book-open-reader"></i>&nbsp;Students&nbsp;&nbsp;</a>
	<a  style="color: orange; href="show_teatcher.php"><i class="fa-solid fa-clipboard-question"></i>&nbsp;Teatchers&nbsp;&nbsp;</a>
	<a  href="show_section.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;sections</a>
	<a  href="show_faculty.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Faculty</a>
	<a  href="show_courses.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Courses</a>
	<a  href="show_exam.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Exams</a>
	<a  href="show_admin.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Admins</a>
	</nav>';

	if (isset($_GET["delete"])) {

		$sql = mysqli_query($con, "delete from teatcher where t_no=" . $_GET["t_no"]);
		// $sql = mysqli_query($con, "delete from exam where Sid=" . $_GET["d"]);
		// $sql = mysqli_query($con, "delete from s_a where Sid=" . $_GET["d"]);

	}
	$sql = mysqli_query($con, "select * from teatcher");

	echo '<fieldset id="fieldtable" ><legend>teatchers</legend> <table id="idtable2" >

	<div style="text-align: right;"><a href="add_update_teatcher.php?add=add"  class="button_add">Add teatcher</a></div><br>
		<tr>
		<th align=center>number</th>
		<th align=center>Name</th>
		<th align=center>phone Number</th>	
		<th align=center>address</th>
		<th align=center>salary</th>
		<th align=center>Delete</th>
		<th align=center>update</th>

		</tr>';
	$i = 1;
	while ($f = mysqli_fetch_array($sql)) {
		echo '<tr>';
		echo '<td align=center>' . $i . '</td>';
		echo '<td align=center>' . $f["t_name"] . '</td>';
		echo '<td align=center>' . $f["t_phone_number"] . '</td>';
		echo '<td align=center>' . $f["t_address"] . '</td>';
		echo '<td align=center>' . $f["t_salary"] . '</td>';
		echo '<td align=center><a id="edetingancor" href=show_teatcher.php?delete=' . $f["t_no"] . '>Delete&nbsp;<i class="fa-solid fa-file-circle-minus"></i></a></td>';
		echo '<td align=center><a id="edetingancor" href=add_update_teatcher.php?update=' . $f["t_no"] . '>update&nbsp;<i class="fa-solid fa-file-circle-minus"></i></a></td>';

		echo '</tr>';
		$i += 1;
	}
	echo '</table></fieldset>';






	?>


</body>

</html>