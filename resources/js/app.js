import './bootstrap';
// tiptop liberay import
import {Editor} from '@tiptap/core';
import Starterkit from '@tiptap/starter-kit';

// tiptap editor initialization
const editorElement = document.getElementById('editor');

if(editorElement){
    const hiddenTextArea=document.getElementById('content-hidden');
    const editor = new Editor({
        element: editorElement,
        extensions:[Starterkit],
        content:hiddenTextArea.value,
        onUpdate: ({editor}) => {
            hiddenTextArea.value=editor.getHTML();
        }
    })

    document.getElementById('btn-bold').addEventListener('click',() => {
        editor.chain().focus().toggleBold().run();
    });

    document.getElementById('btn-italic').addEventListener('click',() => {
        editor.chain().focus().toggleItalic().run();
    });

    document.getElementById('btn-bullet').addEventListener('click',() => {
        editor.chain().focus().toggleBulletList().run();
    });

    document.getElementById('btn-orderedList').addEventListener('click',() => {
        editor.chain().focus().toggleOrderedList().run();
    })

    document.getElementById('btn-code').addEventListener('click',() => {
        editor.chain().focus().toggleCodeBlock().run();
    })
}


// -------------------------------------------------- on my way adding theme 


// const themeToggle = document.getElementById('themeToggle');
// const html = document.documentElement;

// // on page load, apply saved prefernce
// // const savedTheme = localStorage.getItem('theme')  || 'light';
// const savedTheme = localStorage.getItem('theme') 
//     || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
// html.setAttribute('data-theme',savedTheme);
// updateButtonText(savedTheme);

// themeToggle.addEventListener('click' , function() {
//     const currentTheme =html.getAttribute('data-theme');
//     const newTheme= currentTheme === 'dark' ? 'light' : 'dark';

//     html.setAttribute('data-theme', newTheme);
//     localStorage.setItem('theme', newTheme);
//     updateButtonText(newTheme);
// });

// function updateButtonText(theme){
//     themeToggle.textContent =theme ==='dark' ? '☀️ Light Mode' : '🌙 Dark Mode';
// }


// ---------------------------------------------- bootstrap way toggle the theme dark | light

const themeToggle = document.getElementById('themeToggle');
const html = document.documentElement;

const savedTheme = localStorage.getItem('theme') || 'light';
html.setAttribute('data-bs-theme', savedTheme);
updateButtonText(savedTheme);

themeToggle.addEventListener('click', function () {
    const currentTheme = html.getAttribute('data-bs-theme');
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

    html.setAttribute('data-bs-theme', newTheme);
    localStorage.setItem('theme', newTheme);
    updateButtonText(newTheme);
});

function updateButtonText(theme) {
    themeToggle.textContent = theme === 'dark' ? '☀️ Light Mode' : '🌙 Dark Mode';
}
