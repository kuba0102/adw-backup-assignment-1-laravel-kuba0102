<!--Model filters ajax view-->
<select name="model" class="form-control">
    @foreach (@$vehicleModels as $vehicleModel)
    <option value="{{@$vehicleModel->vehicle_model}}">{{@$vehicleModel->vehicle_model}}</option>
    @endforeach
</select>
