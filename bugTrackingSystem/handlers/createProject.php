<?php
        include '../baseClasses/ProjectModel.php';
        include '../../configurations/roboBugConfig.php';
        include 'addRow.php';

        $project = new ProjectModel();
        $project->setProjectProperties($_POST['project_name'], $_POST['users'], $_POST['comment']);

        $config = new roboBugConfig();
        $addRowScript = "INSERT INTO $config->projectsTableName (project_name, users, comment) values('$project->ProjectName', '$project->UsersNames', '$project->Comment')";

        $addRow = new addRowClass();
        $addRow->addRow($config, $addRowScript);

        header('Location: ../../Static/MainPage.php');
?>
