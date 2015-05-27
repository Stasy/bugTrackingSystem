function GoToEditIssuePage(){
    window.location.pathname = "/bugTrackingSystem/Static/EditIssuePage.php";
}

function GoToEditProjectPage(){
    window.location.pathname = "/bugTrackingSystem/Static/EditProjectPage.php";
}

function GoToLoginAndRegistrationPage(){
    window.location.pathname = "/bugTrackingSystem/Static/LoginAndRegistrationPage.php";
}

function GoToMainPage(){
    window.location.pathname = "/bugTrackingSystem/Static/MainPage.php";
}

function EnterIssue(bugId){
    window.location = "/bugTrackingSystem/Static/EditIssuePage.php?currentBugId="+bugId;
}