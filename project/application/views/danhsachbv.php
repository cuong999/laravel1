<!DOCTYPE html>
<html lang="en">
<head>
	<title>List Bài Viết</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?> "> 
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/animate/animate.css') ?> ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url('assets/vendor/select2/select2.min.css') ?> ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url('assets/vendor/perfect-scrollbar/perfect-scrollbar.css') ?>  ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url('assets/css/util.css') ?> ">
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url('assets/css/main.css') ?> ">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
					<div class="table">

						<div class="row header">
							<div class="cell">
								STT
							</div>
							<div class="cell">
								Tiêu Đề
							</div>
							<div class="cell">
								Hình Ảnh
							</div>
							<div class="cell edit">
								Sửa
							</div>
							<div class="cell">
								Xóa
							</div>
						</div>

						<div class="row">
							<div class="cell" data-title="Full Name">
								1
							</div>
							<div class="cell" data-title="Age">
								kjghfdgbcbcbcv
							</div>
							<div class="cell" data-title="Job Title">
								<img class="image-blog" src="<?php echo base_url('/upload/Crygirl1.jpg') ?>">
							</div>
							<!-- <div class="cell" data-title="Location">
								Washington
							</div> -->
							<div class="cell" data-title="Age">
								<a href="">Edit</a>
							</div>
							<div class="cell" data-title="Age">
								<a href="">Delete</a>
							</div>
						</div>

					</div>
			</div>
		</div>
	</div>


	

<!--===============================================================================================-->	
	<script src=" <?php echo base_url('assets/vendor/jquery/jquery-3.2.1.min.js') ?> "></script>
<!--===============================================================================================-->
	<script src=" <?php echo base_url('assets/vendor/bootstrap/js/popper.js') ?> "></script>
	<script src=" <?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js') ?> "></script>
<!--===============================================================================================-->
	<script src=" <?php echo base_url('assets/vendor/select2/select2.min.js') ?> "></script>
<!--===============================================================================================-->
	<script src=" <?php echo base_url('assets/js/main.js') ?> "></script>

</body>
</html>