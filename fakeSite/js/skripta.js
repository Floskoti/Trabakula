var lastName = sessionStorage.getItem("lastname");
if(lastName != null) {
    var showMistakes = document.getElementById("showMistakes");
    showMistakes.innerHTML = lastName;
}