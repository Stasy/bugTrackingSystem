<!DOCTYPE html>
<html>
<head lang="en">
        <meta charset="UTF-8">
</head>
<body>
<?php
        include '../baseClasses/UserModel.php';
        include '../../configurations/roboBugConfig.php';
        include 'addRow.php';

        session_start();

        if($_POST['user_pass']!=$_POST['user_pass2'] || $_POST['user_pass']=='' || $_POST['user_name']=='')
                exit ("Строка в поле 'Подтверждение пароля' не совпадает со строкой в поле 'Пароль', либо были заполнены не все поля. Регистрация не была осуществлена. ");

        $login = stripslashes($_POST['user_name']);
        $login = htmlspecialchars($_POST['user_name']);
        $login = trim($login);
        $password = stripslashes($_POST['user_pass']);
        $password = htmlspecialchars($_POST['user_pass']);
        $password = trim($password);

        $user = new UserModel();
        $user->setUserProperties($_POST['user_name'], $_POST['user_pass'],"");

        $config = new roboBugConfig();
        $script = "INSERT INTO $config->usersTableName (user_name, user_pass, projects) values('$user->UserName', '$user->Password', '$user->ProjectsNames')";

        $addRow = new addRowClass();
        $connectId = $addRow->dbConnect($config);

        // проверка на существование пользователя с таким же логином
        $result = mysql_query("SELECT user_id FROM $config->usersTableName WHERE user_name='$user->UserName'");
        $myrow = mysql_fetch_array($result);
        if (!empty($myrow['user_id'])) {
                    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");}

        $addRow->addRow($config, $script);

        $_SESSION['login']=$user->UserName;
        header('Location: ../../Static/MainPage.php');
?>
</body>