function changer () {
    myel = document.getElementById("dropdownID");
    if(myel.className == 'dropdownUL'){
        myel.className = 'dropdownULdisplayNone';
    } else {myel.className = 'dropdownUL'}
}

function changerNew ( id ) {
    ratingel  = document.getElementById(id);
    if(ratingel.className == 'dropdownRatingUL'){
        ratingel.className = 'dropdownRatingULdisplayNone';
    } else {ratingel.className = 'dropdownRatingUL'}
}

function closingClick () {
    clickForClose = document.getElementById("dropdownID");
    clickForClose.className = 'dropdownULdisplayNone';
}

function closingClickNew () {
    clickForClose = document.getElementById("dropdownRatingID");
    clickForClose.className = 'dropdownRatingULdisplayNone';
}