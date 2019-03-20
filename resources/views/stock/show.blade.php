<h1>Material type: {{$stock->raw_material_type}}</h1>
<h2>Material threshold value: {{$stock->threshold_value}}</h2>
<h3 style="color: red">Material stock: {{$stock->stock_value}}</h3>

<h3>This stock was modified by: </h3>
<ul>
    @foreach($stock->transactions as $transaction)
        <li>{{$transaction->name}} at {{$transaction->updated_at->diffForhumans()}}</li>
    @endforeach
</ul>