<?php

    include '../baseClasses/BugModel.php';
    include '../../configurations/roboBugConfig.php';
    include 'addRow.php';

    $bug = new BugModel();
    $bug->setBugProperties($_POST['caption'], $_POST['content'], $_POST['status'], $_POST['priority'],
        $_POST['projectName'], $_POST['authorName'], $_POST['userName'], $_POST['comment']);

    $config = new roboBugConfig();
    $addRowScript = "INSERT INTO $config->issuesTableName (caption, content, status, priority, project, author, currentUser, comment) values('$bug->BugCaption', '$bug->BugContent', '$bug->BugStatus', '$bug->BugPriority', '$bug->ProjectName', '$bug->AuthorName', '$bug->UserName', '$bug->BugComment')";

    $addRow = new addRowClass();
    $addRow->addRow($config, $addRowScript);

    header('Location: ../../Static/MainPage.php');
?>