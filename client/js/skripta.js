function toggleFlagNoSpam(clickedIcon) {
    var icon = document.querySelector('.fa-regular');
    clickedIcon.classList.toggle("hidden");
    icon.classList.toggle("hidden");
}

function toggleFlagSpam(clickedIcon) {
    var icon = document.querySelector('.fa-solid');
    clickedIcon.classList.toggle("hidden");
    icon.classList.toggle("hidden");
}