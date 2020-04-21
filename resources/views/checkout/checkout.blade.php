@extends('layouts.master') @section('title', 'Checkout') @section('content')

<!-- All parts -->
@if (session('loginError'))
<div class="alert alert-danger" role="alert">
    <div>
        {{ session('loginError') }}
    </div>
</div>
@endif
<h1>Order Parts</h1>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="well well-sm">
            <h3><span class="label label-primary">Parts Overview </span></h3>
            <!-- Basket -->
            <div id="basket">
            </div>
            @if(@session('cart')[0] != 'null')
            <div class="row">
                <div class="col-sm-3">
<!--                    Customer name form-->
                    <form action="{{url('checkout')}}" method="POST">
                        {{ csrf_field() }}
                        <label for="email">Customer Name:</label>
                        <input required type="text" class="form-control" name="customer_name" id="name">
                        <input type="submit" name="submitBtn" value="Make Order">
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
