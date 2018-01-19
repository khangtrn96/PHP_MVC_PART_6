<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url() ?>1.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 push-sm-3">
				<h3 class="text-xs-center">Thêm mới slide</h3>
				<hr>
				<form method="POST" action="Slide_controller/addSlide" enctype="multipart/form-data">
					  <div class="form-group">
					    <label for="formGroupExampleInput">Tiêu đề slide</label>
					    <input name="title" type="text" class="form-control" id="Title" placeholder="Tiêu đề">
					  </div>
					  <div class="form-group">
					    <label for="formGroupExampleInput2">Mô tả slide</label>
					    <input name="description" type="text" class="form-control" id="description" placeholder="Mô tả slide">
					  </div>
					  <div class="form-group">
					    <label for="formGroupExampleInput2">Link của nút</label>
					    <input name="button_link" type="text" class="form-control" id="button_link" placeholder="MLink của nút">
					  </div>
					  <div class="form-group">
					    <label for="formGroupExampleInput2">Text của nút</label>
					    <input name="button_text" type="text" class="form-control" id="button_text" placeholder="Text của nút">
					  </div>
					  <div class="form-group">
					    <label for="formGroupExampleInput2">Upload Ảnh</label>
					    <input name="slide_image" type="file" class="form-control" id="slide_image" placeholder="Upload Ảnh">
					  </div>
					  <div class="form-group">
					    <input  type="submit" class="form-control btn btn-outline-info" id="submit">
					   </div>
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>