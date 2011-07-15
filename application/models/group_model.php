<?php 

class Group_model extends CI_Model {

    function __construct()
    {		
        // Call the Model constructor
        parent::__construct();
        
        $this->groups = array();
        
        $open311 = new open311Api();
        $services = new SimpleXMLElement($open311->get_service_list());	
        
        // create groups array
        // Open311 API lacking groups method!
		foreach($services as $service){	
			// get group name
			$group = (string) $service->group;
			// create a new sub-array if necessary
			if(!isset($this->groups[$group])){
				$this->groups[$group] = array();
			}		
			// add service to sub-array
			array_push($this->groups[$group], $service);
		}
		
    }
    
    function get($group)
    {
    	return $this->groups[$group];
    }
    
    function get_names()
    {
    	$names = array();
   		while(current($this->groups)){
			array_push($names, key($this->groups));
			next($this->groups);
		}
		return $names;
    }
}