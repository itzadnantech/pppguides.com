<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MainModel extends CI_Model
{
    function __construct() 
    { 
        parent::__construct();
    }
    
    public function insert($data,$table){
        $this->db->insert("$table", $data);
        return $this->db->insert_id();
	}
    
 	public function deleterow($cust_id,$table)
    {
        $this->db->where("$table.cust_id",$cust_id);
        $this->db->delete($table);
        return true;
    }
    
 	public function deleteRows($colName,$value,$table)
    {
        $this->db->where("$table.$colName",$value);
        $this->db->delete($table);
        return true;
    }
    
	public function update($data,$cust_id,$table)
    {
        $this->db->where("$table.cust_id",$cust_id);
        $this->db->update("$table", $data);
        return true;
    }
    public function updatewhere($data,$id,$col_name,$table)
    {
        $this->db->where("$table.$col_name",$id);
        $this->db->update("$table", $data);
        return true;
    }
    
    
	public function getrow($id,$col_name,$table)
	{
		$this->db->select("*");
        $this->db->from($table);
        $this->db->where($col_name,$id);
        return $this->db->get()->row();
    }
    
    
	public function updateSales($data,$reference_id,$sales_id,$table)
    {
        $this->db->where("$table.reference_id",$reference_id);
        $this->db->where("$table.sales_id",$sales_id);
        
        $this->db->set($data);
        $this->db->update("$table");
        return true;
    }
    
    
     	public function updateUserSalesRefData($data,$data1,$cust_id)
    {
        $this->db->where("cust_id",$cust_id);
        $this->db->update("companytable", $data);
        $this->db->where("cust_id",$cust_id);
        $this->db->update("usertable", $data1);
        return true;
    }
    
    
    	public function updatebyReferenceId($data,$reference_id,$table)
    {
        $this->db->where("$table.reference_id",$reference_id);
        $this->db->update("$table", $data);
        return true;
    }
    
	public function getwhere($cust_id,$table)
	{ 
        $this->db->where("$table.cust_id",$cust_id);
		return $this->db->get("$table")->row();
    }
    
    
	public function get_where($data,$table)
	{ 
        $this->db->where($data);
		return $this->db->get("$table")->row();
    }
    
    
	public function getXMLData($searchstring,$table){ 
	    $this->db->select('*');
	    if($table=='payrolltable'||$table=='nonpayrolltable'||$table=='ownertable'){
            $this->db->from($table);
            $this->db->join('companytable', "companytable.cust_id = $table.cust_id");
	    }
	    else{
            $this->db->from('companytable');
	    }
        $this->db->join('loantable', 'companytable.cust_id = loantable.cust_id');
        $this->db->join('usertable', 'companytable.cust_id = usertable.cust_id');
        $searcharray=explode("&", $searchstring);
       
        foreach($searcharray as $key){
            $searchvalue=explode('=',$key);
            
            if($searchvalue[1] != ""){
                if($searchvalue[0] == "loan_amount1"){
                    $this->db->where("loan_amount >=", $searchvalue[1]);
                }
                else if($searchvalue[0] == "loan_amount2"){
                    $this->db->where("loan_amount <=", $searchvalue[1]);
                }
                else if($searchvalue[0] == "date1"){
                   // $this->db->where("date >=", $searchvalue[1]);
                }
                else if($searchvalue[0] == "date2"){
                   // $this->db->where("date <=", $searchvalue[1]);
                }
                else if($searchvalue[0] == "email"){
                    $searchvalue[1] = str_replace("%40", "@", $searchvalue[1]);
                    $this->db->like("$searchvalue[0]", $searchvalue[1]);
                }
                else{
                    $this->db->like("$searchvalue[0]", $searchvalue[1]);
                }
            }
            
        }
        return $this->db->get()->result();
    }
    

	public function getPriceGroup($price_group)
	{
		$this->db->select("*");
        $this->db->from('priceplantable');
        $this->db->where("plan_group_id",$price_group);
        $this->db->order_by("plan_id","asc");
        return $this->db->get()->result();
    }
    
    
    
	public function getPayments($cust_id)
	{
		$this->db->select("*");
        $this->db->from('paymenttable');
        $this->db->where("cust_id",$cust_id);
        return $this->db->get()->result();
    }
    
    
    
	public function getAdminData($cust_id)
	{
		$this->db->select("*");
        $this->db->from('usertable');
        $admin_row =$this->db->get()->row();
        $admin_row->ws_name=$this->getParentPricePlan($admin_row->cust_id)->ws_name;
        return $admin_row;
    }






    public  function search($allChilds,$searchstring){
        $no_ws_name_data= $this->searchandreturn($allChilds,$searchstring);
        $searcharray=explode("&", $searchstring);
       $ws_name="";
        foreach($searcharray as $key){
            $searchvalue=explode('=',$key);
            if($searchvalue[0] === "ws_name"){
                    if($searchvalue[1] != ""){
                        $ws_name = $searchvalue[1];
                    }
            }
        }
        if($no_ws_name_data!=NULL){
            foreach($no_ws_name_data as $key=>$record){
                if($ws_name!=""){
                    $or_ws_name=$this->getParentPricePlan($record->cust_id)->ws_name;
                    if (strpos(strtolower($or_ws_name), strtolower($ws_name)) !== false) {
                        $record->ws_name=$or_ws_name;
                    }else{
                        unset($no_ws_name_data[$key]);
                    }
                
                }else{
                    
                    $record->ws_name=$this->getParentPricePlan($record->cust_id)->ws_name;
                }
                
            }
        }
        return $no_ws_name_data;
    }
    
    Public function searchandreturn($allChilds,$searchstring){
        $cust_array=array();
       // echo gettype($allChilds);
        foreach($allChilds as $child){
            if($child->role=="user"){
              array_push($cust_array, $child->cust_id);
            }
        }
        //print_r($cust_array);
        if(count($cust_array)>0){
        $this->db->select('*'); 
        $this->db->select_sum('paymenttable.paid_amount');
        $this->db->from('companytable');
        $this->db->join('loantable', 'companytable.cust_id = loantable.cust_id');
        $this->db->join('usertable', 'loantable.cust_id = usertable.cust_id');
        $this->db->join('paymenttable', 'usertable.cust_id =paymenttable.cust_id');
        
        $this->db->group_by("paymenttable.cust_id");
        $searcharray=explode("&", $searchstring);
       
        foreach($searcharray as $key){
            $searchvalue=explode('=',$key);
            if($searchvalue[1] != ""&&$searchvalue[0] !== "ws_name"){
           // echo $searchvalue[0]."   ".$searchvalue[1];
                if($searchvalue[0] === "loan_amount1"){
                    $this->db->where("loan_amount >=", "$searchvalue[1]");
                }
                else if($searchvalue[0] === "loan_amount2"){
                    $this->db->where("loan_amount <=", $searchvalue[1]);
                }
                else if($searchvalue[0] === "date1"){
                   // $this->db->where("date >=", $searchvalue[1]);
                }
                else if($searchvalue[0] === "date2"){
                   // $this->db->where("date <=", $searchvalue[1]);
                }
                else if($searchvalue[0] === "email"){
                    $searchvalue[1] = str_replace("%40", "@", $searchvalue[1]);
                    $this->db->like("$searchvalue[0]", $searchvalue[1]);
                }
                
                else if($searchvalue[0] === "cust_id"){
                    $this->db->where("usertable.cust_id", $searchvalue[1]);
                }
                else{
                    $this->db->like("$searchvalue[0]", $searchvalue[1]);
                }
            }
        }
        $this->db->where_in("usertable.cust_id",$cust_array);
       // echo $this->db->_compile_select();
       $result=$this->db->get()->result();
        return $result;
        
        }
        else{
            return NULL;
        }
    }
    
    
    public function updateFile($data,$cust_id,$page,$table)
    {
        $this->db->where("$table.cust_id",$cust_id);
        $this->db->where("$table.group_id",$page);
        $this->db->update("$table", $data);
        return true;
    }
    
    public function getFileWhere($id,$page,$table)
	{
        $this->db->select('*'); 
        $this->db->from($table);
        $this->db->where("$table.cust_id", $id);
        $this->db->where("$table.group_id",$page);
        return $this->db->get()->result();
    }
    function delete($data,$table)
    {
       $this->db->where($data);
       $this->db->delete($table); 
        return true;
    }

    public function fetchAllData($cust_id,$table)
	{
		$this->db->select("*");
        $this->db->from($table);
        if($cust_id!=-2){
        $this->db->where("$table.reference_id", $cust_id);
        }
        return $this->db->get()->result();
	}
	
	
    public function fetchschemployeeData($cust_id,$table)
	{
		$this->db->select("*");
        $this->db->from($table);
        $this->db->where("$table.cust_id", $cust_id);
        return $this->db->get()->result();
	}
	
	public function adminSalesIdExists($sales_id,$reference_id){
	    $this->db->select("*");
        $this->db->from('salestable');
        $this->db->where("sales_id",$sales_id);
        $this->db->where("reference_id",$reference_id);
        return $this->db->get()->row();
	}
	
	public function getPricePlan($reference_id)
	{
		$this->db->select("*");
        $this->db->from('wholesalertable');
        $this->db->where("fk_wholesaler_id",$reference_id);
        return $this->db->get()->row();
    }
    
    public function getParentPricePlan($reference_id) {
        $this->db->where(array("fk_wholesaler_id"=>$reference_id));
        $this->db->from('wholesalertable');
        $query =$this->db->get()->row();
        
        if (count((array)$query)<1||strlen($query->price_group) < 1) {
              return $this->getParentPricePlan($this->getrefofref($reference_id));
           
        } else {
             return $query;
        }
        
    }
    public function getrefofref($reference_id){
        
        $this->db->where(array("cust_id"=>$reference_id));
        $this->db->from('usertable');
        return $this->db->get()->row()->reference_id;
    }
	

    public function getChildRecords($admin_id,&$records) {
        $this->db->where(array("reference_id"=>$admin_id));
        $this->db->from("usertable");
        
        $query =$this->db->get()->result();
        if (count($query) > 0) {
           foreach ($query as $record) {
              $record->searched="no";
              array_push($records, $record);
           }
           $recordCount=count($records);
           for($i=0;$i<$recordCount;$i++){
               if ($records[$i]->searched=="no"){
                    $records[$i]->searched ="yes";
                 return $this->getChildRecords($records[$i]->cust_id,$records);
               }
           }
           
        } else {
               $recordCount=count($records);
               for($i=0;$i<$recordCount;$i++){
                   if ($records[$i]->searched=="no"){
                        $records[$i]->searched ="yes";
                     return $this->getChildRecords($records[$i]->cust_id,$records);
                   }
               }
             return $records;
        } 
        
    }
    
    	public function getDatabyReferenceId($reference_id)
	{
	    
		$this->db->select("*");
	    $this->db->from('salestable');
       $this->db->join('usertable', 'usertable.reference_id = salestable.reference_id');
        $this->db->where("salestable.reference_id",$reference_id);
        return $this->db->get()->result();
	}
    
    	public function getDatabyrs($reference_id,$sales_id)
	{
	    
		$this->db->select("*");
	    $this->db->from('salestable');
        $this->db->where("salestable.reference_id",$reference_id);
        $this->db->where("salestable.sales_id",$sales_id);
        return $this->db->get()->row();
	}
	
		public function getDataofUser($cust_id)
	{
	    
		$this->db->select("*");
	    $this->db->from('usertable');
	    $this->db->join('companytable', 'companytable.cust_id = usertable.cust_id');
	    $this->db->where("usertable.cust_id",$cust_id);
	    $row= $this->db->get()->row();
	    $reference_id=$row->reference_id;
	    $company_name=$row->business_name;
	    $cust_id=$row->cust_id;
	    $first_name=$row->first_name;
	    
	    
        $this->db->select("*");
	    $this->db->from('companytable');
        $this->db->where("companytable.cust_id",$cust_id);
        $sales_id= $this->db->get()->row()->sales_id;
        $data=array(
            "reference_id"=>$reference_id,
            "company_name"=>$company_name,
            "cust_id"=>$cust_id,
            "old_sales_id"=>$sales_id,
            "first_name"=>$first_name
            );
        
        return $data;
        
	}
    
    
    
	public function getDatabyrsc($reference_id,$sales_id,$cust_id)
	{
	    
		$this->db->select("*");
	    $this->db->from('salestable');
        $this->db->join('companytable', 'salestable.sales_id = companytable.sales_id');
        $this->db->join('usertable', 'companytable.cust_id = usertable.cust_id');
        $this->db->where("salestable.reference_id",$reference_id);
        $this->db->where("salestable.sales_id",$sales_id);
        $this->db->where("usertable.cust_id",$cust_id);
        return $this->db->get()->row();
	}
    
}