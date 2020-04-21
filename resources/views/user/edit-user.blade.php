@extends('layouts.master')

@section('title', 'Edit User')

@section('content')
<!-- Edit user form -->
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">

            @if (session('loginError'))
            <div class="alert alert-danger" role="alert">
                <div>
                    {{ session('loginError') }}
                </div>
            </div>
            @endif

            <form action="{{url('edit-user')}}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-3 col-lg-offset-4 text-center">
                        <h1>Edit User</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-lg-offset-4 text-center">
                        <div class="well well-sm col-lg-offset-1">
                            <div class="input-group">
                                <label for="title">Id:</label><br>
                                <input readonly type="text" name="id" value="{{@$user->id}}" id="id">
                            </div>
                            <div class="input-group">
                                <label for="title">Name:</label><br>
                                <input type="text" name="name" value="{{@$user->name}}" id="name">
                            </div>
                            <div class="input-group">
                                <label for="title">Last Name:</label><br>
                                <input type="text" name="lastName" value="{{@$user->last_name}}" id="lastName">
                            </div>
                            @if(\Auth::user()->id != $user->id)
                            <div class="input-group">
                                <label for="title">User Permission:</label><br>
                                <select name="authId">
                                    <option value="{{$user->auth_id}}">Default: {{$user->auth_name}}</option>
                                    @foreach ($auths as $auth)
                                    <option value="{{$auth->auth_id}}">{{$auth->auth_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            <div class="input-group">
                                <label for="title">Email:</label><br>
                                <input type="email" name="email" value="{{@$user->email}}" id="email">
                            </div>
                            <div class="input-group"><br>
                                <input type="submit" name="submitBtn" value="Edit User">
                            </div>
                        </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
