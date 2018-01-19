<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class slide_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function showData()
	{
		//lấy tất cả các trường
		$this->db->select('*');

		$this->db->where('tenthuoctinh', 'slides_topbanner');

		$dulieu=$this->db->get('homepageattr');
		$dulieu_dangmang=$dulieu->result_array();
		foreach ($dulieu_dangmang as $value) {
			$temp=$value['giatrithuoctinh'];
		}
				 // echo "<pre>";
				 // var_dump($temp);
				 // echo "</pre>";
				 return $temp;
	}

	//Viết hàm cập nhật dữ liệu khi thêm mới
	public function Update_newSlide($dulieu_can_capnhat)
	{
		//tạo một mảng để lưu dữ liệu $dulieu_can_capnhat
		$dulieu_themmoi=array(
			'tenthuoctinh'=>"slides_topbanner",
			'giatrithuoctinh'=>$dulieu_can_capnhat
		);
		$this->db->where('tenthuoctinh', 'slides_topbanner');
		return $this->db->update('homepageattr', $dulieu_themmoi);
	}

}

/* End of file slide_model.php */
/* Location: ./application/models/slide_model.php */