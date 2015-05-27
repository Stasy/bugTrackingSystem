<?php

class UserModel {
    public $UserName;
    public $ProjectsNames;
    public $Password;

    public function setUserProperties($uName, $pass, $pNames){
        $this->UserName = $uName;
        $this->Password = $pass;
        $this->ProjectsNames = $pNames;
    }

    public function do_have_current_user_access_to_project($pname){
        //TODO парсить строку и превращать в массив, затем искать эл-т в массиве
        return $this->ProjectsNames = $pname;
    }
}