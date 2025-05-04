@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Add Role</a>
    <table class="table table-bordered">
        <thead><tr><th>Name</th><th>Action</th></tr></thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
