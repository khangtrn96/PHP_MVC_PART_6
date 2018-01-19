<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit_slide extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('slide_model');
	}

	public function index()
	{
		//lấy dữ liệu từ CSDL mySQL
		$dulieu=$this->slide_model->showData();
				// echo "<pre>";
				// var_dump($dulieu);
				// echo "</pre>";
		
		//biến JSON thành mảng
		$dulieu_giaima=json_decode($dulieu,true);
		//truyền $dulieu_giaima vào edit_view. Lưu ý trước khi truyền ta nên đưa nó vào một mảng
		$mang_dulieu_giaima=array('mang_dulieu'=>$dulieu_giaima);
				// echo "<pre>";
				// var_dump($mang_dulieu_giaima);
				// echo "</pre>";
		$this->load->view('edit_view', $mang_dulieu_giaima, FALSE);
		


		//Sau khi chuyển thành mảng, ta truyền mảng này sang view
	}

	//Viết contructor edit_slide cho việc chỉnh sửa dữ liệu
	public function eedit_slide()
	{
		$title=$this->input->post('title');//đây là mảng cái title
		$description=$this->input->post('description');//đây là mảng các description
		$button_link=$this->input->post('button_link');//đây là mảng các button_link
		$button_text=$this->input->post('button_text');//đây là mảng các button_text

		//lấy về tất cả các ảnh, rôi upload len
		$cacanh=$_FILES['slide_image']['name'];
		//Hàm $_FILES['slide_image']['tmp_name'] là hàm mặc định dùng để lưu file ảnh vào đĩa chị vật lý
		$filevatly = $_FILES['slide_image']['tmp_name'];//file thật nhưng được mã hoá dưới dạng file tmp (fie tạm)
		$slide_image_old=$this->input->post('slide_image_old');
				// echo "<pre>";
				// var_dump($slide_image_old);
				// echo "</pre>";
		$slide_image=array();

		//duyệt mảng để lấy tên từng file
		for($i=0 ; $i<count($filevatly) ; $i++)
		{
					// echo "<pre>";
					// var_dump($cacanh[$i]);
					// echo "</pre>";
					// echo "<pre>";
					// var_dump($filevatly[$i]);
					// echo "</pre>";
					//dòng lệnh giúp kiểm tra phần tử thứ i của biến $cacanh có rỗng không
					if(empty($cacanh[$i]))
					{
						//nếu rỗng thì cho phần tử thứ i của biến $cacanh=""
						$slide_image[$i]=$slide_image_old[$i];
					}else
					{
						$duongdan='uploads/'.$cacanh[$i];
						//nếu không rỗng thì lập tức chuyển file ảnh về thư mục mà mình muốn
						//lưu ý: $filevatly = $_FILES['slide_image']['tmp_name']
						move_uploaded_file($filevatly[$i], $duongdan);
						$slide_image[$i]=base_url().'uploads/'.$cacanh[$i];
					}
		}

		 // echo "<pre>";
		 // var_dump($title);
		 // echo "</pre>";
		//Lúc này $slide_image chứa toàn bộ đĩa chỉ ảnh

				// echo "<pre>";
				// var_dump($filevatly);
				// echo "</pre>";
				
		//tạo một mảng "tatcaslide"
		 $tatcaslide=array();
		 for ($i = 0; $i <count($title) ; $i++) {
			$tem =array();
		 	$tem['title']=$title[$i];
		 	$tem['description']=$description[$i];
		 	$tem['button_link']=$button_link[$i];
		 	$tem['button_text']=$button_text[$i];
		 	$tem['slide_image']=$slide_image[$i];
		 	array_push($tatcaslide, $tem);
		 };
		 		// echo "<pre>";
		 		// var_dump($tatcaslide);
		 		// echo "</pre>";
		//insert từng phần tử vào trong tatcaslide
		//đưa thành json
		$tatcaslide_mahoa=json_encode($tatcaslide);
		//gọi model update du lieu
		$this->load->model('slide_model');
		if($this->slide_model->Update_newSlide($tatcaslide_mahoa)){
			$this->load->view('thanhcong_view');
		}else
		{
			echo "that bai";
		}




				// echo "<pre>";
				// var_dump($description);
				// echo "</pre>";
	}
}

/* End of file Edit_slide.php */
/* Location: ./application/controllers/Edit_slide.php */