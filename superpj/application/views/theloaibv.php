
<div class="news">
	<div class="col-md-9 list-news">
		<div class="list-news1"> <h4 class="news2">Tin Tức</h4> </div>
		<?php if (isset($dulieubv1)): ?>
		<div  class="clearfix"></div>		
		<div >
			<?php foreach ($dulieubv1 as $row) {?>
				
					<div class="col-md-4 news3">
						<div class="image3"><a href="<?php echo base_url()?>index.php/Welcome/baivietchitiet/<?php echo $row['url_bv']?>"><img src="<?php echo base_url();?>upload/<?php echo $row['hinhanh'];?>" class="image-news"></a></div>
						<div class="title"><a href="<?php echo base_url()?>index.php/Welcome/baivietchitiet/<?php echo $row['url_bv']?>"><h4><?php echo $row['tieude']; ?> </h4></a></div>
						<div><?php echo $row['mota']; ?></div>
					</div>	
			<?php } ?>				
		</div>
		<?php endif ?>	
	</div>
			
			