@extends('layouts.master') @section('title', 'Order') @section('content')

<!-- All Orders -->
@if (session('loginError'))
<div class="alert alert-danger" role="alert">
    <div>
        {{ session('loginError') }}
    </div>
</div>
@endif
<h1>Orders</h1>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="container">
            <h2>Order List</h2>
            <ul class="list-group">
                @foreach($orders as $order)
                <a href="order-details/?id={{@$order['order']['order_ids']}}" class="list-group-item">
                    Order ID: {{@$order['order']['order_ids']}} -------- Order for:
                    {{@$order['order']['order_customer_name']}}
                </a>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
