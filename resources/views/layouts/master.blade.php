<html>
<head>
    <title>@yield('title')</title>
    <link href="{{asset('/css/app.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
@section('header')
<div class="container">
    <div class="jumbotron">
        <h1>Auto Spares</h1>
    </div>
</div>
<!-- Navigation -->
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{url('home')}}">| Auto Spares |</a>
            </div>
            <ul class="nav navbar-nav">
                <li role="presentation"><a href="{{url('home')}}">Home</a></li>
                <li><a href="{{url('order')}}">All Orders</a></li>
                @if(\Auth::user()->auth_id == 1)
                <li><a href="{{url('adduser-form')}}">Add New User</a></li>
                <li><a href="{{url('users')}}">All Users</a></li>
                @endif
            </ul>
            @if (session('loginError'))
            <div>
                {{ session('loginError') }}
            </div>
            @endif
            <ul class="nav navbar-nav navbar-right">
                <li role="presentation"><a href="#">Logged in as: {{Auth::user()->name}}_{{Auth::user()->last_name}}</a>
                </li>
                <li role="presentation"><a href="{{url('logout')}}">Logout</a></li>
            </ul>
        </div>
    </nav>
</div>
@show
<!-- Login User info -->
<div class="container">
    <!-- Content of the page -->
    @yield('content')

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script type="text/javascript">
    function loadFilter() {
        var nameValue = document.getElementById("makeSelection").value;
        $('#modelsSelection').load('filter/?myparam=' + nameValue);
    }

    function addToBasket() {
        var nameValue = document.getElementById("carParts").value;
        if (nameValue) {
            $('#basket').load('basket/?myparam=' + nameValue);
            document.getElementById("partsForm").reset();
        }
    }

    function basketRm(partId) {
        $('#basket').load('remove-basket/?myparam=' + partId);
    }

    window.onload = function loadBasket() {
        $('#basket').load('load-basket');
    }
</script>
</body>
</html>
