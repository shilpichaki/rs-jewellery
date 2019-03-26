@extends('layouts.master')

@section('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('css/design-aadhar.style.css')}}">
@endsection
@section('content')
	<form action="{{route('design.store-design')}}" method="POST" enctype="multipart/form-data">
		@csrf
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="row">
					<table class="table table-bordered" id="">
						<tbody>
						<tr>
							<td>Design Number:</td>
							<td><input type="number" name="design_no" required></td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-md-8 text-center" style="border: 1px solid #dee2e6">
				<div class="row">
					<h6 class="pt-3">Bangle Design</h6>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-2">
				<div class="row">
					<div class="preview img-wrapper"></div>
					<div class="file-upload-wrapper">
						<input type="file" name="picture" class="file-upload-native" id="picture"/>
						<input type="text" disabled placeholder="upload image" class="file-upload-text" />
					</div>
				</div>
			</div>
			<div class="col-md-10">
				<div class="row">
					<table class="table table-bordered" id="editableTable">
						<thead>
						<tr>
							<th>Stone Size</th>
							<th>Stone Type</th>
							<th>2.2</th>
							<th>2.4</th>
							<th>2.6</th>
							<th>2.8</th>
							<th>2.10</th>
							<th>Price</th>
							<th></th>
						</tr>
						</thead>
						<tbody id="append_parent">
						<tr>
							<td><input type="text" name="stones[0][size]"></td>
							<td>
								<select name="stones[0][type]" id="">
									<option value="BIG">BIG</option>
									<option value="ROUND">ROUND</option>
								</select>
							</td>
							<td><input type="text" name="stones[0][quantity][0]"></td>
							<td><input type="text" name="stones[0][quantity][1]"></td>
							<td><input type="text" name="stones[0][quantity][2]"></td>
							<td><input type="text" name="stones[0][quantity][3]"></td>
							<td><input type="text" name="stones[0][quantity][4]"></td>
							<td><input type="text" name="stones[0][price]"></td>
							<td>
								<button type="button" id="delete" class="btn btn-primary button button-small" title="Delete">
									<i class="fa fa-trash"></i>
								</button>
							</td>
						</tr>

						</tbody>
					</table>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-primary edit"><i class="fa fa-paper-plane"></i>&nbsp;&nbsp; Submit
				</button>
				<button type="button" class="btn btn-primary pull-right add-row" id="rowAddButton">
					<i class="fa fa-plus"></i>&nbsp;&nbsp; Add
					Row</button>
			</div>
		</div>
	</div>
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
@endsection

@section('js')
<script>
    $(document).ready(function () {
        var counter = 1;
        $("#rowAddButton").click(function () {
            var content = '<tr><td><input type="text" name="stones[' + counter +
                '][size]"></td><td><select name="stones['+counter+'][type]" id=""><option value="BIG">BIG</option><option value="ROUND">ROUND</option></select></td> <td><input type="text" name="stones['+ counter +'][quantity][0]"></td><td><input type="text" name="stones['+ counter +'][quantity][1]"></td><td><input type="text" name="stones['+ counter +'][quantity][2]"></td><td><input type="text" name="stones['+ counter +'][quantity][3]"></td><td><input type="text" name="stones['+ counter +'][quantity][4]"></td><td><input type="text" name="stones['+ counter +'][price]"></td><td><button type="button" class="btn btn-primary button button-small" title="Delete"><i class="fa fa-trash"></i></button></td></tr>';
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
</script>
@endsection
