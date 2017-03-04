<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public $name;
        public $email;
        public $link;
        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
	
	public function get($user_id)
        {	
		$this->db->where('user_id',$user_id);
                $query = $this->db->get('users');
                return $query->row();
        }
        public function get_alls($where=array(),$start=false,$limit=false)
        {       $this->db->where($where);
                if($limit){
                     $this->db->limit($start,$limit);
                }
                $this->db->order_by('user_id','desc');
                $query = $this->db->get('users');
                return $query->result();
        }

        public function insert_entry($post)
        {
                $this->name    = $post['name']; 
                $this->email  = $post['email'];
                $this->link     = $post['link'];

                $this->db->insert('users', $this);
		return $this->db->insert_id();
        }

        public function update_entry($post)
        {
               $this->name    = $post['name']; 
                $this->email  = $post['email'];
                $this->link     = $post['link'];

                $this->db->update('users', $this, array('user_id' => $post['user_id']));
		if($this->db->affected_rows()){
			return true;
		} else {
			return false;
		}
        }
	public function delete_entry($user_id)
        {
             	$this->db->where('user_id',$user_id);
                $this->db->delete('users');
		if($this->db->affected_rows()){
			return true;
		} else {
			return false;
		}
        }

}
