<!--Basket ajax view-->
<ul id="basket" class="list-group">
    <h3><span class="label label-primary">Basket</span></h3>
    @foreach (@session('cart') as $part)
    @if(@$part[0]['part_name'] != '' and @session('cart')[0] != 'null')
    <li class="list-group-item">Part:{{@$part[0]['part_name']}} {{@$part[0]['vehicle_vehicle']}}
        {{@$part[0]['vehicle_model']}} Price: £{{@$part[0]['price']}}
        <button id="partBasket" onclick="basketRm({{@$part[0]['id']}})" type="button">Remove</button>
    </li>
    @else
    <li class="list-group-item">You order basket is empty.
    </li>
    @endif
    @endforeach
    <li class="list-group-item">Total: £{{@session('total')}}
    </li>
</ul>
