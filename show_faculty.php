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
		<a  href="course.php"><i class="fa-solid fa-book-open-reader"></i>&nbsp;Course&nbsp;&nbsp;</a>
		<a style="color: orange; href="Questions.php"><i class="fa-solid fa-clipboard-question"></i>&nbsp;Questions&nbsp;&nbsp;</a>
		<a  href="student_exams.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;exams</a>
		</nav>';

	if (isset($_GET["delete"])) {

		$sql = mysqli_query($con, "delete from faculty where f_no=" . $_GET["delete"]);
		// $sql = mysqli_query($con, "delete from exam where Sid=" . $_GET["d"]);
		// $sql = mysqli_query($con, "delete from s_a where Sid=" . $_GET["d"]);

	}
	$sql = mysqli_query($con, "select * from faculty");
    

	echo '<fieldset id="fieldtable" ><legend>faculty</legend> <table id="idtable2" >

	<div style="text-align: right;"><a href="add_update_faculty.php?add=add"  class="button_add">Add faculty</a></div><br>
		<tr>
		<th align=center>numper</th>
		<th align=center>Name</th>
		<th align=center>date created</th>	
		<th align=center>Delete</th>
		<th align=center>update</th>

		</tr>';
	$i = 1;
	while ($f = mysqli_fetch_array($sql)) {
		echo '<tr>';
		echo '<td align=center>' . $i . '</td>';
		echo '<td align=center>' . $f["f_name"] . '</td>';
		echo '<td align=center>' . $f["f_date"] . '</td>';
		echo '<td align=center><a id="edetingancor" href=show_faculty.php?delete=' . $f["f_no"] . '>Delete&nbsp;<i class="fa-solid fa-file-circle-minus"></i></a></td>';
		echo '<td align=center><a id="edetingancor" href=add_update_faculty.php?update=' . $f["f_no"] . '>update&nbsp;<i class="fa-solid fa-file-circle-minus"></i></a></td>';

		echo '</tr>';
		$i += 1;
	}
	echo '</table></fieldset>';






	?>


</body>

</html>