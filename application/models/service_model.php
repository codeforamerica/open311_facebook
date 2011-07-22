<?php 

class Service_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        
        $this->open311 = new open311Api();

    }
    function submit($options, $media_url){
    	$options['media_url'] = $media_url;
    	$jurisdiction_id = $options['jurisdiction_id'];
    	unset($options['jurisdiction_id']);
    	$service_code = $options['service_code'];
    	return new SimpleXMLElement($this->open311->post_service_request($jurisdiction_id,$service_code,$options));
    }
}