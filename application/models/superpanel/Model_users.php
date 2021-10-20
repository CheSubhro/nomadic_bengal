<?php 
 class Model_users extends CI_Model{
 	
    public function login($data) {
		$condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . md5($data['password']) . "'";
		$this->db->select('*');
		$this->db->from('admin_details');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		return $result = $query->row_array();
	
		// if ($query->num_rows() == 1) {

		//     //Admin Access
  //           $id=$query->result_array();
  //           $this->session->set_userdata('access_id',$id[0]["id"]);
  //           //End Admin Access

		// 	return true;
		// } else {
		// 	return false;
		// }
	} 
	 
	public function can_log_in(){
		$this->db->where('UserName',$this->input->post('username'));
		$this->db->where('UserPassword',md5($this->input->post('password')));
		$query=$this->db->get('admin_detail');
		$result = $query->result();
		return $result;
		/*if($query->num_rows()==1){
			return true;
		}else{
			return false;
		}*/
	} 
	
	
	 
	 
	public function checkOldPass($old_password,$id){
		$this->db->select('*');
		$this->db->where('AdminId', $id);
		$this->db->where('UserPassword', $old_password);
		$query = $this->db->get('admin_detail');
		$result = $query->result();
		return $result;
	}
	function show_pass()
	{
		$sql ="select * from admin_detail where AdminId=1 ";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
	public function saveNewPass($new_pass,$id){
		$data = array(
			   'UserPassword' => $new_pass
			);
		$this->db->where('AdminId', $id);
		$this->db->update('admin_detail', $data);
		return true;
		print $this->db->last_query();
	}
	
	
}



?>