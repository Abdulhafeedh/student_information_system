<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css_style/all.min.css">
    <link rel="stylesheet" href="css_style/style.css">
    <script src="css_style/all.min.js"></script>
</head>

<body>
    <?php
    include "header.php";
    include "connect.php";
    echo '
        <nav id="nav_id">
		<br>
		<a  style="color: orange; href="home.php"><i id="icon_id" class="' . $home . '"></i>Home</a>
		<a  href="show_student.php"><i id="icon_id" class="' . $student . '"></i>Students</a>
		<a  href="show_teatcher.php"><i id="icon_id" class="' . $teatchers . '"></i>Teatchers</a>
		<a  href="show_section.php"><i id="icon_id" class="' . $sections . '"></i>Sections</a>
        <a  href="show_faculty.php"><i id="icon_id" class="' . $faculty . '"></i>Faculty</a>
        <a  href="show_courses.php"><i id="icon_id" class="' . $courses . '"></i>Courses</a>
		<a  href="show_exam.php"><i id="icon_id" class="' . $exams . '"></i>Exams</a>
        <a  href="show_admin.php"><i id="icon_id" class="' . $admins . '"></i>Admins</a>
		</nav>
    ';
    ?>

    <br>
    <div style="display: flex;">
        <a href="show_student.php" class="move">
            <div class="cart">
                <img src="images/students.jpg" alt="No Image">
                <div class="cart-details">
                    <h3 class="cart-title">Students</h3>
                    <p class="cart-description"><?php echo mysqli_fetch_assoc(mysqli_query($con, "select count(s_no) AS total_students FROM students"))["total_students"]; ?> </p>
                </div>
            </div>
        </a>
        <br>
        <a href="show_teatcher.php" class="move">
            <div class="cart">
                <img src="images/teatcher.jpg" alt="Product Image">
                <div class="cart-details">
                    <h3 class="cart-title">Teatchers</h3>
                    <p class="cart-description"> <?php echo mysqli_fetch_assoc(mysqli_query($con, "select count(t_no) AS total_tratchers from teatcher"))["total_tratchers"]; ?> </p>
                </div>
            </div>
        </a>
        <br>
        <a href="show_section.php" class="move">
            <div class="cart">
                <img src="images/section.jpg" alt="Product Image">
                <div class="cart-details">
                    <h3 class="cart-title">Sections</h3>
                    <p class="cart-description"><?php echo mysqli_fetch_assoc(mysqli_query($con, "select count(sec_no) AS total_sections from section"))["total_sections"]; ?> </p>
                </div>
            </div>
        </a>

    </div>



    <br>
    <div style="display: flex;">
        <a href="show_faculty.php" class="move">
            <div class="cart">
                <img src="images/faculty.jpg" alt="Product Image">
                <div class="cart-details">
                    <h3 class="cart-title">Facultys</h3>
                    <p class="cart-description"><?php echo mysqli_fetch_assoc(mysqli_query($con, "select count(f_no) AS total_facultys from faculty"))["total_facultys"]; ?> </p>
                </div>
            </div>
        </a>
        <br>
        <a href="show_courses.php" class="move">
            <div class="cart">
                <img src="images/cours.jpg" alt="Product Image">
                <div class="cart-details">
                    <h3 class="cart-title">Courses</h3>
                    <p class="cart-description"><?php echo mysqli_fetch_assoc(mysqli_query($con, "select count(cour_no) AS total_courses from courses"))["total_courses"]; ?> </p>
                </div>
            </div>
        </a>

    </div>
</body>

</html>