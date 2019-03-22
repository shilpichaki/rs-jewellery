<form action="">
    <lable>Material Type</lable>
    <select name="" id="">
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
    <input type="number">

    <label for="">Today's rate</label>
    <input type="number">

    <label for="">Price</label>
    <input type="number">

    <button>Submit</button>
</form>