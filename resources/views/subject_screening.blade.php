<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Subject Screening</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>

	<div class="container mt-5" style="width: 50%;">
		@isset($result)
		<div class="alert alert-success" role="alert">
		    {{$result}}
		</div>
		<a href="/screenings">All Subjects</a>
		@endisset
	</div>

	@if(!isset($result))
	<div class="container mt-5" style="width: 50%;">
		<form class="form-horizontal" method="POST" action="/screening">
			<legend>Please fill the information</legend>
			@csrf
			<div class="mb-3">
				<label class="form-label" for="first_name">First Name</label>
				<input class="form-control 	@if ($errors->has('first_name')) is-invalid @endif" type="text" id="first_name" name="first_name" value="{{old('first_name')}}">
				<div class="invalid-feedback">
			      	{{$errors->first('first_name')}}
			    </div>
			</div>

			<div class="mb-3">
				<label class="form-label" for="dob">Date of Birth</label>
				<input class="form-control @if ($errors->has('dob')) is-invalid @endif" type="date" id="dob" name="dob" value="{{old('dob')}}">
				<div class="invalid-feedback">
			      	{{$errors->first('dob')}}
			    </div>
			</div>

			<div class="mb-3"> 
				<label class="form-label" for="frequency">How frequent are migraine headaches. </label>
				<select class="form-control @if ($errors->has('frequency')) is-invalid @endif" name="frequency" id="frequency" onchange="check()">
					<option value="">Select</option>
					<option value="daily" {{ (old('frequency')=='daily') ? 'selected' : '' }} >Daily</option>
					<option value="weekly" {{ (old('frequency')=='weekly') ? 'selected' : '' }}> Weekly</option>
					<option value="monthly" {{ (old('frequency')=='monthly') ? 'selected' : '' }}>Monthly</option>
				</select>
				<div class="invalid-feedback">
			      	{{$errors->first('frequency')}}
			    </div>
			</div>

			<div class="mb-3"> 
				<section id="daily_select">
					<label class="form-label" for="daily_frequency">How frequent are migraine headaches if they are daily.</label>
					<select class="form-control @if ($errors->has('daily_frequency')) is-invalid @endif"  name="daily_frequency" id="daily_frequency" disabled>
						<option value="">Select</option>
						<option value="1-2" {{ (old('daily_frequency')=='1-2') ? 'selected' : '' }}>1-2</option>
						<option value="3-4" {{ (old('daily_frequency')=='3-4') ? 'selected' : '' }}> 3-4</option>
						<option value="5+" {{ (old('daily_frequency')=='5+') ? 'selected' : '' }}>5+</option>
					</select>
					<div class="invalid-feedback">
				      	{{$errors->first('daily_frequency')}}
				    </div>
				</section>
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
	@endif

	<script type="text/javascript">
		var frequency = document.getElementById("frequency");
		var dailyFrequency = document.getElementById("daily_frequency");
		if (frequency.value  == 'daily' || dailyFrequency.value) {
			dailyFrequency.disabled = false;
		}

		function check() {
			var frequency = document.getElementById("frequency").value;	
			var dailyFrequency = document.getElementById("daily_frequency");
			if (frequency == 'daily') {
				dailyFrequency.disabled = false;
			} else {
				dailyFrequency.disabled = true;
			}
		}
	</script>
</body>
</html>