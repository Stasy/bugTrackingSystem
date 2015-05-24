<?php

class BugModel {
    public $BugCaption;
    public $BugContent;
    public $BugStatus;
    public $BugPriority;

    public $ProjectName;
    public $AuthorName;
    public $UserName;

    public function setBugProperties($caption, $content, $status, $priority, $projectName, $authorName, $userName){
        $this->BugCaption = $caption;
        $this->BugContent = $content;
        $this->BugPriority = $priority;
        $this->BugStatus = $status;

        $this->ProjectName = $projectName;
        $this->AuthorName = $authorName;
        $this->UserName = $userName;
    }

    public function is_in_project($projectName){
        return $this->ProjectName == $projectName;
    }

    public function is_bug_author($authorName){
        return $this->AuthorName == $authorName;
    }

    public function is_bug_user($userName){
        return $this->UserName == $userName;
    }

    public function is_bug_priority($priority){
        return $this->BugPriority == $priority;
    }

    public function is_bug_status($status){
        return $this->BugStatus == $status;
    }
}