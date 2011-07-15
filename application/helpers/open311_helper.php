<?php

// params: service_list
// returns: array of group arrays of service objects
function group_services($services){
	$groups = array();
	foreach($services as $service){	
		// get group name
		$group = (string) $service->group;
		// create a new sub-array if necessary
		if(!isset($groups[$group])){
			$groups[$group] = array();
		}		
		// add service to sub-array
		array_push($groups[$group], $service);
	}
	return $groups;
}