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