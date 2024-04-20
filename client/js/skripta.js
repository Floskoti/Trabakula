function toggleIcon(clickedIcon) {
    // Pridobi vse ikone
    var icons = document.querySelectorAll('.flag-icon, .regular-flag-icon');

    // Skrij vse ikone
    icons.forEach(function(icon) {
        icon.style.display = 'none';
    });

    // Prikaži samo kliknjeno ikono
    clickedIcon.style.display = 'block';
}