<form action="{{route('stock.addstock')}}" method="post">
    {{csrf_field()}}
    <lable>Material Type</lable>
    <select name="material_type" id="">
        @foreach ($rawMaterial as $material)
            <option value="{{$material}}">{{$material}}</option>
        @endforeach
    </select>

    <lable>Material Type</lable>
    <select name="" id="">
        @foreach ($unitOfMeasurement as $unit)
            <option value="{{$unit}}">{{$unit}}</option>
        @endforeach
    </select>

    <lable>Threshold value</lable>
    <input type="number">

    <label for="">Amount you want to add</label>
    <input type="number" name="stock_value">

    <label for="">Today's rate</label>
    <input type="number">

    <label for="">Price</label>
    <input type="number">

    <button>Submit</button>
</form>

@if ($errors->any())
    <h1>Errors</h1>
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif