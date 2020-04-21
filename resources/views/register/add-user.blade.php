@extends('layouts.master')

@section('title', 'Add New User')

@section('content')
<!-- Add new user form -->
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

            <form action="{{url('add-user')}}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-3 col-lg-offset-4 text-center">
                        <h1>Add New User</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-lg-offset-4 text-center">
                        <div class="well well-sm col-lg-offset-1">
                            <div class="input-group">
                                <label for="title">Name:</label><br>
                                <input type="text" name="name" value="{{old('name')}}" id="name">
                            </div>
                            <div class="input-group">
                                <label for="title">Last Name:</label><br>
                                <input type="text" name="lastName" value="{{old('lastName')}}" id="lastName">
                            </div>
                            <div class="input-group">
                                <label for="title">User Permission:</label><br>
                                <select id="authId" name="authId">
                                    @foreach ($auths as $auth)
                                    <option value="{{$auth->auth_id}}">{{$auth->auth_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group">
                                <label for="title">Email:</label><br>
                                <input type="email" name="email" value="{{old('email')}}" id="email">
                            </div>
                            <div class="input-group">
                                <label for="password">Password:</label><br>
                                <input type="password" name="password" id="password">
                            </div>
                            <div class="input-group"><br>
                                <input type="submit" name="submitBtn" value="Add User">
                            </div>
                        </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
