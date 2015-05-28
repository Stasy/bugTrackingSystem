<?php
include '../bugTrackingSystem/handlers/checks.php';
include '../configurations/roboBugConfig.php';

session_start();
$checks = new checks();
if(!$checks->CheckLogin())
    exit;

$config = new roboBugConfig();
$projects = $checks->CheckProject($config);

//Определяем параметры проекта
if(!empty($_GET['editProject'])){
    $projName = $_GET['editProject'];
    $script= "SELECT * FROM $config->projectsTableName WHERE project_name='$projName'";
    $proj = mysql_fetch_array(mysql_query($script));

    $projectName=$proj['project_name'];
    $users=$proj['users'];
    $comment=$proj['comment'];
} else{
    $projectName="";
    $users="";
    $comment="";
}

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" href="../Styles/mainStyles.css" rel="stylesheet">
    <link type="text/css" href="../Styles/headerStyles.css" rel="stylesheet">
    <link type="text/css" href="../Styles/editProjectPageStyles.css" rel="stylesheet">
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

            <div class="dropdownRatingWrapper">
                <label class="tableFiltersDropdown" for="projectName">
                    <a id="projectName" class="simpleBlackText simpleDropDown" href="#" onclick="changerNew('dropdownRating4ID')" onblur="closingClickNew()">
                        <?php
                        echo $_SESSION['currentProject'].'&nbsp;&#9661;';
                        ?>
                    </a>
                </label>
                <div id="dropdownRating4ID" class="dropdownRatingULdisplayNone">
                    <ul>
                        <?php
                        for($i=0; $i< count($projects);$i=$i+1){
                            echo('<li><a href="#" class="simpleGrayText">'.$projects[$i].'</a></li>');
                        }
                        ?>
                        <li><a href="EditProjectPage.php" class="simpleGrayText">Добавить</a></li>
                    </ul>
                </div>
            </div>

            <?php
            echo '<a id="editProjectLink" class="simpleBlackText" href="EditProjectPage.php?editProject='.$_SESSION['currentProject'].'">Редактировать</a>';
            ?>

        </div>
        <div class="globalHeaderRight">

            <div class="dropdownRatingWrapper">
                <label class="tableFiltersDropdown" for="userName">
                    <a id="userName" class="simpleBlackText simpleDropDown" href="#" onclick="changerNew('dropdownRating3ID')" onblur="closingClickNew()">
                        <?php
                        echo $_SESSION['login'] .'&nbsp;&#9661;';
                        ?>
                    </a>
                </label>
                <div id="dropdownRating3ID" class="dropdownRatingULdisplayNone">
                    <ul>
                        <li><a href="LoginAndRegistrationPage.php" class="simpleGrayText">Выйти</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

<div Class="bodyWrapper">
    <div id="logo" onclick="GoToMainPage()"></div>
    <div id="systemNameWrapper" onclick="GoToMainPage()">
        <p id="systemNameText"><span class="header">RoboBug</span></br><span class="text">Bug tracking system</span></p>
    </div>
    <div id="searchRowWrapper">
        <input type="search" placeholder="Введите текст для поиска" class="blueInput simpleBlackText" id="searchRow">
        <input type="button" value="Искать" class="blueButton simpleWhiteText">
    </div>

    <div class="editPageWrapper">
            <?php
                if(!empty($_GET['editProject'])){
                    $name = $_GET['editProject'];
                    echo '<form action="../bugTrackingSystem/handlers/createProject.php?editProject='.$name.'" method="post">';
                }else{
                    echo '<form action="../bugTrackingSystem/handlers/createProject.php" method="post">';
                }
                echo '<input type="text" name="project_name" id="projectCaption" placeholder="Имя проекта: " class="simpleBlackText greenInput" value="'.$projectName.'">';
            ?>

            <div class="projectInformationWrapper">
                <p class="hintText">Введите имена пользователей, которые имеют право
                доступа для работы в данном проекте, через пробел в окно ниже. Например: user1 user2</p>
                <?php
                    echo '<textarea name="users" id="projectBody" class="simpleBlackText grayTextBox">'.$users.'</textarea>';
                ?>

                <div class="commentAndSaveWrapper">
                    <?php
                        echo '<textarea name="comment" type="text" id="projectComment" placeholder="Комментарий: " class="simpleBlackText grayTextBox">'.$comment.'</textarea>';
                    ?>

                    <input type="submit" id="SaveButton" class="greenButton simpleWhiteText" value="Сохранить">
                </div>
            </div>
        </form>
    </div>
</div>

<div class="footerWrapper"></div>
</body>
</html>