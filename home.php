<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include "header.php";
    include "connect.php";
    echo '
        <nav id="nav_id">
		<br>
		<a  style="color: orange; href="index.php"><i class="fa-solid fa-house"></i>&nbsp;Home&nbsp;&nbsp;</a>
		<a  href="show_student.php"><i class="fa-solid fa-book-open-reader"></i>&nbsp;Students&nbsp;&nbsp;</a>
		<a  href="show_teatcher.php"><i class="fa-solid fa-clipboard-question"></i>&nbsp;Teatchers&nbsp;&nbsp;</a>
		<a  href="show_section.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;sections</a>
        <a  href="show_faculty.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Faculty</a>
        <a  href="show_courses.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Courses</a>
		<a  href="show_exam.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Exams</a>
        <a  href="show_admin.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;Admins</a>
		</nav>
    ';
    ?>
        <!-- <?php echo mysqli_fetch_assoc(mysqli_query($con, "select count(s_no) AS total_students FROM students"))["total_students"]; ?>    -->

    <br>
    <div style="display: flex;">
        <div class="cart">
            <img src="images/students.jpg" alt="No Image">
            <div class="cart-details">
                <h3 class="cart-title">Students</h3>
                <p class="cart-description"><?php echo mysqli_fetch_assoc(mysqli_query($con, "select count(s_no) AS total_students FROM students"))["total_students"]; ?> </p>
            </div>
        </div>
        <br>
        <div class="cart">
            <img src="images/teatcher.jpg" alt="Product Image">
            <div class="cart-details">
                <h3 class="cart-title">Teatchers</h3>
                <p class="cart-description">   <?php echo mysqli_fetch_assoc(mysqli_query($con, "select count(t_no) AS total_tratchers from teatcher"))["total_tratchers"]; ?>  </p>
            </div>
        </div>
        <br>
        <div class="cart">
            <img src="images/section.jpg" alt="Product Image">
            <div class="cart-details">
                <h3 class="cart-title">Sections</h3>
                <p class="cart-description"><?php echo mysqli_fetch_assoc(mysqli_query($con, "select count(sec_no) AS total_sections from section"))["total_sections"]; ?> </p>
            </div>
        </div>

    </div>



    <br>
    <div style="display: flex;">
        <div class="cart">
            <img src="images/faculty.jpg" alt="Product Image">
            <div class="cart-details">
                <h3 class="cart-title">Facultys</h3>
                <p class="cart-description"><?php echo mysqli_fetch_assoc(mysqli_query($con, "select count(f_no) AS total_facultys from faculty"))["total_facultys"]; ?> </p>
            </div>
        </div>
        <br>
        <div class="cart">
            <img src="images/cours.jpg" alt="Product Image">
            <div class="cart-details">
                <h3 class="cart-title">Courses</h3>
                <p class="cart-description"><?php echo mysqli_fetch_assoc(mysqli_query($con, "select count(cour_no) AS total_courses from courses"))["total_courses"]; ?> </p>
            </div>
        </div>

    </div>
</body>

</html>