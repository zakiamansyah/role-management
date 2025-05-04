@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ isset($role) ? route('roles.update', $role) : route('roles.store') }}">
        @csrf
        @if(isset($role))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Role Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $role->name ?? '') }}">
        </div>

        <div class="form-group mt-3">
            <label>Access Menus</label><br>
            @foreach($menus as $menu)
                <div class="form-check">
                    <input type="checkbox" name="menu_ids[]" value="{{ $menu->id }}"
                        class="form-check-input"
                        {{ isset($role) && $role->menus->contains($menu->id) ? 'checked' : '' }}>
                    <label class="form-check-label">{{ $menu->name }}</label>
                </div>
            @endforeach
        </div>

        <button class="btn btn-success mt-3" type="submit">
            {{ isset($role) ? 'Update' : 'Create' }}
        </button>
    </form>
</div>
@endsection
