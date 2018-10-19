<div class="col-md-3 last-news">
		<div class="last-news1"> <h4 class="news2">Bài Viết Mới </h4> </div>
		<?php foreach ($blog1 as $row) {?>
		
			<div class=" news4">
				<div class="image3"><a href="<?php echo base_url()?>index.php/Welcome/baivietchitiet/<?php echo $row['url_bv']?>"><img src="<?php echo base_url() ?>/upload/<?php echo $row['hinhanh']; ?>" class="image-news"></a></div>
				<div><a href="<?php echo base_url()?>index.php/Welcome/baivietchitiet/<?php echo $row['url_bv']?>"><h4><?php echo $row['tieude']; ?></h4></a></div>
			</div>	
		<?php } ?>	
		</div> 	
	</div>
	<div class="paginate"><?php echo $this->pagination->create_links(); // tạo link phân trang  ?>
</div>	

<div id="muiten1" class="muiten2"><img class="muiten" src="<?php echo base_url()?>assets/image/muiten.jpeg" onclick="scrollToTop()"></div>
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
		
		//cuon trang

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
		  //scroll mui ten 
		  if (window.pageYOffset >= 150) {
		  	document.getElementById("muiten1").style.display = "block";
		  } 
		  else {
		  	document.getElementById("muiten1").style.display = "none";
		  }
		}

		function scrollToTop() {
			window.scrollTo(0, 0);
		}

	</script>

</body>
</html>