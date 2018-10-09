<!DOCTYPE html>
<html lang="en">
<head>
	<title>Listuser</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href=" {{asset('Listuser/images/icons/favicon.ico')}}   "/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" {{asset('Listuser/vendor/bootstrap/css/bootstrap.min.css')}} ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" {{asset('Listuser/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}} ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" {{asset('Listuser/vendor/animate/animate.css')}} ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" {{asset('Listuser/vendor/select2/select2.min.css')}}  ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" {{asset('Listuser/vendor/perfect-scrollbar/perfect-scrollbar.css')}} ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" {{asset('Listuser/ css/util.css')}} ">
	<link rel="stylesheet" type="text/css" href=" {{asset('Listuser/css/main.css')}} ">
<!--===============================================================================================-->
	<style type="text/css">
		.logout{
			width: 100%;
			text-align: right;
		}
		.logout a{
			color: red;
			font-size: 30px;
		}
		.logout a:hover{
			color: yellow;

		}
		.column2:hover a{
			color: red;
		}
	</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				@if(isset($listuser))
					<select onchange="window.location.href=this.value;">
						<option value="/listuser"> Mặc Định </option>
						<option value="/listup"> Theo Tên </option>
					</select>
				@else
					<select onchange="window.location.href=this.value;">
						<option value="/listup"> Theo Tên </option>
						<option value="/listuser"> Mặc Định </option>
					</select>
				@endif	
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Name</th>
								<th class="column2">Email</th>
								<th class="column5">Giới Tính</th>
								<th class="column6">Total</th>
								<th class="column2">Sửa</th>
								<th class="column2">Xóa</th>
							</tr>
						</thead>
						<tbody>
							@if(isset($listuser))
								@foreach ($listuser as $listuserx)
									<tr>
										<td class="column1"> {{ $listuserx->ten }} </td>
										<td class="column2"> {{ $listuserx->email }} </td>
										<td class="column5"> {{ $listuserx ->gioitinh}}   </td>
										<td class="column6"> {{ $listuserx ->id}}</td>
										<td class="column2"> <a href="/update/{{  $listuserx->id }} ">Edit</a> </td>
										<td class="column2"> <a href=" /delete/{{ $listuserx->id }} "  onClick="return confirm('Bạn vẫn muốn xóa chứ?')">Delete</a></td>
									</tr>
								@endforeach	


							@else
								@foreach ($nameshort as $listusers)
								<tr>
									<td class="column1"> {{ $listusers->ten }} </td>
									<td class="column2"> {{ $listusers->email }} </td>
									<td class="column5"> {{$listusers ->gioitinh}}   </td>
									<td class="column6"> {{$listusers ->id}}</td>
									<td class="column2"> <a href="/update/{{  $listusers->id }} ">Edit</a> </td>
									<td class="column2"> <a href=" /delete/{{ $listusers->id }} "  onClick="return confirm('Bạn vẫn muốn xóa chứ?')" >Delete</a></td>
								</tr>

								@endforeach
							@endif
							

						</tbody>
					</table>
				</div>
				<div class="logout"> <a href="/logout">Logout</a></div>
			</div>


		</div>
		<div>
			@if(isset($listuser))	
			{{ $listuser->links() }}
			@else
			{{ $nameshort->links() }}
			@endif
		</div>
		
	</div>



	

<!--===============================================================================================-->	
	<script src=" {{asset('Listuser/vendor/jquery/jquery-3.2.1.min.js')}}  "></script>
<!--===============================================================================================-->
	<script src=" {{asset('Listuser/vendor/bootstrap/js/popper.js')}} "></script>
	<script src="  {{asset('Listuser/vendor/bootstrap/js/bootstrap.min.js')}} "></script>
<!--===============================================================================================-->
	<script src=" {{asset('Listuser/vendor/select2/select2.min.js')}} "></script>
<!--===============================================================================================-->
	<script src=" {{asset('Listuser/js/main.js')}} "></script>

</body>
</html>