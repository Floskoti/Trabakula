var mistakeFlag = sessionStorage.getItem("mistakeFlag");
console.log(mistakeFlag);
if(mistakeFlag != null) {
    document.getElementById("myModal").style.display = "block";
}