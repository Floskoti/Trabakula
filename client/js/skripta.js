function toggleFlagNoSpam(clickedIcon) {
    switch(clickedIcon.id){
        case "fas1": clickedIcon.classList.toggle("hidden");
                    var icon = document.querySelector('#far1');
                     icon.classList.toggle("hidden");
                     break;
        case "fas2": clickedIcon.classList.toggle("hidden");
                    var icon = document.querySelector('#far2');
                     icon.classList.toggle("hidden");
                     break;
        case "fas3": clickedIcon.classList.toggle("hidden");
                    var icon = document.querySelector('#far3');
                     icon.classList.toggle("hidden");
                     break;
        case "fas4": clickedIcon.classList.toggle("hidden");
                    var icon = document.querySelector('#far4');
                     icon.classList.toggle("hidden");
                     break;
        default: break;
    }
}

function toggleFlagSpam(clickedIcon, event) {
    switch(clickedIcon.id){
        case "far1": clickedIcon.classList.toggle("hidden");
                    var icon = document.querySelector('#fas1');
                     icon.classList.toggle("hidden");
                     break;
        case "far2": clickedIcon.classList.toggle("hidden");
                    var icon = document.querySelector('#fas2');
                     icon.classList.toggle("hidden");
                     break;
        case "far3": clickedIcon.classList.toggle("hidden");
                     var icon = document.querySelector('#fas3');
                      icon.classList.toggle("hidden");
                      break;
        case "far4": clickedIcon.classList.toggle("hidden");
                    var icon = document.querySelector('#fas4');
                     icon.classList.toggle("hidden");
                     break;
        default: break;
    }
    
}

  