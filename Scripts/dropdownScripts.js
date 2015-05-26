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

function choose(defaultValueId, value, dropdownId, propertyName){
    document.getElementById(defaultValueId).innerHTML = value + '&nbsp;&#9661';
    changerNew(dropdownId);

    if(propertyName != undefined)
       document.getElementsByName(propertyName)[0].value = value;
}