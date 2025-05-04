@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Assign Menu Access to Role</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('access.assign') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="role_id" class="form-label">Role</label>
            <select name="role_id" id="role_id" class="form-select">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Menus</label>
            @foreach($menus as $menu)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="menu_ids[]" value="{{ $menu->id }}" id="menu{{ $menu->id }}">
                    <label class="form-check-label" for="menu{{ $menu->id }}">
                        {{ $menu->name }}
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Assign</button>
    </form>
</div>
@endsection