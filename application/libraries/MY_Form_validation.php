<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * Additional validations for URL format.
 *
 * @package      Module Creator
 * @subpackage  ThirdParty
 * @category    Libraries
 * @author  Anup Shakya 
 * @created 01/10/2013
 */
 
class MY_Form_validation extends CI_Form_validation{
     
   public function __construct()
   {
     parent::__construct();
    }  
                         
    /**
     * Validate URL format
     *
     * @access  public
     * @param   string
     * @return  string
     */
    function valid_url_format($str){
        $pattern = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";
        if (!preg_match($pattern, $str)){
            $this->set_message('valid_url_format', 'The URL you entered is not correctly formatted.');
            return FALSE;
        }
 
        return TRUE;
    }       
 
    // --------------------------------------------------------------------
     
 
    /**
     * Validates that a URL is accessible. Also takes ports into consideration. 
     * Note: If you see "php_network_getaddresses: getaddrinfo failed: nodename nor servname provided, or not known" 
     *          then you are having DNS resolution issues and need to fix Apache
     *
     * @access  public
     * @param   string
     * @return  string
     */
    function url_exists($url){                                   
        $url_data = parse_url($url); // scheme, host, port, path, query
        if(!fsockopen($url_data['host'], isset($url_data['port']) ? $url_data['port'] : 80)){
            $this->set_message('url_exists', 'The URL you entered is not accessible.');
            return FALSE;
        }               
         
        return TRUE;
    }  
}
// END Form Validation Class

/* End of file My_Form_validation.php */
/* Location: ./application/libraries/My_Form_validation.php */
