@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Create Menu</h1>
    <form action="{{ route('menus.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="mb-3">
            <label for="route" class="form-label">Route</label>
            <input type="text" class="form-control" name="route" id="route" required>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection