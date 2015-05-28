<?php
        include '../baseClasses/ProjectModel.php';
        include '../../configurations/roboBugConfig.php';
        include 'addRow.php';

        $project = new ProjectModel();
        $project->setProjectProperties($_POST['project_name'], $_POST['users'], $_POST['comment']);

        $config = new roboBugConfig();

        if(empty($_GET['editProject'])){
                $Script = "INSERT INTO $config->projectsTableName (project_name, users, comment) values('$project->ProjectName', '$project->UsersNames', '$project->Comment')";
        }else{
                $projName = $_GET['editProject'];
                $Script = "UPDATE $config->projectsTableName SET project_name='$project->ProjectName', users='$project->UsersNames', comment='$project->Comment' WHERE project_name='$projName'";
        }

        $addRow = new addRowClass();
        $addRow->addRow($config, $Script);

        header('Location: ../../Static/MainPage.php');
?>
