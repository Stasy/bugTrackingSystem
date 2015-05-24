<?php

class ProjectModel {
    public $ProjectName;
    public $UsersNames;

    public function setProjectProperties($pname, $pusers){
        $this->ProjectName = $pname;
        $this->UsersNames = $pusers;
    }

    public function do_have_user_access_to_current_project($puser){
        //TODO парсить строку и превращать в массив, затем искать эл-т в массиве
        return $this->UsersNames == $puser;
    }
}