<h1>Material type: {{$stock->raw_material_type}}</h1>
<h2>Material threshold value: {{$stock->threshold_value}}</h2>
<h3 style="color: red">Material stock: {{$stock->stock_value}}</h3>

<h3>This stock was modified by: </h3>
<ul>
    @foreach($stock->transactions as $transaction)
        <li>{{$transaction->name}} at {{$transaction->pivot->updated_at->diffForHumans()}}</li>
    @endforeach
</ul>

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