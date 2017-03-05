<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "Curl_api.php";
class Welcome extends Curl_api {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
                $json=$this->getUserList();
                
                if($json['success']){
                    $this->layout->data['users']=$json['users'];
                   
                } else {
                    $this->layout->data['users']=array();
                }
		$this->layout->render();
	}
        public function delete($id)
	{
              
              $json=$this->deleteUser($id);
               if($json['success']){
                    $this->session->set_flashdata("success","User deleted Successfully!");
                } else {
                    $this->session->set_flashdata("success","User not deleted Successfully!");
                }
              
              redirect('welcome/index');
	}
        public function edit($id)
	{
                $json=$this->getUser($id);
                
                if($json['success']){
                    $this->layout->data['user']=$json['user'];
                } else {
                        $this->session->set_flashdata("success","User not found!");
                        redirect("welcome/index");
                }
                
                $this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');
                if($_POST){
                    $original_value=$json['user']['email'];
                    if($this->input->post('email') != $original_value) {
                        $is_unique =  '|is_unique[users.email]';
                     } else {
                        $is_unique =  '';
                     }
                    $this->layout->data['user']=array(
                            'user_id'=>$id,
                            'name'=>$this->input->post('name'),
                            'email'=>$this->input->post('email'),
                            'link'=>$this->input->post('link'),
                        );    
                    $this->form_validation->set_rules('name', 'name', 'required');             

                    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email'.$is_unique);
                    $this->form_validation->set_rules('link', 'Link', 'trim|required|valid_url_format');

                    if ($this->form_validation->run() == FALSE)
                    {
                        
                    }
                    else
                    {
                        $post=$this->input->post();
                        
                        $response=$this->updateUser($id,$post);
                        if($response['success']){
                            $this->session->set_flashdata("success","User Updated Successfully!");
                        } else {
                            $this->session->set_flashdata("success","User not Updated Successfully!");
                        }
                        redirect("welcome/index");

                    }
                }
		$this->layout->render();
	}
        
        public function add()
	{
                
                $this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');
                if($_POST){
                    $this->layout->data['user']=array(
                           
                            'name'=>$this->input->post('name'),
                            'email'=>$this->input->post('email'),
                            'link'=>$this->input->post('link'),
                        );    
                    $this->form_validation->set_rules('name', 'name', 'required');             

                    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
                    $this->form_validation->set_rules('link', 'Link', 'trim|required|valid_url_format');

                    if ($this->form_validation->run() == FALSE)
                    {
                        
                    }
                    else
                    {
                        $post=$this->input->post();
                        
                        $response=$this->addUser($post);
                        if($response['success']){
                            $this->session->set_flashdata("success","User added Successfully!");
                        } else {
                            $this->session->set_flashdata("success","User not added Successfully!");
                        }                   
                      
                        redirect("welcome/index");

                    }
                }
		$this->layout->render();
	}
}       
