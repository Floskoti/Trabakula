flagged = localStorage.getItem("flagged");
console.log(flagged);
if(flagged != null) {
    document.getElementById("fas1").style.display = "block";
    document.getElementById("fas1").style.display = "none";
}


//MODAL ZA VPRaŠANJE ALI STE PREPRIČANI
function areYouSure(modalID){
    var modal = document.getElementById(modalID);
    modal.style.display = "block";
    switch(modalID){
        case 'fbopenareyousure':
            // Hardcoded id v podatkovni bazi
            sendData(10);
            break;
        case 'poopenareyousure':
            // Hardcoded id v podatkovni bazi
            sendData(20);
            break;
        case 'usopenareyousure':
            // Hardcoded id v podatkovni bazi
            sendData(30);
            break;
        case 'propenareyousure':
            // Hardcoded id v podatkovni bazi
            sendData(40);
            break;
    }
}
function areYouSureYes(modalID, divID, navitemID, contentID) {
    // Get the modal
    var modal = document.getElementById(modalID)
    // Close the modal upon clicking
    modal.style.display = "none";

    var div = document.getElementById(divID);
    div.style.display = "none";

    // Remove all .active and .show attributes
    const activeElements = document.querySelectorAll(".active");
    const showElements = document.querySelectorAll(".show");
    activeElements.forEach(element => {
        element.classList.remove("active");
    });
    activeElements.forEach(element => {
        element.classList.remove("show");
    });

    // Set .active and .show attributes to the selected e-mail
    document.getElementById(navitemID).classList.add("active");
    document.getElementById(contentID).classList.add("active");
    document.getElementById(contentID).classList.add("show");
}
function areYouSureNo(modalID) {
    // Get the modal
    var modal = document.getElementById(modalID)
    // Close the modal upon clicking
    modal.style.display = "none";
}

function sendData(idGumba) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
            } else {
                console.error('Request failed:', xhr.status);
            }
        }
    };
    xhr.open("POST", "sendEvent.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("idGumba=" + idGumba);
}