@extends('layouts.master') @section('title', 'Checkout') @section('content')

<!-- All users -->
@if (session('loginError'))
<div class="alert alert-danger" role="alert">
    <div>
        {{ session('loginError') }}
    </div>
</div>
@endif
<h1>Users</h1>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="container">
            <h2>User List</h2>
            <ul class="list-group">
                @foreach($users as $user)
                <a href="user-details/?id={{@$user->id}}" class="list-group-item">
                    User ID: {{@$user->id}} -------- Name: {{@$user->name}} -------- Last Name: {{@$user->last_name}}
                </a>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
