import './bootstrap';
// const editModal = document.getElementById('editNoteModal');

// editModal.addEventListener('show.bs.modal', function (event) {
//     const button = event.relatedTarget;          // the Edit button clicked
//     const noteId = button.getAttribute('data-note-id');

//     fetch(`/notes/${noteId}`, {
//         method: 'GET',
//         headers: {
//             'Accept': 'application/json',
//         }
//     })
//     .then(response => response.json())
//     .then(note => {
//         document.getElementById('recipient-name').value = note.title;
//         document.getElementById('content').value = note.content;
//         document.getElementById('remarks').value = note.remarks;

//         // store the id somewhere for the Save button to use later
//         editModal.setAttribute('data-current-note-id', note.id);
//     })
//     .catch(error => console.error('Error fetching note:', error));
// });

