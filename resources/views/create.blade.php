@extends('layouts.app')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Create New Note</h2>

        <a  href="{{ route('notes') }}" class="btn p-3 mb-2 bg-info-subtle text-primary-emphasis">
            Home Page
        </a>
    </div>


    <form action="{{ route('notes.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>

            <input type="text"
                   name="title"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Content</label>

            <textarea name="content"
                      class="form-control"
                      rows="5"
                      required></textarea>
        </div>
         <div class="mb-3">
            <label class="form-label">Remarks</label>

            <textarea name="remarks"
                      class="form-control"
                      rows="2"
                      placeholder="Enter any remarks..."></textarea>
        </div>
        </div>

        <button type="submit"
                class="btn btn-primary">
            Save Note
        </button>

        
        <a href="{{ route('notes') }}"
           class="btn btn-secondary">
            Back
        </a>

    </form>

</div>

@endsection