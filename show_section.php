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
    <a  href="show_teatcher.php"><i class="fa-solid fa-clipboard-question"></i>&nbsp;Teatchers&nbsp;&nbsp;</a>
    <a  style="color: orange; href="show_section.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;sections</a>
    <a  href="show_faculty.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Faculty</a>
    <a  href="show_courses.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Courses</a>
    <a  href="show_exam.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Exams</a>
    <a  href="show_admin.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Admins</a>
    </nav>';

	if (isset($_GET["delete"])) {

		$sql = mysqli_query($con, "delete from section where sec_no=" . $_GET["delete"]);
		// $sql = mysqli_query($con, "delete from exam where Sid=" . $_GET["d"]);
		// $sql = mysqli_query($con, "delete from s_a where Sid=" . $_GET["d"]);

	}
	$sql = mysqli_query($con, "SELECT section.sec_no,section.sec_name,section.sec_date,faculty.f_name from section JOIN faculty ON section.f_no=faculty.f_no
    ");

	echo '<fieldset id="fieldtable" ><legend>section</legend> <table id="idtable2" >

	<div style="text-align: right;"><a href="add_update_section.php?add=add"  class="button_add">Add section</a></div><br>
		<tr>
		<th align=center>numper</th>
		<th align=center>section</th>
		<th align=center>date created</th>
        <th align=center>faculty</th>	
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
		echo '<td align=center><a id="edetingancor" href=show_section.php?delete=' . $f["sec_no"] . '>Delete&nbsp;<i class="fa-solid fa-file-circle-minus"></i></a></td>';
		echo '<td align=center><a id="edetingancor" href=add_update_section.php?update=' . $f["sec_no"] . '>update&nbsp;<i class="fa-solid fa-file-circle-minus"></i></a></td>';

		echo '</tr>';
		$i += 1;
	}
	echo '</table></fieldset>';






	?>


</body>

</html>