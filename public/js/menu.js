const openToggle = document.getElementById('toggle_open');
const closeToggle = document.getElementById('toggle_close');
const menu = document.getElementById('menu');
//Abrir
openToggle.addEventListener('click', () => {
    menu.classList.add('nav_mb-v');
})

closeToggle.addEventListener('click', () => {
    menu.classList.remove('nav_mb-v');
})