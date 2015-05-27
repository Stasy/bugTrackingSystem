<!DOCTYPE html>
<html>
<head lang="en">
        <meta charset="UTF-8">
</head>
<body>
<?php
        session_start();

        include '../baseClasses/UserModel.php';
        include '../../configurations/roboBugConfig.php';
        include 'addRow.php';

        if($_POST['user_pass']=='' || $_POST['user_name']=='')
                exit ("Были заполнены не все поля. Вход не осуществлен ");

        $login = stripslashes($_POST['user_name']);
        $login = htmlspecialchars($_POST['user_name']);
        $login = trim($login);
        $password = stripslashes($_POST['user_pass']);
        $password = htmlspecialchars($_POST['user_pass']);
        $password = trim($password);

        $user = new UserModel();
        $user->setUserProperties($_POST['user_name'], $_POST['user_pass'],"");

        $config = new roboBugConfig();
        $addRow = new addRowClass();
        $connectId = $addRow->dbConnect($config);

        $result = mysql_query("SELECT * FROM $config->usersTableName WHERE user_name='$user->UserName'",$connectId);
        $myrow = mysql_fetch_array($result);
        if (empty($myrow['user_pass']))
                exit ("Извините, введённый вами login или пароль неверный.");
        else {
                if ($myrow['user_pass']==$password) {
                        $_SESSION['login']=$myrow['user_name'];
                        $_SESSION['id']=$myrow['user_id'];

                        header('Location: ../../Static/MainPage.php');
                }
                else
                        exit ("Извините, введённый вами login или пароль неверный.");
        }
?>
</body>
