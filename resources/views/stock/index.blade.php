@foreach ($stocks as $stock)
	<h1>material name: {{$stock->raw_material_type}}</h1>
	<h1>material threshold value: {{$stock->threshold_value}}</h1>
	<h1>current material stock value: {{$stock->stock_value}}</h1>
	<ul>
		@foreach($stock->transactions as $transaction)
			<h3>Updated by: {{$transaction->name}}</h3>
			<h4>Changes: </h4>
			<p>Before:</p>
			<ul>
				@foreach(json_decode($transaction->pivot->before) as $key => $value)
					<li>{{$key}} : {{$value}}</li>
				@endforeach
			</ul>
		<div style="width: 90%; margin-left:5%;"><hr></div>
		@endforeach
	</ul>
	<hr>
@endforeach