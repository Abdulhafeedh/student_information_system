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
    <a  style="color: orange; href="show_courses.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Courses</a>
    <a  href="show_exam.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Exams</a>
    <a  href="show_admin.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Admins</a>
    </nav>';

    if (isset($_GET["delete"])) {

        $sql = mysqli_query($con, "delete from courses where cour_no=" . $_GET["delete"]);
    }
    $sql = mysqli_query($con, "select courses.cour_no ,courses.cour_name,teatcher.t_name,section.sec_name ,courses.cour_level,courses.cour_term FROM courses JOIN section ON courses.sec_no = section.sec_no JOIN teatcher ON courses.t_no = teatcher.t_no
    ");

    echo '<fieldset id="fieldtable" ><legend> Courses</legend>
		<div style="text-align: right;"><a href="add_update_courses.php?add=add"  class="button_add">Add course</a></div><br>
	<table id="idtable2" >
		<tr>
		<th align=center>Number</th>
		<th align=center>course Name</th>
		<th align=center>teatcher Name</th>
	    <th align=center>section Name</th>
		<th align=center>level</th>
	    <th align=center>term</th>
		
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
      
        echo '<td align=center><a id="edetingancor" href=show_courses.php?delete=' . $f["cour_no"] . '>Delete&nbsp;<i class="fa-solid fa-file-circle-minus"></i></a></td>';
        echo '<td align=center><a id="edetingancor" href=add_update_courses.php?update=' . $f["cour_no"] . '>Update&nbsp;<i class="fa-solid fa-file-circle-minus"></i></a></td>';

        echo '</tr>';
        $i += 1;
    }
    echo '</table><br></fieldset>';






    ?>


</body>

</html>