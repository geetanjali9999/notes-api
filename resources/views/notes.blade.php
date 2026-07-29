@extends('layouts.app')
@section('content')


<div class="modal fade" id="editNoteModal" tabindex="-1" aria-labelledby="editNoteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Note</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="content" class="col-form-label">Content:</label>
            <textarea class="form-control" id="content"></textarea>
          </div>
           <div class="mb-3">
            <label for="remarks" class="col-form-label">Remarks:</label>
            <input type="text" class="form-control" id="remarks">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="updateNoteButton" class="btn btn-primary">Save Note</button>
      </div>
    </div>
  </div>
</div>


<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>MY Notes</h1>

    <a href="{{route('notes.create')}}" class="btn btn-primary">Create New Note</a>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th width="180">Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($notes as $note)
        <tr>
            <td>{{ $note->id }}</td>
            <td>{{ $note->title }}</td>
            <td>{{ $note->content }}</td>
            <td>
                @if ($note->user_fk_id === auth()->id())
                <!-- <a href="{{ route('notes.edit', $note->id) }}" type="button"
                   class="btn btn-warning btn-sm">
                    Edit
                </a> -->
               
                <button type="button" class="btn btn-warning btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#editNoteModal"
                    data-note-id="{{ $note->id }}"
                    data-note-title="{{ $note->title }}"
                    data-note-content="{{ $note->content }}">
                    Edit
                </button>

                <form action="{{ route('notes.delete', $note->id) }}"
                      method="POST"
                      
                      class="delete-form d-inline">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm">
                        Delete
                    </button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection

@section('scripts')
<script>
document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to delete this note?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Delete'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});


const editModal = document.getElementById('editNoteModal');

editModal.addEventListener('show.bs.modal', function (event) {
    const button =event.relatedTarget;
    const noteId = button.getAttribute('data-note-id');

    fetch(`/notes/${noteId}`,{
        method:'GET',
        headers:{
            'Accept':'application/json',
        }
    })
    .then(response => response.json())
    .then(note => {
        document.getElementById('recipient-name').value = note.title;
        document.getElementById('content').value = note.content;
        document.getElementById('remarks').value = note.remarks;
    
        // store the id somewhere for the Save button to use later
        editModal.setAttribute('data-current-note-id',note.id);
    })
    .catch(error => console.error('Error fetching note:- ',error));
});


const updateButton = document.getElementById('updateNoteButton');

updateButton.addEventListener('click', function() {
    
    const noteId = editModal.getAttribute('data-current-note-id');
    const title = document.getElementById('recipient-name').value;
    const content = document.getElementById('content').value;
    const remarks = document.getElementById('remarks').value;

    fetch(`/notes/${noteId}/edit`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ title, content, remarks })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        // Close the modal
        const modalInstance = bootstrap.Modal.getInstance(editModal);
        modalInstance.hide();

        // Optionally, refresh the page or update the table row with new data
        location.reload();
    })
    .catch(error => console.error('Error updating note:', error));
})

</script>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Deleted!',
    text: '{{ session("success") }}',
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif
@endsection