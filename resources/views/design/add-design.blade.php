@extends('layouts.master')

@section('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('css/design-aadhar.style.css')}}">
	<style>
		.table-bordered td {
		    width: 60px !important;
		}
		/*.blinkAnimation{
		    animation: blinkingText 2s infinite;
		}
		@keyframes blinkingText{
		    0%{     background-color: rgba(200, 240, 80, .9);    }
		    100%{   background-color: rgba(200, 240, 80, .0);    }
		}*/
	</style>
@endsection
@section('content')
@if($errors->any())
	@foreach ($errors->all('<p>:message</p>') as $input_error)
    {{ $input_error }}
  @endforeach 
@endif
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
	                    	<input type="text" class="form-control form-control-primary" value="" id="markup_percentage" name="markup_percentage">
                    	</div>
                    </div>
					<div class="col-sm-12">
                        <div class="row text-left">
		                    <label class="col-form-label ml-0"><b>Price(4 pcs)</b></label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                    	<div class="row">
		                    <input type="text" class="form-control form-control-primary" value="" id="price_5pc4" name="price_4pcs">
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
									<select class="form-control form-control-primary select-stone-dropdown" name="stones[0][stone_type]">
										<option value="">SELECT STONE</option>
										@foreach($stones as $stone)
											<option value="{{$stone}}">{{$stone}}</option>
										@endforeach
									</select>
								</td>
								<td>
									<select class="form-control form-control-primary" name="stones[0][stone_color]" id="">
										@foreach($colors as $color)
											<option value="{{$color}}">{{$color}}</option>
										@endforeach
									</select>
								</td>
								<td>
									<input data-stoneType="" data-bangleSize="2.2" class="form-control form-control-primary add_type_stone_22 form-disabler" disabled="" type="text" name="stones[0][quantity][0]" required pattern="\d+" title="">
								</td>
								<td>
									<input data-stoneType="" data-bangleSize="2.4" class="form-control form-control-primary add_type_stone_24 form-disabler" type="text" name="stones[0][quantity][1]" required pattern="\d+">
								</td>
								<td>
									<input data-stoneType="" data-bangleSize="2.6" class="form-control form-control-primary add_type_stone_26 form-disabler" type="text" name="stones[0][quantity][2]" required pattern="\d+">
								</td>
								<td>
									<input data-stoneType="" data-bangleSize="2.8" class="form-control form-control-primary add_type_stone_28 form-disabler" type="text" name="stones[0][quantity][3]" required pattern="\d+">
								</td>
								<td>
									<input data-stoneType="" data-bangleSize="2.10" class="form-control form-control-primary add_type_stone_210 form-disabler" type="text" name="stones[0][quantity][4]" required pattern="\d+">
								</td>
								<td>
									<input class="form-control form-control-primary" type="text" name="stones[0][stone_price]" required title="Example: 500.00, 1000.70">
								</td>
								<td>
									<input class="form-control form-control-primary" type="text" name="stones[0][labour_charge]" required title="Example: 500.00, 1000.70">
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
								<th class="text-center" colspan="6">TOTAL TYPEWISE STONE COUNT</th>
							</tr>
							<tr>
								<th>Stone type</th>
								<th class="text-center">2.2</th>
								<th class="text-center">2.4</th>
								<th class="text-center">2.6</th>
								<th class="text-center">2.8</th>
								<th class="text-center">2.10</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>ROUND STONES</td>
								<td class="text-right" id="total-round-stones-22">
									<input type="text" class="form-control form-control-primary" name="total_stone_count[round_stone][0]">
								</td>
								<td class="text-right" id="total-round-stones-24">
									<input type="text" class="form-control form-control-primary" name="total_stone_count[round_stone][1]">
								</td>
								<td class="text-right" id="total-round-stones-26">
									<input type="text" class="form-control form-control-primary" name="total_stone_count[round_stone][2]">
								</td>
								<td class="text-right" id="total-round-stones-28">
									<input type="text" class="form-control form-control-primary" name="total_stone_count[round_stone][3]">
								</td>
								<td class="text-right" id="total-round-stones-210">
									<input type="text" class="form-control form-control-primary" name="total_stone_count[round_stone][4]">
								</td>
							</tr>
							<tr>
								<td>BIG STONES</td>
								<td class="text-right" id="total-big-stones-22">
									<input type="text" class="form-control form-control-primary" name="total_stone_count[big_stone][0]">
								</td>
								<td class="text-right" id="total-big-stones-24">
									<input type="text" class="form-control form-control-primary" name="total_stone_count[big_stone][1]">
								</td>
								<td class="text-right" id="total-big-stones-26">
									<input type="text" class="form-control form-control-primary" name="total_stone_count[big_stone][2]">
								</td>
								<td class="text-right" id="total-big-stones-28">
									<input type="text" class="form-control form-control-primary" name="total_stone_count[big_stone][3]">
								</td>
								<td class="text-right" id="total-big-stones-210">
									<input type="text" class="form-control form-control-primary" name="total_stone_count[big_stone][4]">
								</td>
							</tr>
							<tr>
								<td>TB STONES</td>
								<td class="text-right" id="total-tb-stones-22">
									<input type="text" class="form-control form-control-primary" name="total_stone_count[tb_stone][0]">
								</td>
								<td class="text-right" id="total-tb-stones-24">
									<input type="text" class="form-control form-control-primary" name="total_stone_count[tb_stone][1]">
								</td>
								<td class="text-right" id="total-tb-stones-26">
									<input type="text" class="form-control form-control-primary" name="total_stone_count[tb_stone][2]">
								</td>
								<td class="text-right" id="total-tb-stones-28">
									<input type="text" class="form-control form-control-primary" name="total_stone_count[tb_stone][3]">
								</td>
								<td class="text-right" id="total-tb-stones-210">
									<input type="text" class="form-control form-control-primary" name="total_stone_count[tb_stone][4]">
								</td>
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
            content += 		'<select class="form-control form-control-primary select-stone-dropdown" name="stones['+counter+'][stone_type]" id="">';
            	content +=			'<option value="">SELECT STONE</option>'
	            @foreach($stones as $stone)
	            content += 			'<option value="{{$stone}}">{{$stone}}</option>';
				@endforeach
            content += 		'</select>';
            content += '</td>';
            content += '<td>';
            content += 		'<select class="form-control form-control-primary" name="stones['+counter+'][stone_color]" id="">';
	            @foreach($colors as $color)
	            content += 			'<option value="{{$color}}">{{$color}}</option>';
				@endforeach
            content += 		'</select>';
            content += '</td>';

            content += '<td>';
            content += 		'<input class="form-control form-control-primary add_type_stone_22 form-disabler" data-stoneType="" data-bangleSize="2.2" type="text" name="stones['+counter+'][quantity][0]" required pattern="\\d+" title="">';
            content += '</td>';
            content += '<td>';
            content += 		'<input class="form-control form-control-primary add_type_stone_24 form-disabler" data-stoneType="" data-bangleSize="2.4"  type="text" name="stones['+counter+'][quantity][1]" required pattern="\\d+">';
            content += '</td>';
            content += '<td>';
            content += 		'<input class="form-control form-control-primary add_type_stone_26 form-disabler" data-stoneType="" data-bangleSize="2.6"  type="text" name="stones['+counter+'][quantity][2]" required pattern="\\d+">';
            content += '</td>';
            content += '<td>';
            content += 		'<input class="form-control form-control-primary add_type_stone_28 form-disabler" data-stoneType="" data-bangleSize="2.8"  type="text" name="stones['+counter+'][quantity][3]" required pattern="\\d+">';
            content += '</td>';
            content += '<td>';
            content += 		'<input class="form-control form-control-primary add_type_stone_210 form-disabler" data-stoneType="" data-bangleSize="2.10"  type="text" name="stones['+counter+'][quantity][4]" required pattern="\\d+">';
            content += '</td>';
            content += '<td>';
            content += 		'<input class="form-control form-control-primary stone_add_foo" type="text" name="stones['+counter+'][stone_price]" required>';
            content += '</td>';
            content += '<td>';
            content += 		'<input class="form-control form-control-primary" type="text" name="stones['+counter+'][labour_charge]" required title="Example: 500.00, 1000.70">';
            content += '</td>';
            content += '<td>';
            content += 		'<button type="button" data-id="'+counter+'" class="delete_row_btn btn btn-primary button button-small" title="Delete"><i class="fa fa-trash"></i></button>';
            content += '</td>';
            content += '</tr>';

            $("#append_parent").append(content);

            formDisabler($("#add_stone_row_"+counter));

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

	// stone counting
	$(document).ready(function() {

		// calculate values
		var totalRoundStone22 = 0;
		var totalRoundStone24 = 0;
		var totalRoundStone26 = 0;
		var totalRoundStone28 = 0;
		var totalRoundStone210 = 0;

		var totalBigStone22 = 0;
		var totalBigStone24 = 0;
		var totalBigStone26 = 0;
		var totalBigStone28 = 0;
		var totalBigStone210 = 0;

		var totalTbStone22 = 0;
		var totalTbStone24 = 0;
		var totalTbStone26 = 0;
		var totalTbStone28 = 0;
		var totalTbStone210 = 0;

		$('body').on('keyup', '.add_type_stone_22', function() {
			totalRoundStone22 = 0;
			totalBigStone22 = 0;
			totalTbStone22 = 0;

			var inputValue = 0;

			$('input[data-stonetype="round_stone"][data-bangleSize="2.2"]').each(function() { // calculating total_round_stones_2.2

				inputValue = $(this).val() == '' ? 0 : $(this).val();
				inputValue = parseInt(inputValue);

				totalRoundStone22 += inputValue;
			});

			$('input[data-stonetype="big_stone"][data-bangleSize="2.2"]').each(function() { // calculating total_big_stones_2.2

				inputValue = $(this).val() == '' ? 0 : $(this).val();
				inputValue = parseInt(inputValue);

				totalBigStone22 += inputValue;
			});

			$('input[data-stonetype="tb_stone"][data-bangleSize="2.2"]').each(function() { // calculating total_tb_stones_2.2

				inputValue = $(this).val() == '' ? 0 : $(this).val();
				inputValue = parseInt(inputValue);

				totalTbStone22 += inputValue;
			});

			$("#total-round-stones-22").find('input').val(totalRoundStone22);
			$("#total-big-stones-22").find('input').val(totalBigStone22);
			$("#total-tb-stones-22").find('input').val(totalTbStone22);
		});

		$('body').on('keyup', '.add_type_stone_24', function() { // calculating total_round_stones_2.4
			totalRoundStone24 = 0;
			totalBigStone24 = 0;
			totalTbStone24 = 0;

			var inputValue = 0;

			$('input[data-stonetype="round_stone"][data-bangleSize="2.4"]').each(function() { // calculating total_round_stones_2.4

				inputValue = $(this).val() == '' ? 0 : $(this).val();
				inputValue = parseInt(inputValue);

				totalRoundStone24 += inputValue;
			});

			$('input[data-stonetype="big_stone"][data-bangleSize="2.4"]').each(function() { // calculating total_big_stones_2.4

				inputValue = $(this).val() == '' ? 0 : $(this).val();
				inputValue = parseInt(inputValue);

				totalBigStone24 += inputValue;
			});

			$('input[data-stonetype="tb_stone"][data-bangleSize="2.4"]').each(function() { // calculating total_tb_stones_2.4

				inputValue = $(this).val() == '' ? 0 : $(this).val();
				inputValue = parseInt(inputValue);

				totalTbStone24 += inputValue;
			});

			$("#total-round-stones-24").find('input').val(totalRoundStone24);
			$("#total-big-stones-24").find('input').val(totalBigStone24);
			$("#total-tb-stones-24").find('input').val(totalTbStone24);
		});

		$('body').on('keyup', '.add_type_stone_26', function() { // calculating total_round_stones_2.6
			totalRoundStone26 = 0;
			totalBigStone26 = 0;
			totalTbStone26 = 0;

			var inputValue = 0;

			$('input[data-stonetype="round_stone"][data-bangleSize="2.6"]').each(function() { // calculating total_round_stones_2.6

				inputValue = $(this).val() == '' ? 0 : $(this).val();
				inputValue = parseInt(inputValue);

				totalRoundStone26 += inputValue;
			});

			$('input[data-stonetype="big_stone"][data-bangleSize="2.6"]').each(function() { // calculating total_big_stones_2.6

				inputValue = $(this).val() == '' ? 0 : $(this).val();
				inputValue = parseInt(inputValue);

				totalBigStone26 += inputValue;
			});

			$('input[data-stonetype="tb_stone"][data-bangleSize="2.6"]').each(function() { // calculating total_tb_stones_2.6

				inputValue = $(this).val() == '' ? 0 : $(this).val();
				inputValue = parseInt(inputValue);

				totalTbStone26 += inputValue;
			});

			$("#total-round-stones-26").find('input').val(totalRoundStone26);
			$("#total-big-stones-26").find('input').val(totalBigStone26);
			$("#total-tb-stones-26").find('input').val(totalTbStone26);
		});

		$('body').on('keyup', '.add_type_stone_28', function() { // calculating total_round_stones_2.8
			totalRoundStone28 = 0;
			totalBigStone28 = 0;
			totalTbStone28 = 0;

			var inputValue = 0;

			$('input[data-stonetype="round_stone"][data-bangleSize="2.8"]').each(function() { // calculating total_round_stones_2.8

				inputValue = $(this).val() == '' ? 0 : $(this).val();
				inputValue = parseInt(inputValue);

				totalRoundStone28 += inputValue;
			});

			$('input[data-stonetype="big_stone"][data-bangleSize="2.8"]').each(function() { // calculating total_big_stones_2.8

				inputValue = $(this).val() == '' ? 0 : $(this).val();
				inputValue = parseInt(inputValue);

				totalBigStone28 += inputValue;
			});

			$('input[data-stonetype="tb_stone"][data-bangleSize="2.8"]').each(function() { // calculating total_tb_stones_2.8

				inputValue = $(this).val() == '' ? 0 : $(this).val();
				inputValue = parseInt(inputValue);

				totalTbStone28 += inputValue;
			});

			$("#total-round-stones-28").find('input').val(totalRoundStone28);
			$("#total-big-stones-28").find('input').val(totalBigStone28);
			$("#total-tb-stones-28").find('input').val(totalTbStone28);
		});

		$('body').on('keyup', '.add_type_stone_210', function() { // calculating total_round_stones_2.10
			totalRoundStone210 = 0;
			totalBigStone210 = 0;
			totalTbStone210 = 0;

			var inputValue = 0;

			$('input[data-stonetype="round_stone"][data-bangleSize="2.10"]').each(function() { // calculating total_round_stones_2.10

				inputValue = $(this).val() == '' ? 0 : $(this).val();
				inputValue = parseInt(inputValue);

				totalRoundStone210 += inputValue;
			});

			$('input[data-stonetype="big_stone"][data-bangleSize="2.10"]').each(function() { // calculating total_big_stones_2.10

				inputValue = $(this).val() == '' ? 0 : $(this).val();
				inputValue = parseInt(inputValue);

				totalBigStone210 += inputValue;
			});

			$('input[data-stonetype="tb_stone"][data-bangleSize="2.10"]').each(function() { // calculating total_tb_stones_2.10

				inputValue = $(this).val() == '' ? 0 : $(this).val();
				inputValue = parseInt(inputValue);

				totalTbStone210 += inputValue;
			});

			$("#total-round-stones-210").find('input').val(totalRoundStone210);
			$("#total-big-stones-210").find('input').val(totalBigStone210);
			$("#total-tb-stones-210").find('input').val(totalTbStone210);
		});

		// change row type to stone type

		$('body').on('change', '.select-stone-dropdown', function() {
			
			var stoneType = $(this).val();

			if(stoneType != '') {
				parentTr = $(this).closest('tr');
				formEnabler(parentTr);
			} else {
				formDisabler(parentTr);
			}

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

	$(document).ready(function() {
        formDisabler($("#add_stone_row_0"));
	});

	function formDisabler(parentElement)
	{
		var childs = parentElement.find(".form-disabler");
		
		childs.prop('disabled', true);
	}

	function formEnabler(parentElement)
	{
		var childs = parentElement.find(".form-disabler");
		
		childs.prop('disabled', false);
	}
</script>
@endsection
