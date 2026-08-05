@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h2 class="text-center mb-5">Dashboard</h2>

    <div class="row">

        <div class="col-md-6 mb-4">
            <a href="{{ route('notes') }}" class="text-decoration-none">
                <div class="card shadow text-center p-5">
                    <h1>📒</h1>
                    <h3>Notes</h3>
                </div>
            </a>
        </div>

        <div class="col-md-6 mb-4">
            
            <a href="" class="text-decoration-none">
                <div class="card shadow text-center p-5">
                    <h1>✅</h1>
                    <h3>Tasks</h3>
                </div>
            </a>
        </div>

    </div>

</div>

@endsection 