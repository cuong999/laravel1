<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php foreach ($connect_table as $data){ ?> 
		<td><?php echo $data->id; ?></td> 
	      <td><?php echo $data->tieude; ?></td>  
	      <td><?php echo $data->hinhanh; ?></td>
	      <td><?php echo $data->mota; ?></td>
	      <td><?php echo $data->ten_danhmuc; ?></td>
	       <td><?php echo $data->url_bv; ?></td>
     
     <?php } ?> 
</body>
</html>