<?php
Class Api_Model extends CI_Model {
  
  function __construct(){
    parent::__construct();
  }


  public function insertRecord($table = NULL, $data = NULL){
    if($data == NULL || $table == NULL){
      return false;
    }else{
      $this->db->insert($table, $data);
      $id = $this->db->insert_id(); //get id of last inserted record.
      if($id > 0){
          return $id;
      } else {
          return false;
      }
    }
  }

  public function updateRecord($table = NULL, $data = NULL, $where = array()){
    if($data == NULL || $table == NULL || empty($where)){
      return false;
    }else{
      $this->db->where( $where );
      $this->db->update($table, $data);
      //print_r($this->db->last_query());exit;
      if($this->db->affected_rows() > 0){
          return true;
      } else {
          return false;
      }
    }
  }

  public function deleteRecord($table = NULL, $whereField = NULL, $whereValue = NULL){
    if($table == NULL || $whereField == NULL || $whereValue == NULL){
      return false;
    }else{
      $this->db->where($whereField, $whereValue);
      $this->db->delete($table);
      if($this->db->affected_rows() > 0){
          return true;
      } else {
          return false;
      }
    }    
  }

  function getRows($table,$columns,$where=array(),$other_condition="", $order_by = "", $sort_type = "", $limit = 0, $offset = 0, $group_by="", $join_array = array(), $in_array_key ='', $in_array_val = array()) {
    
    $this->db->select($columns);
    $this->db->from($table);
    if ($join_array) {
        foreach ($join_array as $join) {
          if (!isset($join['type'])) {
              $this->db->join($join['table'], $join['condition']);
          } else {
              $this->db->join($join['table'], $join['condition'], $join['type']);
          }
        }
    }
  
    if ($where) {
        $this->db->where($where);
    }
  
    if ($other_condition) {
        $this->db->where($other_condition);
    }
    if ($in_array_key !='' && !empty($in_array_val)) {
      $this->db->where_in($in_array_key, $in_array_val);
    }
    
  
    if($group_by != '') {
        $this->db->group_by($group_by);
    }
  
    if($order_by!='' && $sort_type!='') {
        $this->db->order_by($order_by, $sort_type);
    }
  
    if ($limit) {
        $this->db->limit($limit, $offset);
    }
  
    $query = $this->db->get();
    $numofrecords = $query->num_rows();
  
    if($numofrecords> 0) {
        return $query->result_array();
    } else {
        return false;
    }
  }
  
  function getRow($table,$columns,$where=array(),$other_condition="", $order_by = "", $sort_type = "", $limit = 0, $offset = 0, $group_by="", $join_array = array()) {
    $this->db->select($columns);
    $this->db->from($table);
    if ($join_array) {
        foreach ($join_array as $join) {
            if (!isset($join['type'])) {
                $this->db->join($join['table'], $join['condition']);
            } else {
                $this->db->join($join['table'], $join['condition'], $join['type']);
            }
        }
    }
    
    if ($where) {
        $this->db->where($where);
    }
    
    if ($other_condition) {
        $this->db->where($other_condition);
    }
    
    if($group_by != '') {
        $this->db->group_by($group_by);
    }
    
    if($order_by!='' && $sort_type!='') {
        $this->db->order_by($order_by, $sort_type);
    }
    
    if ($limit) {
        $this->db->limit($limit, $offset);
    }
    
    $query = $this->db->get();
    $numofrecords = $query->num_rows();
    
    if($numofrecords> 0) {
        return $query->row_array();
    }
    else {
        return false;
    }
  }
  
  function getVal($table,$columns,$where=array(),$other_condition="", $order_by = "", $sort_type = "", $limit = 0, $offset = 0, $join_array = array()) {
    $this->db->select($columns);
    $this->db->from($table);
    if ($join_array) {
        foreach ($join_array as $join) {
            if (!isset($join['type'])) {
                $this->db->join($join['table'], $join['condition']);
            } else {
                $this->db->join($join['table'], $join['condition'], $join['type']);
            }
        }
    }
    
    if ($where) {
        $this->db->where($where);
    }
    
    if ($other_condition) {
        $this->db->where($other_condition);
    }
    
    if($order_by!='' && $sort_type!='') {
        $this->db->order_by($order_by, $sort_type);
    }
    
    if ($limit) {
        $this->db->limit($limit, $offset);
    }
    
    
    $query = $this->db->get();
    $numofrecords = $query->num_rows();
    
    if($numofrecords> 0) {
        foreach ($query->row() as $onefield) {
            return $onefield;
        }
    } else {
        return false;
    }
  }
  function getRowCount($table,$columns,$where=array(),$other_condition="", $order_by = "", $sort_type = "", $limit = 0, $offset = 0, $join_array = array(),$group_by = "") {
      $this->db->select($columns);
      $this->db->from($table);
      if ($join_array) {
          foreach ($join_array as $join) {
              if (!isset($join['type'])) {
                  $this->db->join($join['table'], $join['condition']);
              } else {
                  $this->db->join($join['table'], $join['condition'], $join['type']);
              }
          }
      }

      if ($where) {
          $this->db->where($where);
      }

      if ($other_condition) {
          $this->db->where($other_condition);
      }

      if($order_by!='' && $sort_type!='') {
          $this->db->order_by($order_by, $sort_type);
      }

      if ($limit) {
          $this->db->limit($limit, $offset);
      }
      if($group_by != '') {
          $this->db->group_by($group_by);
      }

      $query = $this->db->get();
      $numofrecords = $query->num_rows();

      if($numofrecords> 0) {
          return $numofrecords;
      } else {
          return 0;
      }
  }

  function deleteAll($table,$where) {
    $this->db->where($where);
    $del = $this->db->delete($table);
    if($del) {
      return true;
    } else{
      return false;
    }
  }

  
}
?>