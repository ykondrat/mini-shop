<?php
/**
 * Created by PhpStorm.
 * User: ykondrat
 * Date: 5/1/17
 * Time: 3:43 PM
 */
    if (!isset($_GET['page']) || $_GET['page'] == "home") {
        $page = "application/views/home.html";
    }
    if ($_GET['page'] == "contact") {
        $page = "application/views/contact.html";
    }
    if ($_GET['page'] == "login") {
        $page = "application/authorization/login.php";
    }
    if ($_GET['page'] == "create") {
        $page = "application/authorization/create.php";
    }
    if ($_GET['page'] == "modif") {
        $page = "application/authorization/modif.php";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="author" content="ykondrat" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href='https://signin.intra.42.fr/assets/42_logo_black-684989d43d629b3c0ff6fd7e1157ee04db9bb7a73fba8ec4e01543d650a1c607.png' rel='icon' type='image/svg' />
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/contact.css">
    <title>UNIT 42</title>
</head>
<body>
    <header>
        <nav>
            <ul class="topmenu">
                <li><a href="index.php?page=home">Home</a></li>
                <li><a href="">Basket</a></li>
                <li><a href="" class="down">Category</a>
                    <ul class="submenu down_down">
                        <li><a href="">iPhone</a>
                            <ul class="botmenu">
                                <li><a href="">4s</a></li>
                                <li><a href="">5s</a></li>
                                <li><a href="">6s</a></li>
                            </ul>
                        </li>
                        <li><a href="">iPad</a></li>
                        <li><a href="">iMac</a></li>
                        <li><a href="">All</a></li>
                    </ul>
                </li>
                <li><a href="index.php?page=login">Login</a></li>
                <li><a href="index.php?page=contact">Contact</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <?php include $page; ?>
    </div>
    <footer>
        <hr />
        <p>
            &copy; ykondrat 2017
        </p>
    </footer>
</body>
</html>