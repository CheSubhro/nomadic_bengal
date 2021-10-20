<?php 
class General_model extends CI_Model{
	
	function __construct() 
	{
        parent::__construct();
    }   

   public function show_data_id($table_name,$id,$fieldname,$action,$data){
		if($action=='get'){
			if(($id !='') && ($fieldname!='')&& ($data=='')){
				$this->db->select ('*'); 
				$this->db->from($table_name);
				$this->db->where($fieldname,$id);
			}else{
				$this->db->select ('*'); 
				$this->db->from($table_name);
			}
			$query = $this->db->get();
			$result = $query->result();
			return $result;
		  }
	    if($action=='insert'){
		$return = $this->db->insert($table_name, $data);
		  if ((bool) $return === TRUE) {
			return $this->db->insert_id();
		   }else {
			return $return;
		  }       
	    }
	    if($action=='update'){
		$this->db->where($fieldname, $id);
		$return=$this->db->update($table_name, $data);
		return $return;
	     }
	    if($action=='delete'){
		$this->db->where($fieldname, $id);
		$this->db->delete($table_name);
	      }
        }
    
   public function getAllData($table_name,$primary_key,$wheredata,$limit,$start)
   {
		if(@$limit!='' || @$start!='')
		{
			$this->db->order_by('id', 'DESC');
			$this->db->limit($limit, $start);
		}
		$this->db->select ('*'); 
		$this->db->from($table_name);
		if($primary_key=='' && $wheredata=='')
		{
			$where='1=1';
		}
		else
		{
			$this->db->where($primary_key,$wheredata);
		}
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	
	}

	public function record_count()
	{
		return $this->db->count_all("product");
	}

	public function fetch_products($limit, $start)
	{
		$this->db->limit($limit, $start);
		$query = $this->db->get("product");
		
		if ($query->num_rows() > 0) 
		{
           foreach ($query->result() as $row) 
           {
               $data[] = $row;
           }
           return $data;
        }
           return false;
	}

	function search($name)
	{
		$query = $this->db->query("SELECT * FROM product WHERE product_name LIKE ('$name%')");
	    return $query->result();
	}

	function alldistnict($table_name,$primary_key,$wheredata,$limit,$start)
	{
		if(@$limit!='' || @$start!='')
		{
			$this->db->limit($limit, $start);
		}
		$this->db->distinct();
		$this->db->select ($primary_key); 
		$this->db->from($table_name);
		
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function insertdata($data = array())
	{
		$insert = $this->db->insert_batch('destination_gallary',$data);
		return $insert?TRUE:FALSE;
	}
	
	public function excel_product_insert($data)
    {
        $this->db->insert_batch('product', $data);
    }

    
}
?>
