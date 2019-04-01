@extends('layouts.master')

@section('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('css/design-aadhar.style.css')}}">
	<style>
		.table-bordered td {
		    width: 60px !important;
		}
	</style>
@endsection
@section('content')
	<h2 class="text-center py-3">Add Design</h2>
	<form action="{{route('design.store-design')}}" method="POST" enctype="multipart/form-data">
		@csrf
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<table class="table table-bordered" id="">
						<tbody>
						<tr>
							<td class="ts">Design number:</td>
							<td>
								<input class="form-control form-control-primary" type="text" name="design_no" id="design_no" pattern="[0-9]{3}" title="Design number should be an integer!" required>
								<a href="#" id="design_no_tooltip" data-toggle="tooltip" data-placement="top" title="Design number already in use!" style="display: none; font-size: 22px; color: red">!</a>
							</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-md-6 text-center" style="border: 1px solid #aba2d6;background-color: #eaffab;">
				<div class="row">
					<h6 class="pt-3 ts">Bangle Design</h6>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-2">
				<div class="row p-2">
					<div class="preview img-wrapper rounded"></div>
					<div class="">
						<br>
						<input type="file" name="picture" id="picture" required />
						<br>
						<br>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
                        <div class="row text-left">
                        	<label class="col-form-label ml-0"><b>Rhodium</b></label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                    	<div class="row">
                    		<input type="text" class="form-control form-control-primary" value="" id="rhodium" name="rhodium">
                    	</div>
                    </div>
					<div class="col-sm-12">
                        <div class="row text-left">
                        	<label class="col-form-label ml-0"><b>Misc. price</b></label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                    	<div class="row">
                    		<input type="text" class="form-control form-control-primary" value="" id="misc_price" name="misc_price">
                    	</div>
                    </div>
					<div class="col-sm-12">
                        <div class="row text-left">
		                    <label class="col-form-label ml-0"><b>Markup %</b></label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                    	<div class="row">
	                    	<input type="text" class="form-control form-control-primary" value="" id="unit_avg_price" name="unit_avg_price">
                    	</div>
                    </div>
					<div class="col-sm-12">
                        <div class="row text-left">
		                    <label class="col-form-label ml-0"><b>Price(4 pcs)</b></label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                    	<div class="row">
		                    <input type="text" class="form-control form-control-primary" value="" id="price_5pcs" name="price_5pcs">
                    	</div>
                    </div>
				</div>
			</div>
			<div class="col-md-10">
				<div class="row">
					<div class="table-responsive">
						<table class="table table-bordered" id="editableTable">
							<thead>
							<tr>
								<th>Stone Size</th>
								<th>Stone Type</th>
								<th>Stone Color</th>
								<th>2.2</th>
								<th>2.4</th>
								<th>2.6</th>
								<th>2.8</th>
								<th>2.10</th>
								<th>Stone Price</th>
								<th>Labour Charge</th>
								<th></th>
							</tr>
							</thead>
							<tbody id="append_parent">
							<tr id="add_stone_row_0">
								<td>
									<input class="form-control form-control-primary" type="text" name="stones[0][size]" required>
								</td>
								<td>
									<select class="form-control form-control-primary select-stone-dropdown" name="stones[0][type]">
										<option value="">SELECT STONE</option>
										@foreach($stones as $stone)
											<option class="$color">{{$stone}}</option>
										@endforeach
									</select>
								</td>
								<td>
									<select class="form-control form-control-primary" name="stones[0][stone_color]" id="">
										@foreach($colors as $color)
											<option class="$color">{{$color}}</option>
										@endforeach
									</select>
								</td>
								<td>
									<input data-stoneType="" data-bangleSize="2.2" class="form-control form-control-primary add_round_type_stone" type="text" name="stones[0][quantity][0]" required pattern="\d+" title="">
								</td>
								<td>
									<input data-stoneType="" class="form-control form-control-primary stone_add_foo" type="text" name="stones[0][quantity][1]" required pattern="\d+">
								</td>
								<td>
									<input data-stoneType="" class="form-control form-control-primary stone_add_foo" type="text" name="stones[0][quantity][2]" required pattern="\d+">
								</td>
								<td>
									<input data-stoneType="" class="form-control form-control-primary stone_add_foo" type="text" name="stones[0][quantity][3]" required pattern="\d+">
								</td>
								<td>
									<input data-stoneType="" class="form-control form-control-primary stone_add_foo" type="text" name="stones[0][quantity][4]" required pattern="\d+">
								</td>
								<td>
									<input class="form-control form-control-primary" type="text" name="stones[0][stone_price]" required pattern="\d+.\d{2}" title="Example: 500.00, 1000.70">
								</td>
								<td>
									<input class="form-control form-control-primary" type="text" name="stones[0][labour_charge]" required pattern="\d+.\d{2}" title="Example: 500.00, 1000.70">
								</td>
								<td>
									<button type="button" data-id="0" class="delete_row_btn btn btn-primary button button-small" title="Delete">
										<i class="fa fa-trash"></i>
									</button>
								</td>
							</tr>
							</tbody>
						</table>
					</div>
					<br><br>
					<div class="col-sm-12">
						<div class="row py-3">
							<div class="col-md-12">
								<button class="btn btn-primary edit" id="submit_btn"><i class="fa fa-paper-plane"></i>&nbsp;&nbsp; Submit</button>
								<button type="button" class="btn btn-primary pull-right add-row" id="rowAddButton">
									<i class="fa fa-plus"></i>&nbsp;&nbsp; Add Row
								</button>
							</div>
						</div>
					</div>

					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
							<tr>
								<th class="text-center" colspan="2">TOTAL TYPEWISE STONE COUNT</th>
							</tr>
							<tr>
								<th>Stone type</th>
								<th class="text-left">Total stones</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>ROUND STONES</td>
								<td id="total-round-stones"></td>
							</tr>
							<tr>
								<td>BIG STONES</td>
								<td id="total-big-stones"></td>
							</tr>
							<tr>
								<td>TB STONES</td>
								<td id="total-tb-stones"></td>
							</tr>
						</tbody>
					</div>
				</div>
			</div>
		</div>


		<div class="row">
			
		</div>
	</div>
	</form>

@endsection

@section('js')
<script>
    $(document).ready(function () {
        var counter = 1;
        $("#rowAddButton").click(function () {
            var content = '<tr id="add_stone_row_'+counter+'">';
            content += '<td>';
            content += 		'<input class="form-control form-control-primary" type="text" name="stones['+counter+'][size]" required>';
            content += '</td>';
            
            content += '<td>';
            content += 		'<select class="form-control form-control-primary select-stone-dropdown" name="stones['+counter+'][type]" id="">';
            	content +=			'<option value="">SELECT STONE</option>'
	            @foreach($stones as $stone)
	            content += 			'<option value="{{$stone}}">{{$stone}}</option>';
				@endforeach
            content += 		'</select>';
            content += '</td>';
            content += '<td>';
            content += 		'<select class="form-control form-control-primary" name="stones['+counter+'][type]" id="">';
	            @foreach($colors as $color)
	            content += 			'<option value="{{$color}}">{{$color}}</option>';
				@endforeach
            content += 		'</select>';
            content += '</td>';

            content += '<td>';
            content += 		'<input class="form-control form-control-primary add_round_type_stone" data-stoneType="" data-bangleSize="2.2" type="text" name="stones['+counter+'][quantity][0]" required pattern="\\d+" title="">';
            content += '</td>';
            content += '<td>';
            content += 		'<input class="form-control form-control-primary stone_add_foo" data-stoneType="" data-bangleSize="2.4"  type="text" name="stones['+counter+'][quantity][1]" required pattern="\\d+">';
            content += '</td>';
            content += '<td>';
            content += 		'<input class="form-control form-control-primary stone_add_foo" data-stoneType="" data-bangleSize="2.6"  type="text" name="stones['+counter+'][quantity][2]" required pattern="\\d+">';
            content += '</td>';
            content += '<td>';
            content += 		'<input class="form-control form-control-primary stone_add_foo" data-stoneType="" data-bangleSize="2.8"  type="text" name="stones['+counter+'][quantity][3]" required pattern="\\d+">';
            content += '</td>';
            content += '<td>';
            content += 		'<input class="form-control form-control-primary stone_add_foo" data-stoneType="" data-bangleSize="2.10"  type="text" name="stones['+counter+'][quantity][4]" required pattern="\\d+">';
            content += '</td>';
            content += '<td>';
            content += 		'<input class="form-control form-control-primary stone_add_foo" type="text" name="stones['+counter+'][quantity][4]" required pattern="\\d+">';
            content += '</td>';
            content += '<td>';
            content += 		'<input class="form-control form-control-primary" type="text" name="stones['+counter+'][price]" required pattern="\\d+.\\d{2}" title="Example: 500.00, 1000.70">';
            content += '</td>';
            content += '<td>';
            content += 		'<button type="button" data-id="'+counter+'" class="delete_row_btn btn btn-primary button button-small" title="Delete"><i class="fa fa-trash"></i></button>';
            content += '</td>';
            content += '</tr>';

            $("#append_parent").append(content);
            counter++;
        });
    });
</script>
<script>
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.preview').attr('style', 'background-image:url('+e.target.result+');background-size: cover; background-position:center;');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#picture").change(function() {
        readURL(this);
    });

    $(document).ready(function() {
    	var design_no = '';
    	$('#design_no').on('keyup', function() {
    		design_no = $(this).val();
    		design_no_length = design_no.toString().length;

    		if(design_no_length === 3) {
    			$.ajax({
                url: '{{env('ROOT_URL')}}/api/design/'+design_no,
                type: "GET",
                error: function () {
                	$('#design_no').removeClass('border-danger');
                    // $('#design_no_tooltip').hide();
                	$('#submit_btn').prop('disabled', false);
                },
                success: function (data) {
                    if(data.code == 200) {
                    	$('#design_no').addClass('border-danger');
                    	// $('#design_no_tooltip').show();
                    	$('#submit_btn').prop('disabled', true);
                    }
                }
            });
    		}
        });
	});

	// delete row
	$(document).ready(function() {
		var dataId  = 0; 
		$('body').on('click','.delete_row_btn',function(){
		// $('.delete_row_btn').click(function() {
			dataId = $(this).attr('data-id');
			console.log(dataId);
			$("#add_stone_row_"+dataId).remove();
		});
	});

	// delete row
	$(document).ready(function() {

		// calculate values
		var totalRoundStone = 0;
		var totalBigStone = 0;
		var totalTbStone = 0;

		$('body').on('keyup', '.add_round_type_stone', function() { // calculating total_round_stones
			totalRoundStone = 0;

			$('input[data-stonetype="round_stone"][data-bangleSize="2.2"]').each(function() {
				totalRoundStone = totalRoundStone + parseInt($(this).val());
			});
			console.log(totalRoundStone);
			$("#total-round-stones").html(totalRoundStone);
		});

		$('body').on('keyup', '.add_round_type_stone', function() { // calculating total_big_stones
			totalRoundStone = 0;

			$('input[data-stonetype="round_stone"][data-bangleSize="2.2"]').each(function() {
				totalRoundStone = totalRoundStone + parseInt($(this).val());
			});
			console.log(totalRoundStone);
			$("#total-round-stones").html(totalRoundStone);
		});

		$('body').on('keyup', '.add_round_type_stone', function() { // calculating total_tb_stones
			totalRoundStone = 0;

			$('input[data-stonetype="round_stone"][data-bangleSize="2.2"]').each(function() {
				totalRoundStone = totalRoundStone + parseInt($(this).val());
			});
			console.log(totalRoundStone);
			$("#total-round-stones").html(totalRoundStone);
		});



		// change row type to stone type

		$('body').on('change', '.select-stone-dropdown', function() {
			
			var stoneType = $(this).val();

				switch(stoneType) {
				  	case 'ROUND STONE':
				    	$(this).closest('tr').find('input').attr('data-stonetype', 'round_stone');
				    break;
				  	case 'BIG STONE':
				    	$(this).closest('tr').find('input').attr('data-stonetype', 'big_stone');
				    break;
				  	case 'TB STONE':
				    	$(this).closest('tr').find('input').attr('data-stonetype', 'tb_stone');
				    break;
				    default:
				    	$(this).closest('tr').find('input').attr('data-stonetype', '');
				}
		});

	});
</script>
@endsection
