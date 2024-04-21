// Get the modal

var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
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

function showIncorrect() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
    var modalText = document.getElementById("modalText");
    modalText.innerHTML = "Pozor, zlikavcem ste poslali svoje osebne podatke! <br/>Zgrešili ste vse znake, ki kažejo na to, da je stran lažna. Eden izmed znakov je  Morali bi prepoznati, da Facebook račun ne spada na službeni mail.<br/> Drugi znak je, da mail zahteva od vas hitro ukrepanje.<br/> Tretji znak je naslov spletne strani, ki ni Facebook.com. <br/>Poleg tega se sam obrazec razlikuje od resničnega, vsebuje uprabniško ime in geslo na eni strani. Na Facebook-u so to 2 strani";
}