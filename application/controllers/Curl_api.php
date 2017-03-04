<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Curl_api extends CI_Controller {

    private function Curl($data, $url, $type) {               
		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		if ($data !== null) {
                        curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					'Content-Type: application/json'
					)
			   );
		$response = curl_exec($ch);
		
		$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		curl_close($ch);
                
		return $response;
	}
        public function getUserList() {
		$url = base_url() . 'api/users/users';
		$type = "GET";
		$json_data_string = null;
		$result = $this->Curl($json_data_string, $url, $type);
                $result=json_decode($result,true);    
               
		return $result;
	}
        public function deleteUser($id) {
		$url = base_url() . 'api/users/users/id/'.$id;
		$type = "DELETE";
		$json_data_string = null;
		$result = $this->Curl($json_data_string, $url, $type);
                $result=json_decode($result,true);    
               
		return $result;
	}
        public function getUser($id) {
		$url = base_url() . 'api/users/users/id/'.$id;
		$type = "GET";
		$json_data_string = null;
		$result = $this->Curl($json_data_string, $url, $type);
                $result=json_decode($result,true);    
               
		return $result;
	}
        public function updateUser($id,$post) {
		
           $url = base_url() . 'api/users/users';
            $type = "PUT";
            $data_string = array(  
                            'user_id'=>$id,
                            "name" => $post['name'],
                            "email" => $post['email'],
                            "link" => $post['link'],
                            );
             
            $json_data_string = json_encode($data_string);
            
            $result = $this->Curl($json_data_string, $url, $type);
		
		return $result;
	}
        public function addUser($post) {
		
            $url = base_url() . 'api/users/users';
            $type = "POST";
            $data_string = array(                             
                            "name" => $post['name'],
                            "email" => $post['email'],
                            "link" => $post['link'],
                            );
             
            $json_data_string = json_encode($data_string);
           
            $result = $this->Curl($json_data_string, $url, $type);
		
		return $result;
	}

}
