<?php
if (isset($_SESSION['login'])) {

    $name = $_SESSION['fname'];
    ?>

<a class="nav-link active" aria-current="page" href="./profile.php"><span>Profile</span></a>

<?php } else {?>

<a href="./login.php" class="nav-link"><span>Login</span></a>
<?php }?>