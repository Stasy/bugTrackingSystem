<?php
include '../bugTrackingSystem/handlers/checks.php';
include '../configurations/roboBugConfig.php';

    session_start();
    $checks = new checks();
    if(!$checks->CheckLogin())
        exit;

    $config = new roboBugConfig();
    $projects = $checks->CheckProject($config);
    $users = $checks->SearchUsers($config);
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" href="../Styles/mainStyles.css" rel="stylesheet">
    <link type="text/css" href="../Styles/headerStyles.css" rel="stylesheet">
    <link type="text/css" href="../Styles/editIssuePageStyles.css" rel="stylesheet">
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

            <a id="editProjectLink" class="simpleBlackText" href="EditProjectPage.html">Редактировать</a>
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
        <form action="../bugTrackingSystem/handlers/createIssue.php" method="post">

            <?php
                echo '<input type="hidden" value="'. $_SESSION['currentProject'].'" name="projectName">';
                echo '<input type="hidden" value="'. $_SESSION['login'].'" name="authorName">';
            ?>
            <input type="hidden" value="default" name="status">
            <input type="hidden" value="default" name="priority">
            <input type="hidden" value="default" name="userName">

            <input type="text" id="issueCaption" name="caption" placeholder="Заголовок бага: " class="simpleBlackText greenInput">
            <div class="issueInformationWrapper">
                <textarea name="content" id="issueBody" placeholder="Введите текст бага" class="simpleBlackText grayTextBox"></textarea>
                <div class="issuePropertiesWrapper">
                    <table>
                        <tr>
                            <td class="cellName simpleGrayText">Кем создан:</td>
                            <td class="property simpleGrayText">
                                <?php
                                    echo $_SESSION['login'];
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td class="cellName simpleGrayText">На ком:</td>
                            <td class="property simpleGrayText">

                                <div class="dropdownRatingWrapper">
                                    <label class="tableFiltersDropdown" for="projectsUsersList">
                                        <a id="projectsUsersList" class="rankFilter simpleGrayText " onclick="changerNew('dropdownRating6ID')" onblur="closingClickNew()">
                                            выберите&nbsp;&#9661;
                                        </a>
                                    </label>
                                    <div id="dropdownRating6ID" class="dropdownRatingULdisplayNone">
                                        <ul>
                                            <?php
                                                foreach($users as $user){
                                                    echo '<li><a href="#" class="simpleGrayText" onclick="choose(\'projectsUsersList\',\''.$user.'\',\'dropdownRating6ID\',\'userName\')">'.$user.'</a></li>';
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="cellName simpleGrayText">Приоритет:</td>
                            <td class="property simpleGrayText">

                                <div class="dropdownRatingWrapper">
                                    <label class="tableFiltersDropdown" for="priorityPropertyList">
                                        <a id="priorityPropertyList" class="rankFilter simpleGrayText " onclick="changerNew('dropdownRating2ID')" onblur="closingClickNew()">
                                            выберите&nbsp;&#9661;
                                        </a>
                                    </label>
                                    <div id="dropdownRating2ID" class="dropdownRatingULdisplayNone">
                                        <ul>
                                            <li><a href="#" class="simpleGrayText" onclick="choose('priorityPropertyList','Normal','dropdownRating2ID','priority')">Normal</a></li>
                                            <li><a href="#" class="simpleGrayText" onclick="choose('priorityPropertyList','Major','dropdownRating2ID','priority')">Major</a></li>
                                            <li><a href="#" class="simpleGrayText" onclick="choose('priorityPropertyList','Critical','dropdownRating2ID','priority')">Critical</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td class="cellName simpleGrayText">Статус:</td>
                            <td class="property simpleGrayText">

                                <div class="dropdownRatingWrapper">
                                    <label class="tableFiltersDropdown" for="statusPropertyList">
                                        <a id="statusPropertyList" class="rankFilter simpleGrayText" href="#" onclick="changerNew('dropdownRating1ID')" onblur="closingClickNew()">
                                            выберите&nbsp;&#9661;
                                        </a>
                                    </label>
                                    <div id="dropdownRating1ID" class="dropdownRatingULdisplayNone">
                                        <ul>
                                            <li><a href="#" class="simpleGrayText" onclick="choose('statusPropertyList','Open','dropdownRating1ID','status')">Open</a></li>
                                            <li><a href="#" class="simpleGrayText" onclick="choose('statusPropertyList','Fixed','dropdownRating1ID','status')">Fixed</a></li>
                                            <li><a href="#" class="simpleGrayText" onclick="choose('statusPropertyList','Verified','dropdownRating1ID','status')">Verified</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    </table>
                </div>

                <div class="commentAndSaveWrapper">
                    <textarea name="comment" type="text" id="issueComment" placeholder="Комментарий: " class="simpleBlackText grayTextBox"></textarea>
                    <input type="submit" id="SaveButton" class="greenButton simpleWhiteText" value="Сохранить">
                </div>
            </div>
        </form>
    </div>
</div>

<div class="footerWrapper"></div>
</body>
</html>