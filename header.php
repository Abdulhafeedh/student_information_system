<header>

    <!-- <span><i class="fa-solid fa-user-gear"></i>Student Information System</span> -->
    <span><i><img src="images/logo.png" alt="No Image"></i>Student Information System</span>
    <?php
    $home = "fa-solid fa-house";
    $student = "fa-solid fa-user-graduate";
    $teatchers = "fa-solid fa-person-chalkboard";
    $sections = "fa-regular fa-building";
    $faculty  = "fa-solid fa-tree-city";
    $courses  = "fa-solid fa-book";
    $exams  = "fa-solid fa-list-check";
    $admins  = "fa-solid fa-user-gear";
    session_start();
    echo '<a id="wel" href="add_update_admin.php?update=update " ><i class="fa-solid fa-user-gear"></i> ' . $_SESSION['email'] . ' </a>' ?>

    <!-- <a id="wel" onclick="aboutus()" style="cursor: pointer;"><i class="fa-solid fa-circle-info"></i> About us</a>' -->
    <a id="user" href="index.php"><i class="fa-solid fa-arrow-up-right-from-square"></i>&nbsp;Logout</a>

</header>