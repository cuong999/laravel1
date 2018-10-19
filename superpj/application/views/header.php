<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang Chủ</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css " integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="  <?php echo base_url('assets/OwlCarousel/dist/assets/owl.carousel.min.css') ?> ">
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url('assets/css/style.css') ?> ">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src=" <?php echo base_url('assets/OwlCarousel/dist/owl.carousel.min.js') ?>  "></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
</head>
<body>
	<div class="container-fluid all">
		<div>
			<div class="banner">
				<div class="col-md-6 banner1">
					<a href="<?php echo base_url()?>index.php"><img class="logo" src=" <?php echo base_url('assets/image/logo.png') ?>"></a>
				</div>
			</div>
			<div class="menu" id="menu1">
				<ul>
					<li><a href="<?php echo base_url()?>index.php">Home</a></li>					
					<?php foreach ($menu as $row) {?>	
						<li><a href="<?php echo base_url()?>index.php/Welcome/showbaiviet/<?php echo $row['url_danhmuc']?> "> <?php echo $row['ten_danhmuc'];?> </a>  </li>
					<?php } ?>
					
				</ul>
			</div>
		</div>
		<div>
			<div class="owl-carousel">
				<div class="quangcao">
					<img src="<?php echo base_url('assets/image/quangcao.jpg') ?>" class="img-quangcao">
				</div>
				<div class="quangcao">
					<img src="<?php echo base_url('assets/image/quangcao.jpg') ?>" class="img-quangcao">
				</div>
				<div class="quangcao">
					<img src="<?php echo base_url('assets/image/quangcao.jpg') ?>" class="img-quangcao">
				</div>
				<div class="quangcao">
					<img src="<?php echo base_url('assets/image/quangcao.jpg') ?>" class="img-quangcao">
				</div>
				<div class="quangcao">
					<img src="<?php echo base_url('assets/image/quangcao.jpg') ?>" class="img-quangcao">
				</div>
			</div>
		</div>