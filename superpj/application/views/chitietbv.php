
		<div class="news">
			<div class="col-md-9 list-news">
			
			<h2><?php echo $dulieubv['tieude']  ?> </h2>
			<p> <?php echo $dulieubv['chitiet_tin'] ?></p>
				
			</div>
			<div class="col-md-3 last-news">
				<div class="last-news1"> <h4 class="news2">Bài Viết Mới </h4> </div>
				<?php foreach ($blog1 as $row) {?>
				
					<div class=" news">
						<div class="image3"><a href="<?php echo base_url()?>index.php/Welcome/baivietchitiet/<?php echo $row['url_bv']?>"><img src="<?php echo base_url() ?>upload/<?php echo $row['hinhanh']; ?>" class="image-news"></a></div>
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