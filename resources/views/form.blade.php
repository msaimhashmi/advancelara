<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Validation</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="d-flex justify-content-center mt-3">
				<div class="col-lg-4">
					<h2>Form validation with invisible captcha </h2>
					@if(count($errors) > 0)
						@foreach($errors->all() as $error)
							<p class="alert alert-danger">{{ $error }}</p>
						@endforeach
					@endif
					<form action="form" method="post" id="form">
						@csrf
						<div class="form-group mb-2">
							<input type="text" class="form-control" name="name">
						</div>
						<div class="form-group mb-2">
							<input type="email" class="form-control" name="email">
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-success">
							@captcha
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<script>
	{{-- FOR INVISIBLE CAPTCHA --}}
	$(document).ready(function(){
		// $('#form').submit();
	});
</script>
</body>
</html>