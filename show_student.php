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
		<a  style="color: orange; href="show_student.php"><i class="fa-solid fa-book-open-reader"></i>&nbsp;Students&nbsp;&nbsp;</a>
		<a  href="show_teatcher.php"><i class="fa-solid fa-clipboard-question"></i>&nbsp;Teatchers&nbsp;&nbsp;</a>
		<a  href="show_section.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;sections</a>
        <a  href="show_faculty.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Faculty</a>
        <a  href="show_courses.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Courses</a>
		<a  href="show_exam.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Exams</a>
        <a  href="show_admin.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Admins</a>
		</nav>';

    if (isset($_GET["delete"])) {

        $sql = mysqli_query($con, "delete from students where s_no=" . $_GET["delete"]);
    }
    $sql = mysqli_query($con, "select 	students.s_no, students.s_name, students.s_id,students.s_sex,students.s_address,students.s_dob,students.s_phone_number,students.s_nationality,section.sec_name ,students.s_level FROM students JOIN section ON students.sec_no = section.sec_no 
    ");

    echo '<fieldset id="fieldtable" ><legend>Students</legend>
		<div style="text-align: right;"><a href="add_update_student.php?add=add"  class="button_add">Add Admin</a></div><br>
	<table id="idtable2" >
		<tr>
		<th align=center>Number</th>
		<th align=center>Nmae</th>
		<th align=center>Id</th>
	    <th align=center>Sex</th>
		<th align=center>Address</th>
	    <th align=center>DOB</th>
		<th align=center>Phone Number</th>
        <th align=center>nationality</th>
		<th align=center>Section Name</th>
        <th align=center>Level</th>
		<th align=center>Delete</th>
        <th align=center>Update</th>
		</tr>';
    $i = 1;
    while ($f = mysqli_fetch_array($sql)) {
        echo '<tr>';
        echo '<td align=center>' . $i . '</td>';
        echo '<td align=center>' . $f["s_name"] . '</td>';
        echo '<td align=center>' . $f["s_id"] . '</td>';
        echo '<td align=center>' . $f["s_sex"] . '</td>';
        echo '<td align=center>' . $f["s_address"] . '</td>';
        echo '<td align=center>' . $f["s_dob"] . '</td>';
        echo '<td align=center>' . $f["s_phone_number"] . '</td>';
        echo '<td align=center>' . $f["s_nationality"] . '</td>';
        echo '<td align=center>' . $f["sec_name"] . '</td>';
        echo '<td align=center>' . $f["s_level"] . '</td>';
        echo '<td align=center><a id="edetingancor" href=show_student.php?delete=' . $f["s_no"] . '>Delete&nbsp;<i class="fa-solid fa-file-circle-minus"></i></a></td>';
        echo '<td align=center><a id="edetingancor" href=add_update_student.php?update=' . $f["s_no"] . '>Update&nbsp;<i class="fa-solid fa-file-circle-minus"></i></a></td>';

        echo '</tr>';
        $i += 1;
    }
    echo '</table><br></fieldset>';






    ?>


</body>

</html>