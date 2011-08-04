<?php 

class Service_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        
        $this->open311 = new open311Api();

    }
    function submit($options, $media_url){
    	$service_code = "";
     	if(isset($options['service_code'])) $service_code = $options['service_code'];
     	
	   	$options['media_url'] = $media_url;
	   	
    	$jurisdiction_id = $options['jurisdiction_id'];
    	unset($options['jurisdiction_id']);
    	
    	$response = $this->open311->post_service_request($jurisdiction_id,$service_code,$options);
    	try {
		   return @new SimpleXMLElement($response);
		} catch (Exception $e) {
		   error_log("Response is not XML");
		   error_log($response);
		   return false;
		}
    	
    }
}