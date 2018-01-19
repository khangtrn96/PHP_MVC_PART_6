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
				<form method="POST" action="<?= base_url() ?>Edit_slide/eedit_slide" enctype="multipart/form-data">
				<?php $stt=0 ?>	
				<?php foreach ($mang_dulieu as $value): ?>
					<?php $stt++ ?>
						
						<h1> Đây là slide thứ <?= $stt ?></h1>
						  <div class="form-group">
						    <label for="formGroupExampleInput">Tiêu đề slide</label>
						    <input name="title[]" type="text" class="form-control" id="Title" value="<?= $value['title'] ?>">
						  </div>
						  <div class="form-group">
						    <label for="formGroupExampleInput2">Mô tả slide</label>
						    <input name="description[]" type="text" class="form-control" id="description" value="<?= $value['description'] ?>">
						  </div>
						  <div class="form-group">
						    <label for="formGroupExampleInput2">Link của nút</label>
						    <input name="button_link[]" type="text" class="form-control" id="button_link" value="<?= $value['button_link'] ?>">
						  </div>
						  <div class="form-group">
						    <label for="formGroupExampleInput2">Text của nút</label>
						    <input name="button_text[]" type="text" class="form-control" id="button_text" value="<?= $value['button_text'] ?>">
						  </div>

						  <div class="form-group">
						    <label for="formGroupExampleInput2">Upload Ảnh</label>
						    <!-- Tạo cách xem ảnh để chỉnh sửa -->
							<input name="slide_image_old[]" type="hidden" class="form-control" id="button_text" value="<?= $value['slide_image'] ?>">

						    <img src="<?= $value['slide_image'] ?>" alt="" width="40%">
						    <input name="slide_image[]" type="file" >
						  </div>
						  
					<?php endforeach ?>
							<div class="form-group">
							    <input  type="submit" class="form-control btn btn-outline-info" id="submit" value="Lưu">
							</div>
					</form>
				
			</div>
		</div>
	</div>
	
</body>
</html>