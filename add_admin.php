<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="s.css">
    <link rel="stylesheet" href="style.css">
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
    <br><br>
    <!-- <div class="bg-image"></div> -->
    <form> <!-- Header -->
        <div class="head">
            <h1>Contact Form</h1>
            <p>Please fill all the texts in the fields</p>
        </div> <!-- /Header -->

        <!-- Main Form Started -->
        <label for="fullName">Your Name:</label>
        <input type="text" placeholder="Full Name" name="fullName" id="fullName">

        <label for="email">Your Email:</label>
        <input type="email" placeholder="abcd@xyz.com" name="email" id="email" required>

        <label for="subject">Subject:</label>
        <input type="subject" placeholder="Job Enquiry" name="text" id="subject" required>

        <label for="message">Message:</label>
        <textarea placeholder="Your Message Here" name="message" id="message" required></textarea>

        <!-- Submit Button -->
        <button>Submit</button>

    </form>
    <!-- /Main Form Ended -->
</body>

</html>