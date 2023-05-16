<?PHP
// include "sweetalert.php";
?>
<header>

    <h1>Student Information System</h1><br>
    <?php
    session_start();
    echo '<a id="wel" href="userinfo.php " ><i class="fa-solid fa-user-gear"></i> Admin</a>' ?>

    <!-- <a id="wel" onclick="aboutus()" style="cursor: pointer;"><i class="fa-solid fa-circle-info"></i> About us</a>' -->
    <a id="user" href="logout.php"><i class="fa-solid fa-arrow-up-right-from-square"></i>&nbsp;Log out</a>

</header>