@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>MY Notes</h1>

    <a href="{{route('notes.create')}}" class="btn btn-primary">Create New Note</a>
</div>
<div class="accordion" id="notesAccordion">
@foreach($notes as $note)

<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#note{{ $note->id }}">
            {{ $note->title }}
        </button>
    </h2>

    <div id="note{{ $note->id }}"
         class="accordion-collapse collapse">

        <div class="accordion-body">
            {{ $note->content }}
        </div>

    </div>
</div>

@endforeach
</div>
@endsection
