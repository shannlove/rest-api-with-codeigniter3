<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

/**
 * Modified original and implement Rest on users table
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          shankar kuamr
 * @email : shannlove@gmail.com
 * 
 */
class Users extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->methods['users_put']['limit'] = 50; // 50 requests per hour per user/key
	$this->load->model('user_model');
    }

    public function users_get()
    {
        $json=array('success'=>false);
        // Users from a data store e.g. database
        $users =$this->user_model->get_alls();

        $id = $this->get('id'); 

        // If the id parameter doesn't exist return all the users

        if ($id === NULL)
        {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($users)
            {
                $json=array('success'=>true,'users'=>$users,'status_code'=>REST_Controller::HTTP_OK,'message'=>'User found');
                // Set the response and exit
                $this->response($json, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                 $json=array('success'=>false,'status_code'=>REST_Controller::HTTP_NOT_FOUND,'message'=>'not found');
                $this->response($json, REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.
        else {
            $id = (int) $id;

            // Validate the id.
            if ($id <= 0)
            {
                // Invalid id, set the response and exit.
                $json=array('success'=>false,'status_code'=>REST_Controller::HTTP_BAD_REQUEST,'message'=>'User not found');
                $this->response($json, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }

            // Get the user from the array, using the id as key for retrieval.
            // Usually a model is to be used for this.

            $user = $this->user_model->get($id);
           

            if (!empty($user))
            {
                $json=array('success'=>true,'user'=>$user,'status_code'=>REST_Controller::HTTP_OK,'message'=>'User found');
                $this->set_response($json, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $json=array('success'=>false,'status_code'=>REST_Controller::HTTP_NOT_FOUND,'message'=>'not found');
                $this->set_response($json, REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
    }

    public function users_post()
    {
        $json=array('success'=>false);
        $post=$this->post(); 
       
        $user_id=$this->user_model->insert_entry($post);
        if($user_id){
            $json=array('success'=>true,'status_code'=>REST_Controller::HTTP_CREATED,'message'=>'User added');       
            $this->set_response($json, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
        }
    }
    public function users_put()
    {   
        $json=array('success'=>false);
	$post=$this->put();       
        
        $user_id=$this->user_model->update_entry($post);
        if($user_id){
            $json=array('success'=>true,'status_code'=>REST_Controller::HTTP_CREATED,'message'=>'User updated');       
            $this->set_response($json, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
        }
    }

    public function users_delete()
    {
        $json=array('success'=>false);
         $id = (int) $this->get('id'); 

        // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
             $json=array('success'=>false,'status_code'=>REST_Controller::HTTP_BAD_REQUEST,'message'=>'User not found');
            $this->response($json, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
        else {
            $bool=$this->user_model->delete_entry($id);
            if($bool){
                $json=array('success'=>true,'status_code'=>REST_Controller::HTTP_OK,'message'=>'User deleted');	

                $this->set_response($json, REST_Controller::HTTP_OK); // NO_CONTENT (204) being the HTTP response code
            }
        }
	
    }
	
}
