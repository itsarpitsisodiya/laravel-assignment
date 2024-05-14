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

	<div class="container mt-5" style="width: 80%;">
		<table class="table">
			<thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Name</th>
			      <th scope="col">Date of Birth</th>
			      <th scope="col">Frequency</th>
			      <th scope="col">Daily Frequency</th>
			      <th scope="col">Med</th>
			      <th scope="col">Date</th>
			    </tr>
			</thead>
			<tbody>
				@foreach ($subjects as $subject)
			    <tr>
			      <th scope="row">{{$subject['id']}}</th>
			      <td>{{$subject['first_name']}}</td>
			      <td>{{date('d-M-Y', strtotime($subject['dob']))}}</td>
			      <td>{{ucfirst($subject['frequency'])}}</td>
			      <td>{{($subject['daily_frequency']) ?? 'N/A'}}</td>
			      <td>{{($subject['med']) ?? 'N/A'}}</td>
			      <td>{{date(DATE_COOKIE, strtotime($subject['created_at']))}}</td>
			    </tr>
			    @endforeach
			</tbody>
		</table>
	</div>
</body>
</html>