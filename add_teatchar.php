<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="s.css">
</head>

<body>
	<?php 
    include "connect.php";
    include "header.php";

echo '<nav id="nav_id">
		<br>
		<a style="color: orange;" href="index.php"><i class="fa-solid fa-house"></i>&nbsp;Home&nbsp;&nbsp;</a>
		<a  href="course.php"><i class="fa-solid fa-book-open-reader"></i>&nbsp;Course&nbsp;&nbsp;</a>
		<a  href="Questions.php"><i class="fa-solid fa-clipboard-question"></i>&nbsp;Questions&nbsp;&nbsp;</a>
		<a  href="student_exams.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;exams</a>
		</nav>'
	;?>


	<!-- <div class="bg-image"></div> -->
	<form> <!-- Header -->
		<div class="head">
			<h1>Add Teatcher</h1>
		</div> <!-- /Header -->

		<!-- Main Form Started -->
		<label for="fullName">Name:</label>
		<input type="text" placeholder="Full Name" name="fullName" id="fullName">

		<label for="phone">phone Numper:</label>
		<input type="text" placeholder="phone Numper" name="phone" id="phone" required>

		<label for="sddress">Address:</label>
		<input type="text" placeholder="address" name="address" id="address" required>

		<label for="salary">salary:</label>
		<input type="text" placeholder="salary" name="salary" id="salary" required>

		<!-- Submit Button -->
		<button>Submit</button>

	</form>
	<!-- /Main Form Ended -->

</body>

</html>