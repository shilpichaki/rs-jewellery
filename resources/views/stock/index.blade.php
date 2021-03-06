@extends('layouts.master')

@section('css')
{{--Font-awsome Icons--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .toggleview{
            display: none;
        }
        .before {
            background: #fdaeb7;
        }
        .after {
            background: #bef5cb;
        }
        .update-text {
            font-size: 16px;
        }
    </style>
@endsection

@section('content')

    <h2 class="text-center py-3">All Stocks</h2>
	<div class="card-block table-border-style">
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
				<tr>
					<th style="font-size: 18px;">Material name:</th>
					<th style="font-size: 18px;">Material threshold value:</th>
					<th style="font-size: 18px;">Current material stock value:</th>
                    <th></th>
				</tr>
				</thead>
				<tbody>
                @if($stocks->count() == 0)
                    <tr>
                        <th colspan="4" class="text-center">No Data Found!</th>
                    </tr>
                @else
                <?php $counter=1; ?>
                @foreach ($stocks as $stock)
                    <tr>
                        <th>{{$stock->raw_material_type}}</th>
                        <th>{{$stock->threshold_value}}</th>
                        <th>{{$stock->stock_value}}</th>
                        <th class="d-flex justify-content-center">
                            <button class="btn btn-primary btntoggleview mx-1" data-counter="{{$counter}}">
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <a href="{{route('stock.addstock')}}" class="btn btn-primary mx-1">
                                <i class="fa fa-external-link"></i>
                            </a>
                        </th>
                    </tr>
                    <tr class="toggleview" id="toggleview-{{$counter}}">
                        <th colspan="4">
                            @foreach($stock->transactions as $transaction)
                            <h5 class="py-2">Updated by: {{$transaction->name}}</h5>
                            <div class="row">
                                <div class="col-lg-6 py-2">
                                <code class="before">Before:</code>
                                <ul class="before update-text">
                                    @foreach(json_decode($transaction->pivot->before) as $key => $value)
                                        <li class="p-2">
                                            @prettifykey($key)
                                            : {{$value}}
                                        </li>
                                    @endforeach
                                </ul>
                                </div>
                                <div class="col-lg-6 py-2">
                                <code class="after">After:</code>
                                <ul class="after update-text">
                                    @foreach(json_decode($transaction->pivot->after) as $key => $value)
                                        <li class="p-2">
                                            @prettifykey($key)
                                            : {{$value}}
                                        </li>
                                    @endforeach
                                </ul>
                                </div>
                            </div>
                                <div class="row px-2">
                                        <p class="px-2 update-text">This stock was bought on {{$transaction->pivot->created_at->isoFormat('MMMM Do YYYY, h:mm:ss a')}}, rate of that day was {{$transaction->pivot->rate}} and the price was {{$transaction->pivot->price}}.</p>
                                </div>
                                <div style="width: 90%; margin-left:5%;"><hr></div>
                            @endforeach
                        </th>
                    </tr>
                    <?php $counter++; ?>
                @endforeach
                @endif
				</tbody>
			</table>
		</div>
	</div>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $(".btntoggleview").click(function(){
                var dataCounter = $(this).attr('data-counter');
                var toggleView = 'toggleview-' + dataCounter;
                console.log(toggleView);
                $("#"+ toggleView).toggle();
            });
        });
    </script>
@endsection
