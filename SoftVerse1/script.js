const darkModeToggle = document.getElementById("darkModeToggle");
const body = document.body;
const navMenu = document.getElementById("navMenu");
const hamburger = document.getElementById("hamburger");


darkModeToggle.addEventListener("click", () => {
    body.classList.toggle("dark");
    const icon = darkModeToggle.querySelector("i");
    icon.classList.toggle("bx-sun");
    icon.classList.toggle("bx-moon");
});

hamburger.addEventListener("click", () => {
    navMenu.classList.toggle("show");
});

function showDetails(id) {
    document.getElementById('detail-' + id).style.display = 'block';
}

function closeDetails(id) {
    document.getElementById('detail-' + id).style.display = 'none';
}