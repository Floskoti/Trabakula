var mistakeFlag = sessionStorage.getItem("mistakeFlag");
console.log(mistakeFlag);
if(mistakeFlag != null) {
    console.log("ehmed " + mistakeFlag);
    document.getElementById("myModal").style.display = "block";
}

function nextExample() {
    console.log("aha");
    document.getElementById("shoppingItems").scrollIntoView();
}