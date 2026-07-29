import './bootstrap';
// const themeToggle = document.getElementById('themeToggle');
// const html = document.documentElement;

// // On page load, apply saved preference
// const savedTheme = localStorage.getItem('theme') || 'light';
// html.setAttribute('data-theme', savedTheme);
// updateButtonText(savedTheme);

// themeToggle.addEventListener('click', function () {
//     const currentTheme = html.getAttribute('data-theme');
//     const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

//     html.setAttribute('data-theme', newTheme);
//     localStorage.setItem('theme', newTheme);
//     updateButtonText(newTheme);
// });

// function updateButtonText(theme) {
//     themeToggle.textContent = theme === 'dark' ? '☀️ Light Mode' : '🌙 Dark Mode';
// }

// __________________________________________________


const themeToggle = document.getElementById('themeToggle');
const html = document.documentElement;

// on page load, apply saved prefernce
// const savedTheme = localStorage.getItem('theme')  || 'light';
const savedTheme = localStorage.getItem('theme') 
    || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
html.setAttribute('data-theme',savedTheme);
updateButtonText(savedTheme);

themeToggle.addEventListener('click' , function() {
    const currentTheme =html.getAttribute('data-theme');
    const newTheme= currentTheme === 'dark' ? 'light' : 'dark';

    html.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);
    updateButtonText(newTheme);
});

function updateButtonText(theme){
    themeToggle.textContent =theme ==='dark' ? '☀️ Light Mode' : '🌙 Dark Mode';
}