@extends('layouts.master') @section('title', 'All Parts') @section('content')

<!-- All parts -->
@if (session('loginError'))
<div class="alert alert-danger" role="alert">
    <div>
        {{ session('loginError') }}
    </div>
</div>
@endif
<h1>View All Car Parts</h1>
<div class="panel panel-default">
    <div class="panel-body">
<!--        Search box-->
        <div class="well well-sm">
            <form action="{{url('search-parts')}}" method="GET">
                {{ csrf_field() }}
                <div class="input-group">
                    <h3><span class="label label-primary">Search by Part Name/ Make or Model  </span></h3>
                    <input type="text" id="search" name="search" class="form-control" aria-describedby="basic-addon1"
                           value="{{@$searchTerm}}">
                    <input type="submit" name="submitBtn" value="Search">
                </div>
            </form>
        </div>
        <div class="well well-sm">
            <p>
                <a class="btn btn-primary" data-toggle="collapse" href="#filters" role="button" aria-expanded="false"
                   aria-controls="filters">Filter</a>
            </p>
            <div class="row">
                <div class="col">
                    <!-- Filter -->
                    <div class="collapse multi-collapse" id="filters">
                        <div class="card card-body">
                            <form action="{{url('filter')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-3 col-lg-offset-0 text-center">
                                        <h1>Filter</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-lg-offset-0 text-center">
                                        <div class="well well-sm col-lg-offset-2">
                                            <select class="form-control" name="part" id="partSelection" required>
                                                @foreach (@$parts as $part)
                                                <option value="{{@$part->part_name}}">{{@$part->part_name}}</option>
                                                @endforeach
                                            </select>
                                            <select class="form-control" name="make" id="makeSelection"
                                                    onchange="loadFilter()" required>
                                                <option>Pick Make</option>
                                                @foreach (@$vehicles as $vehicle)
                                                <option value="{{@$vehicle->vehicle_vehicle}}">
                                                    {{@$vehicle->vehicle_vehicle}}
                                                </option>
                                                @endforeach
                                            </select>
                                            <div id="modelsSelection">
                                                <select class "form-control" required="">
                                                </select>
                                            </div>

                                            <div class="input-group">
                                                <br>
                                                <input type="submit" name="submitBtn" value="Search">
                                            </div>
                                        </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="well well-sm">
            <div class="list-group">
                <!-- All Parts -->
                <h3><span class="label label-primary">Car Parts List</span></h3>
                <form id="partsForm">
                    <input type="reset" name="clearBtn" value="Clear">
                    <input type="button" name="add" value="Add To Basket" onclick="addToBasket()">
                    <a class="nounderline" href="{{url('checkout')}}"><input type="button" value="Order"></a>
                    <br>
                    <select id="carParts" class="custom-select" multiple>
                        @foreach (@$carParts as $carPart)
                        <br>
                        <option value="{{@$carPart->id}}">{{@$carPart->part_name}} {{@$carPart->vehicle_vehicle}}
                            {{@$carPart->vehicle_model}}
                        </option>
                        @endforeach
                    </select>
                </form>
                <!-- Basket -->
                <div id="basket">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
