<?php

    include '../baseClasses/BugModel.php';
    include '../../configurations/roboBugConfig.php';
    include 'addRow.php';

    $bug = new BugModel();
    $bug->setBugProperties($_POST['caption'], $_POST['content'], $_POST['status'], $_POST['priority'],
        $_POST['projectName'], $_POST['authorName'], $_POST['userName'], $_POST['comment']);

    $config = new roboBugConfig();

    $currentBug = $_GET['currentBugId'];
    if(empty($currentBug)){
        $Script = "INSERT INTO $config->issuesTableName (caption, content, status, priority, project, author, currentUser, comment) values('$bug->BugCaption', '$bug->BugContent', '$bug->BugStatus', '$bug->BugPriority', '$bug->ProjectName', '$bug->AuthorName', '$bug->UserName', '$bug->BugComment')";
    } else
    $Script = "UPDATE $config->issuesTableName SET caption='$bug->BugCaption', content='$bug->BugContent', status='$bug->BugStatus', priority='$bug->BugPriority', project='$bug->ProjectName' , author='$bug->AuthorName', currentUser='$bug->UserName', comment='$bug->BugComment' WHERE bug_id='$currentBug'";

    $addRow = new addRowClass();
    $addRow->addRow($config, $Script);

    header('Location: ../../Static/MainPage.php');
?>