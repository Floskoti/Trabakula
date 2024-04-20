function toggleFlagNoSpam(clickedIcon) {
    var icon = document.querySelector('.fa-regular');
    clickedIcon.classList.toggle("hidden");
    icon.classList.toggle("hidden");
}

function toggleFlagSpam(clickedIcon, event) {
    var icon = document.querySelector('.fa-solid');
    switch(clickedIcon.id){
        case "far1": clickedIcon.classList.toggle("hidden");
                     icon.classList.toggle("hidden");
                     break;
        case "far2": clickedIcon.classList.toggle("hidden");
                     icon.classList.toggle("hidden");
                     break;
        default: break;
    }
    
    
}