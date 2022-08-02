<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class UserModel extends CI_Model
{
    function __construct() 
    { 
        parent::__construct();
        $this->Table = 'usertable';
        $this->Primary_Key = "$this->Table.cust_id";
    }
	public function userlogin($email,$password)
	{ 
		$this->db->where("$this->Table.email",$email);
		$this->db->where("$this->Table.pswd",$password);
		return $this->db->get($this->Table)->row();
	}
	public function isPassword($email,$password)
	{
		$this->db->where("$this->Table.email",$email);
		$this->db->where("$this->Table.pswd",$password);
		return $this->db->get($this->Table)->row();
	}
    function delete($id)
    {
       $this->db->where('cust_id', $id);
       $this->db->delete("$this->Table"); 
        return true;
    }

	public function update($data,$cust_id)
    {
        $this->db->where("$this->Table.cust_id",$cust_id);
        $this->db->update("$this->Table", $data);
        return true;
    }
    public function updatebyEmail($data,$email)
    {
        $this->db->where("$this->Table.email",$email);
        $this->db->update("$this->Table", $data);
        return true;
    }
  
    
	public function updatepass($data,$email)
    {
        $this->db->where("$this->Table.email",$email);
        $this->db->update("$this->Table", $data);
        return true;
    }
    public function checkemail($email){
        
        $this->db->where("$this->Table.email", $email);
		return $this->db->get($this->Table)->row();
    }
    
    
    public function checkReferenceid($reference_id){
        
        $this->db->where("$this->Table.cust_id", $reference_id);
        $this->db->where("$this->Table.role !=", "user");
		return $this->db->get($this->Table)->row();
    }
    
    
    public function updatebyReferenceId($email){
        
        $this->db->where("$this->Table.email", $email);
		return $this->db->get($this->Table)->row();
    }
    
	public function getwhere($id)
	{
        $this->db->where("$this->Table.cust_id", $id);
		return $this->db->get($this->Table)->row();
    }
    
    
	public function where($data)
	{
		$this->db->select("*");
		$this->db->from($this->Table);
        $this->db->where($data);
        return $this->db->get()->result();
    }
    
    
	public function getAllData()
	{
		$this->db->select("*");
		$this->db->from($this->Table);
        return $this->db->get()->result();
	}
    
    public function insert($data){
        $this->db->insert("$this->Table", $data);
        return $this->db->insert_id();
	}
}