<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $dulieubv['tieude'];  ?></title>
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
					<a href="<?php echo base_url()?>index.php""><img class="logo" src=" <?php echo base_url('assets/image/logo.png') ?>"></a>
				</div>
			</div>
			<div class="menu">
				<ul id="menu1">				
					<li><a href="<?php echo base_url()?>index.php"> Home</a></li>	
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
		<div class="news">
			<div class="col-md-9 list-news">
			
			<h2><?php echo $dulieubv['tieude']  ?> </h2>
			<p> <?php echo $dulieubv['chitiet_tin'] ?></p>
				
			</div>
			<div class="col-md-3 last-news">
				<div class="last-news1"> <h4 class="news2">Bài Viết Mới </h4> </div>
				<?php foreach ($blog1 as $row) {?>
				
					<div class=" news">
						<div><a href="<?php echo base_url()?>index.php/Welcome/baivietchitiet/<?php echo $row['url_bv']?>"><img src="<?php echo base_url('assets/image/dantri.jpg') ?>" class="image-news"></a></div>
						<div><a href="<?php echo base_url()?>index.php/Welcome/baivietchitiet/<?php echo $row['url_bv']?>"><h4><?php echo $row['tieude']; ?></h4></a></div>
					</div>	
				<?php } ?>		
			</div>
		</div>
		<div  class="clearfix"></div>	
		<div class="footer">
			<p>Copyring by Cuong Dao</p>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
	  	$(".owl-carousel").owlCarousel({
	  		autoplay: true,
        	loop: true,
        	items: 5,
        	margin:20,
	  	});
	});
		window.onscroll = function() {myFunction()};

		var navbar = document.getElementById("menu1");
		var sticky = navbar.offsetTop; //lay vi tri cua menu

		function myFunction() {
			//so sanh voi height scroll cuon trang neu lon hoac bang thi add class sticky
		  if (window.pageYOffset >= sticky) {
		    navbar.classList.add("sticky")
		  } else {
		    navbar.classList.remove("sticky");
		  }
		}
	</script>
</body>
</html>