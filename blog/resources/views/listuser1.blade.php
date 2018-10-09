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
		.logout:hover a{
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
				<select onchange="window.location.href=this.value;">
					<option value="/listup"> Theo Tên </option>
					<option value="/dangky"> Theo STT </option>
					<option value="/listuser"> Mặc Định  </option>
				</select>
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
							@foreach ($nameshort as $listuser)
								<tr>
									<td class="column1"> {{ $listuser->ten }} </td>
									<td class="column2"> {{ $listuser->email }} </td>
									<td class="column5"> {{$listuser ->gioitinh}}   </td>
									<td class="column6"> {{$listuser ->id}}</td>
									<td class="column2"> <a href="/update/{{  $listuser->id }} ">Edit</a> </td>
									<td class="column2"> <a href=" /delete/{{ $listuser->id }} "  onClick="return confirm('Bạn vẫn muốn xóa chứ?')" >Delete</a></td>
								</tr>
							@endforeach		
						</tbody>
					</table>
				</div>
				<div class="logout"> <a href="/logout">Logout</a></div>
			</div>
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