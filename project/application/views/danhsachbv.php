<!DOCTYPE html>
<html lang="en">
<head>
	<title>List Bài Viết</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css "> 
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url(); ?>/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url(); ?>/assets/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url(); ?>/assets/css/util.css ">
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url(); ?>/assets/css/main.css ">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">

			<div class="wrap-table100">
					<div class="addbv"><a href="<?php echo base_url();?>index.php/welcome/logout">Logout</a></div>
					<div class="table">

						<div class="row header">
							<div class="cell">
								ID
							</div>
							<div class="cell title">
								Tiêu Đề
							</div>
							<div class="cell">
								Hình Ảnh
							</div>
							<div class="cell">
								Thể Loại
							</div>
							<div class="cell edit">
								Sửa
							</div>
							<div class="cell">
								Xóa
							</div>
						</div>

						<?php foreach ($blog as $row) {?>
						<div class="row">
							<div class="cell" data-title="Full Name">
								<?php echo $row->id; ?>
							</div>
							<div class="cell" data-title="Age">
								<?php echo $row->tieude; ?>
							</div>
							<div class="cell" data-title="Job Title">
								<img class="image-blog" src="<?php echo base_url(); ?>upload/<?php echo $row->hinhanh; ?>">
							</div>
							<div class="cell" data-title="Location">
								<?php echo $row->ten_danhmuc; ?>
							</div>
							<div class="cell" data-title="Age">
								<a href="<?php echo base_url(); ?>index.php/Welcome/showedit/<?php echo $row->id?>">Edit</a>
							</div>
							<div class="cell" data-title="Age">
								<a  onClick="return confirm('Bạn vẫn muốn xóa chứ?')" href="<?php echo base_url(); ?>index.php/Welcome/delete/<?php echo $row->id?>">Delete</a>
							</div>
						</div>
						<?php } ?>
					</div>
					<div>
					<div class="addbv"><a href="<?php echo base_url();?>index.php/welcome/showAddBlog">Thêm Bài Viết</a></div>
			</div>
		</div>
	</div>


	

<!--===============================================================================================-->	
	<script src=" <?php echo base_url(); ?>/assets/vendor/jquery/jquery-3.2.1.min.js "></script>
<!--===============================================================================================-->
	<script src="  <?php echo base_url(); ?>/assets/vendor/bootstrap/js/popper.js') "></script>
	<script src=" <?php echo base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.min.js') "></script>
<!--===============================================================================================-->
	<script src=" <?php echo base_url(); ?>/assets/vendor/select2/select2.min.js')  "></script>
<!--===============================================================================================-->
	<script src=" <?php echo base_url(); ?>/assets/js/main.js') "></script>

</body>
</html>