// Toggle Dark Mode
const darkModeToggle = document.getElementById('darkModeToggle');
darkModeToggle.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
    if (document.body.classList.contains('dark-mode')) {
        darkModeToggle.textContent = 'Light Mode';
    } else {
        darkModeToggle.textContent = 'Dark Mode';
    }
});

// Hamburger Menu
const hamburger = document.getElementById('hamburger');
const navBar = document.getElementById('nav-bar');
hamburger.addEventListener('click', () => {
    navBar.classList.toggle('active');
});

// Pop-up Box
const showPopup = document.getElementById('showPopup');
const popup = document.getElementById('popup');
const closePopup = document.getElementById('closePopup');

showPopup.addEventListener('click', () => {
    popup.style.display = 'block';
});

closePopup.addEventListener('click', () => {
    popup.style.display = 'none';
});

window.addEventListener('click', (e) => {
    if (e.target == popup) {
        popup.style.display = 'none';
    }
});
