
<h1>MY Notes List </h1>
<a href="{{ route('notes.create') }}">Create New Note</a>

    <!-- <div>
        h2>Welcome, {{ Auth::user()->name }}</h2>
        <a href="{{ route('logout') }}">Logout</a>
    </div> -->
    <h2>Welcome, {{ Auth::user()->name }}</h2>

    <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>
@foreach  ($notes as $note)
    <div>
        <h2>{{ $note->title }}</h2>
        <p>{{ $note->content }}</p>
        <a href="{{ route('notes.edit', $note->id) }}">Edit</a>
        <form action="{{ route('notes.delete', $note->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
           
    </div>
@endforeach

    <div>

