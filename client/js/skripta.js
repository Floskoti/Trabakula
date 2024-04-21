flagged = localStorage.getItem("flagged");
console.log(flagged);
if(flagged != null) {
    document.getElementById("fas1").style.display = "block";
    document.getElementById("fas1").style.display = "none";
}