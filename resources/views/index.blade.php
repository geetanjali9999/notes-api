@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>MY Notes</h1>

    <a href="{{route('notes.create')}}" class="btn btn-primary">Create New Note</a>
</div>

@foreach ($notes as $note)
    <div class="card mb-3">
        <div class="card-body">

        <h5 class="card-title">
            {{$note->title}}
        </h5>
        <p class="card-text">{{$note->content}}</p>

        <div class="d-flex gap-2">
            <a href="{{route('notes.edit',$note->id)}}" class="btn btn-warning">Edit</a>

            <form action="{{route('notes.delete',$note->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
        </div>
    </div>
@endforeach

@endsection
