@extends('layouts.app')
@section('content')

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
                <a href="{{ route('notes.edit', $note->id) }}"
                   class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('notes.delete', $note->id) }}"
                      method="POST"
                      
                      class="delete-form d-inline">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm">
                        Delete
                    </button>
                </form>
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