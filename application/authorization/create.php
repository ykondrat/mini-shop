<?php
error_reporting(-1);
ini_set('display_errors','on');

    function validationData($login, $passwd, $confPasswd) {
        if (strlen($login) < 8 || strlen($login) > 16) {
            echo "login must be from 8 to 16 characters";
            return (FALSE);
        }
        if ($passwd != $confPasswd) {
            echo "Incorrect password";
            return (FALSE);
        }
        if (strlen($passwd) < 8 || strlen($passwd) > 24) {
            echo "Password must be from 8 to 24 characters";
            return (FALSE);
        }
        return (TRUE);
    }

    if (@$_POST['submit'] === "Sign In") {
        if (validationData($_POST['login'], $_POST['passwd'], $_POST['conf_passwd'])) {
            try {
                $pdo = new PDO('mysql:host=localhost;dbname=', 'root', 'sarkazm1312');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection error :". $e->getMessage();
                exit();
            }

            $pdo->query('CREATE DATABASE IF NOT EXISTS rush00');
            $pdo = new PDO('mysql:host=localhost;dbname=rush00', 'root', 'sarkazm1312');

            $login = $_POST['login'];
            $email = $_POST['email'];
            $passwd = hash('whirlpool', $_POST['passwd']);

            $queryTable = "CREATE TABLE IF NOT EXISTS `users` (id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL, login VARCHAR(16) NOT NULL, email VARCHAR(60) NOT NULL, password VARCHAR(500))";
            try {
                $pdo->query($queryTable);
            } catch (PDOException $e) {
                echo "Error: Can't CREATE TABLE - ".$e->getMessage();
                exit();
            }

            $logQuery = $pdo->prepare("SELECT * FROM `users` WHERE login = '$login'");
            $emailQuery = $pdo->prepare("SELECT * FROM `users` WHERE email = '$email'");

            $logQuery->execute();
            $resLogQuery = $logQuery->fetchAll();

            $emailQuery->execute();
            $resEmailQuery = $emailQuery->fetchAll();

            if ($resLogQuery == NULL && $resEmailQuery == NULL) {
                $queryInsert = $pdo->prepare("INSERT INTO `users` (login, email, password) VALUES (?, ?, ?)");
                $resInsertQuery = $queryInsert->execute([$login, $email, $passwd]);
            } else {
                echo "Login or email is already in use";
            }

        }
    }
?>
<div class="form">
    <form method="POST" action="">
        <fieldset>
            <legend>Create account</legend>
            <input type="text" name="login" placeholder="Login" />
            <input type="email" name="email" placeholder="E-mail" />
            <input type="password" name="passwd" placeholder="Password" />
            <input type="password" name="conf_passwd" placeholder="Confirm Password" />
        </fieldset>
        <input type="submit" name="submit" value="Sign In" />
    </form>
</div>
