<?php

    include 'addRow.php';

class checks {

    public function EnterBug($bugId){
        $_SESSION['currentBugId']=$bugId;
        header('Location: EditIssuePage.php');
    }

    public function CheckLogin(){
        if($_SESSION['login']==""){
            header('Location: ../Static/LoginAndRegistrationPage.php');
            return false;
        }else
            return true;
    }

    public function SearchBugs($conf){
        $project = $_SESSION['currentProject'];

        $db = new addRowClass();
        $db->dbConnect($conf);
        $script = "SELECT * FROM $conf->issuesTableName WHERE project='$project'";

        $counter = 0;
        $result = mysql_query($script);

        while($a = mysql_fetch_array($result,MYSQL_ASSOC)){
            $resultMass[$counter] = $a;
            $counter = $counter + 1;
        }
        return $resultMass;
    }

    public function SearchUsers($conf){
        $project = $_SESSION['currentProject'];

        $db = new addRowClass();
        $db->dbConnect($conf);
        $script = "SELECT users FROM $conf->projectsTableName WHERE project_name='$project'";
        $result = mysql_fetch_assoc(mysql_query($script));

        $usersMass = preg_split("/ /", $result['users']);
        return $usersMass;
    }

    public function CheckProject($conf){
        $login = $_SESSION['login'];

        //Проверить наличие проетка в бд
        $db = new addRowClass();
        $db->dbConnect($conf);
        $script = "SELECT projects FROM $conf->usersTableName WHERE user_name='$login'";
        $projects = mysql_fetch_array(mysql_query($script));

        if(!empty ($projects['projects'])){

            //Сверяем с базой данных проектов, затем выбираем первый из проверенных
            $projectsMass = preg_split("/,/",$projects['projects']);

            $counter = 0;
            for($i=0;$i<count($projectsMass);$i=$i+1){
                if (mysql_query("SELECT project_id FROM $conf->projectsTableName WHERE project_name='$projectsMass[0]'")){
                    $resultProjectsMass[$counter] = $projectsMass[$i];
                    $counter = $counter + 1;
                }
            }

            //проставляем проект в сессию и возвращаем массив, или редиректим на страницу создания проекта
            if($counter!=0){
                $_SESSION['currentProject']=$resultProjectsMass[0];
                return $resultProjectsMass;
            }
            else
                header('Location: ../Static/EditProjectPage.php');
        }
        else{
            header('Location: ../Static/EditProjectPage.php');
        }
    }
}