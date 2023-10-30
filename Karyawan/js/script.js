// Hamburger

const menu_btn = document.querySelector('.custom-hamburger');
const sidebar = document.querySelector('.mobile-nav');

menu_btn.addEventListener('click', function() {
    menu_btn.classList.toggle('is-active');
    sidebar.classList.toggle('is-active');
    
});


window.addEventListener('resize', function() {
    if (window.innerHeight >= 768) {
        sidebar.classList.remove('is-active');
    }
});

// Dark mode
function SetTheme() {
    const theme = document.body.dataset.bsTheme;

    if (theme === "light") {
        document.body.dataset.bsTheme = "dark";
        document.getElementById("theme").innerHTML = `
            <span class="material-symbols-outlined">
                dark_mode
            </span>
        `;
    } else {
        document.body.dataset.bsTheme = "light";
        document.getElementById("theme").innerHTML = `
            <span class="material-symbols-outlined">
                lightbulb
            </span>
        `;
    }
}