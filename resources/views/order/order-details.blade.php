@extends('layouts.master') @section('title', 'Order Details') @section('content')

<!-- Order details -->
@if (session('loginError'))
<div class="alert alert-danger" role="alert">
    <div>
        {{ session('loginError') }}
    </div>
</div>
@endif
<h1>Order Number: {{@$orders[0]['order']['order_ids']}}</h1>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="container">
            <h2>Parts list for order: {{@$orders[0]['order']['order_ids']}}</h2>
            <h2>Customer Name: {{@$orders[0]['order']['order_customer_name']}}</h2>
            <form action="{{url('order-remove')}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" value="1" class="form-control" name="type" id="type">
                <input type="hidden" value="{{@$orders[0]['order']['order_ids']}}" class="form-control" name="order_ids"
                       id="order_ids">
                <input type="submit" name="submitBtn" value="Remove Order">
            </form>
            <ul class="list-group">
                @foreach($orders as $order)
                <li class="list-group-item">
                    Part: {{@$order['part'][0]['part_name']}} -------- Vehicle:
                    {{@$order['part'][0]['vehicle_vehicle']}} {{@$order['part'][0]['vehicle_model']}}
                    <form action="{{url('order-remove')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" value="0" class="form-control" name="type" id="type">
                        <input type="hidden" value="{{@$order['order']['order_id']}}" class="form-control"
                               name="order_id" id="order_id">
                        <input type="hidden" value="{{@$order['order']['order_ids']}}" class="form-control"
                               name="order_ids" id="order_ids">
                        <input type="submit" name="submitBtn" value="Remove">
                    </form>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
