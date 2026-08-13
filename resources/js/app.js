import './bootstrap';
// tiptop core liberay import
import {Editor} from '@tiptap/core';
import Starterkit from '@tiptap/starter-kit';

// tiptop table libary 
import {Table} from '@tiptap/extension-table'; 
import {TableRow} from '@tiptap/extension-table-row';
import {TableCell} from '@tiptap/extension-table-cell';
import {TableHeader} from '@tiptap/extension-table-header';

// checklist for tiptop


// tiptap editor initialization
const editorElement = document.getElementById('editor');

if(editorElement){
    const hiddenTextArea=document.getElementById('content-hidden');
    const editor = new Editor({
        element: editorElement,
        extensions:[
            Starterkit,
            Table.configure({resizable: true}),
            TableRow,
            TableCell,
            TableHeader,
        ],
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

    document.getElementById('btn-table').addEventListener('click',()=>{
        editor.chain().focus().insertTable({rows:3, cols:3,withHeaderRow:true}).run();
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
