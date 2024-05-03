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
    sendData(1);
}
function areYouSureNo(modalID) {
    // Get the modal
    var modal = document.getElementById(modalID)
    // Close the modal upon clicking
    modal.style.display = "none";
    sendData(2);
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

function toggleFlagSpam(thisFlag, mailId, modalId, solidFlagId, overlayId, modalOpenId){
    // Preveri, če je email prebran/odprt
    // Glede na to, prikaži različen popup
    if(document.getElementById(mailId).classList.contains('active')){
        document.getElementById(modalOpenId).style.display = "block";
        document.getElementById(solidFlagId).classList.toggle("hidden");
        thisFlag.classList.toggle("hidden");
        document.getElementById(overlayId).classList.toggle("hidden");
        document.getElementById(mailId).style.pointerEvents = "none";
        document.getElementById(solidFlagId).style.pointerEvents = "none";
        thisFlag.style.pointerEvents = "none";
        thisFlag.parentElement.style.pointerEvents = "none";
    }
    else{
        document.getElementById(modalId).style.display = "block";
        document.getElementById(solidFlagId).classList.toggle("hidden");
        thisFlag.classList.toggle("hidden");
        document.getElementById(overlayId).classList.toggle("hidden");
        document.getElementById(mailId).style.pointerEvents = "none";
        document.getElementById(solidFlagId).style.pointerEvents = "none";
        thisFlag.style.pointerEvents = "none";
        thisFlag.parentElement.style.pointerEvents = "none";
    }
}