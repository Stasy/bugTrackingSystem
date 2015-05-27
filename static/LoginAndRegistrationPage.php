<?php
    session_start();

    //Затираем сессию при входе на страницу
    $_SESSION['login']='';
    $_SESSION['currentProject']='';
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" href="../Styles/mainStyles.css" rel="stylesheet">
    <link type="text/css" href="../Styles/headerStyles.css" rel="stylesheet">
    <link type="text/css" href="../Styles/loginAndRegistrationPageStyles.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <script type="text/javascript" src="../Scripts/mainScripts.js"></script>
    <script type="text/javascript" src="../Scripts/dropdownScripts.js"></script>
    <title>RoboBug</title>
</head>
<body>
<div class="headerWrapper">
    <div class="topLine"></div>
    <div class="globalHeader">
        <div class="globalHeaderLeft">

            <!--<div class="dropdownRatingWrapper">
                <label class="tableFiltersDropdown" for="projectName">
                    <a id="projectName" class="simpleBlackText simpleDropDown" href="#" onclick="changerNew('dropdownRating4ID')" onblur="closingClickNew()">
                        projectName&nbsp;&#9661;
                    </a>
                </label>
                <div id="dropdownRating4ID" class="dropdownRatingULdisplayNone">
                    <ul>
                        <li><a href="#" class="simpleGrayText">project2</a></li>
                        <li><a href="#" class="simpleGrayText">project3</a></li>
                        <li><a href="EditProjectPage.html" class="simpleGrayText">Добавить</a></li>
                    </ul>
                </div>
            </div>

            <a id="editProjectLink" class="simpleBlackText" href="EditProjectPage.html">Редактировать</a>-->
        </div>
        <div class="globalHeaderRight">

            <!--<div class="dropdownRatingWrapper">
                <label class="tableFiltersDropdown" for="userName">
                    <a id="userName" class="simpleBlackText simpleDropDown" href="#" onclick="changerNew('dropdownRating3ID')" onblur="closingClickNew()">
                        userName&nbsp;&#9661;
                    </a>
                </label>
                <div id="dropdownRating3ID" class="dropdownRatingULdisplayNone">
                    <ul>
                        <li><a href="#" class="simpleGrayText">user2</a></li>
                        <li><a href="#" class="simpleGrayText">user3</a></li>
                        <li><a href="LoginAndRegistrationPage.html" class="simpleGrayText">Выйти</a></li>
                    </ul>
                </div>
            </div>-->

        </div>
    </div>
</div>

<div Class="bodyWrapper">
    <div id="logo"></div>
    <div id="systemNameWrapper">
        <p id="systemNameText"><span class="header">RoboBug</span></br><span class="text">Bug tracking system</span></p>
    </div>

    <div class="formsWrapper simpleGrayText">
        <form action="../bugTrackingSystem/handlers/login.php" method="post">
            <div class="login block">
                <div class="loginHeader">
                    <p class="blockHead">Войти</p>
                </div>
                <input type="email" name="user_name" id="loginName" class="greenInput simpleGrayText" placeholder="email:">
                <input type="password" name="user_pass" id="pass" class="greenInput simpleGrayText" placeholder="pass:">
                <input type="submit" id="loginButton" class="greenButton simpleWhiteText textCenter" value="Войти">
            </div>
        </form>

        <form action="../bugTrackingSystem/handlers/saveUser.php" method="post">
            <div class="registration block">
                <div class="registrationHeader">
                    <p class="blockHead">Зарегистрироваться</p>
                </div>
                <input type="email" name="user_name" id="registrationLogin" class="blueInput simpleGrayText" placeholder="email:">
                <input type="password" name="user_pass" id="registrationPass" class="blueInput simpleGrayText" placeholder="pass:">
                <input type="password" name="user_pass2" id="registrationConfirmPass" class="blueInput simpleGrayText" placeholder="confirm pass:">
                <input type="submit" id="registrationButton" class="lightBlueButton simpleWhiteText textCenter" value="Зарегистрироваться">
                <p class="hintText textCenter" id="registrationHint">Дальнейшие инструкции будут отправлены на ваш email</p>
            </div>
        </form>

    </div>
</div>

<div class="footerWrapper"></div>
</body>
</html>