<form action="/design/add-design" method="POST" enctype="multipart/form-data">
	@csrf
	<input type="file" name="picture">
	<button>Submit</button>
</form>