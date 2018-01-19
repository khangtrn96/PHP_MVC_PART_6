<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slide_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('slide_model');
	}

	public function index()
	{
		$this->load->view('addData_view');
	}

	public function addSlide()
	{
		//lấy dữ liệu từ trường tên là slide_topbanner ra
		$dulieu=$this->slide_model->showData();
				// echo "<pre>";
				// var_dump($dulieu);
				// echo "</pre>";

		//giai ma json(tuy có thể mảng lấy ra không phải json nhưng cứ decode cho chắc)
		//Nếu $dulieu_giaima có giá trị là null thì nó không được hiểu là một mảng, nên không thể kết hợp một mảng với null
		$dulieu_giaima=json_decode($dulieu);

		//đưa biến $dulieu_giaima về dạng mảng bằng cách dùng vòng lệnh if
		if($dulieu_giaima==null){
			$dulieu_giaima=array();
		}

		//Viết hàm upload_file php(mà cụ thể ở đây là file ảnh)
		//Ta tạo một folder uploads cùng cấp với file application
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["slide_image"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["slide_image"]["tmp_name"]);
		    if($check !== false) {
		       // echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		       //echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    //echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["slide_image"]["size"] > 500000) {
		    //echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    //echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			//dòng if này có nghĩa giúp chuyển file ảnh từ địa chĩ vật lý sang địa chỉ mình muốn
		    if (move_uploaded_file($_FILES["slide_image"]["tmp_name"], $target_file)) {
		        //echo "The file ". basename( $_FILES["slide_image"]["name"]). " has been uploaded.";
		    } else {
		        //echo "Sorry, there was an error uploading your file.";
		    }
		}

		//them noi dung vao json dùng hàm array_push
		$title=$this->input->post('title');
		$description=$this->input->post('description');
		$button_link=$this->input->post('button_link');
		$button_text=$this->input->post('button_text');
		$slide_image= base_url()."uploads/".basename($_FILES["slide_image"]["name"]);

				// echo "<pre>";
				// var_dump($slide_image);
				// var_dump($description);
				// var_dump($button_text);
				// var_dump($button_link);
				// var_dump($title);
				// echo "</pre>";

		 $mot_slide_anh=array(
			'title'=>$title,
			'description'=>$description,
			'button_link'=>$button_link,
		 	'button_text'=>$button_text,
		 	'slide_image'=>$slide_image
		);

		array_push($dulieu_giaima, $mot_slide_anh);

		$dulieu_mahoa=json_encode($dulieu_giaima);
				// echo "<pre>";
				// var_dump($dulieu_mahoa);
				// echo "</pre>";
		 if( $this->slide_model->Update_newSlide($dulieu_mahoa)){
		 	$this->load->view('thanhcong_view');
		 }else{
		 	echo "Bạn cập nhật dữ liệu thất bại";
		 }
				 // echo "<pre>";
				 // var_dump($dulieu_mahoa);
				 // echo "</pre>";
		//mã hoá lại thành json
		//đưa dữ liệu mới vào, update lại dữ liệu
	}
}

/* End of file Slide_controller.php */
/* Location: ./application/controllers/Slide_controller.php */