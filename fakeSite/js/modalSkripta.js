// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
    document.getElementById("shoppingItems").scrollIntoView();
    document.getElementById("modalText").innerHTML = "<p>Naslednji znak so ponudbe, ki so predobre, da bi bile res.<br/>V veliki večini primerov, gre pri takih ponudbah za potegavščino,<br/>zato moramo biti previdni in preveriti na spletu ali je podjetje zaupanja vredno"
    document.getElementById("url").style.display = "none";
    btn.style.display = "none";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}