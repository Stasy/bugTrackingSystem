<?php
    include '../bugTrackingSystem/handlers/checks.php';
    include '../configurations/roboBugConfig.php';

    session_start();
    $checks = new checks();
    if(!$checks->CheckLogin())
        exit;

    $config = new roboBugConfig();
    $projects = $checks->CheckProject($config);
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" href="../Styles/mainStyles.css" rel="stylesheet">
    <link type="text/css" href="../Styles/headerStyles.css" rel="stylesheet">
    <link type="text/css" href="../Styles/issueItemsListStyles.css" rel="stylesheet">
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

    <div class="filterWrapper">
        <input type="button" class="greenButton simpleWhiteText" value="Создать запись" id="createIssueButton" onclick="GoToEditIssuePage()">

        <input type="button" class="greenButton simpleWhiteText" value="Open" id="statusFilterOpen"><input type="button" class="darkGreenButton simpleWhiteText" value="Fixed" id="statusFilterFixed"><input type="button" class="greenButton simpleWhiteText" value="Verified" id="statusFilterVerified">

        <input type="button" class="greenButton simpleWhiteText" value="Critical" id="priorityFilterCritical"><input type="button" class="darkGreenButton simpleWhiteText" value="Major" id="priorityFilterMajor"><input type="button" class="greenButton simpleWhiteText" value="Normal" id="priorityFilterNormal">
    </div>

    <div class="issuesListWrapper">
        <table frame="border">
            <tr class="issueItem">
                <td class="issueNumber">1</td>
                <td class="issueCaption">Здесь будет отображаться заголовок бага...</td>
                <td class="cellName simpleGrayText">status:</td>
                <td class="issueStatus">Open</td>
                <td class="cellName simpleGrayText critical">priority:</td>
                <td class="issuePriority critical">Critical</td>
            </tr>
            <tr class="issueItem">
                <td class="issueNumber">2</td>
                <td class="issueCaption">Здесь будет отображаться заголовок бага...</td>
                <td class="cellName simpleGrayText">status:</td>
                <td class="issueStatus">Fixed</td>
                <td class="cellName simpleGrayText normal">priority:</td>
                <td class="issuePriority normal">Normal</td>
            </tr>
            <tr class="issueItem">
                <td class="issueNumber">3</td>
                <td class="issueCaption">Здесь будет отображаться заголовок бага...</td>
                <td class="cellName simpleGrayText">status:</td>
                <td class="issueStatus">Reopened</td>
                <td class="cellName simpleGrayText major">priority:</td>
                <td class="issuePriority major">Major</td>
            </tr>
        </table>
    </div>

    <div class="pagingWrapper">
        <input type="button" class="greenButton simpleWhiteText" value="Начало" id="firstPage"><input type="button" class="greenButton simpleWhiteText" value="1" id="page1"><input type="button" class="darkGreenButton simpleWhiteText" value="2" id="page2"><input type="button" class="greenButton simpleWhiteText" value="3" id="page3"><input type="button" class="greenButton simpleWhiteText" value=". . ." id="pageDots"><input type="button" class="greenButton simpleWhiteText" value="Конец" id="lastPage">
    </div>

</div>

<div class="footerWrapper"></div>
</body>
</html>