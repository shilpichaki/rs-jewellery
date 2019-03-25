<form action="/design/add-design" method="POST" enctype="multipart/form-data">
	@csrf
	<input type="file" name="picture" placeholder="picture">
	<br>
	<input type="text" name="design_no" placeholder="design_no">
	<br>
	<input type="text" name="stones[0][size]" placeholder="stones[0][size]">
	<br>
	<input type="text" name="stones[0][type]" placeholder="stones[0][type]">
	<br>
	<input type="text" name="stones[0][quantity][0]" placeholder="stones[0][quantity][2.2]">
	<!-- <br> -->
	<input type="text" name="stones[0][quantity][1]" placeholder="stones[0][quantity][2.4]">
	<!-- <br> -->
	<input type="text" name="stones[0][quantity][2]" placeholder="stones[0][quantity][2.6]">
	<!-- <br> -->
	<input type="text" name="stones[0][quantity][3]" placeholder="stones[0][quantity][2.8]">
	<!-- <br> -->
	<input type="text" name="stones[0][quantity][4]" placeholder="stones[0][quantity][2.10]">
	<br>
	<input type="text" name="stones[0][price]" placeholder="stones[0][price]">
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