<?php

class UserModel {
    public $UserName;
    public $ProjectsNames;

    public function setUserProperties($uName, $pNames){
        $this->UserName = $uName;
        $this->ProjectsNames = $pNames;
    }

    public function do_have_current_user_access_to_project($pname){
        //TODO парсить строку и превращать в массив, затем искать эл-т в массиве
        return $this->ProjectsNames = $pname;
    }
}