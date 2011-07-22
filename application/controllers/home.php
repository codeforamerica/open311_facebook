<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index()
	{	
		$this->load->model('group_model');
		$this->group = new Group_model();

		if($data['group_names'] = $this->group->get_names()):
				
		$this->load->view('header', $data);
		$this->load->view('web/home', $data);
		$this->load->view('footer');
		
		else:
			$this->load->view('header', $data);
			$this->load->view('web/error', $data);
			$this->load->view('footer');	
		endif;
	}
	
	public function submit()
	{
		$this->load->model('service_model');
		$this->load->helper('s3');
		
		//check whether a file was submitted
		if(isset($_FILES['fileupload'])){			
			$s3 = new S3();	
			$s3->putBucket(AMAZON_S3_BUCKET, S3::ACL_PUBLIC_READ);
			
			if ($s3->putObjectFile($_FILES['fileupload']['tmp_name'], "open311_facebook", $_FILES['fileupload']['name'], S3::ACL_PUBLIC_READ)) {
				$media_url = "http://open311_facebook.s3.amazonaws.com/" . $_FILES['fileupload']['name'];
			}else{
				$data['error_title'] = "File upload error";
				$data['error_message'] = "There was an error uploading your file.  Please try again.";
				$this->load->view('header');
				$this->load->view('web/error', $data);
				$this->load->view('footer');
				return;
			}
		}
		
		$service = new Service_model();
		if($data['response'] = $service->submit($this->input->post(), $media_url)){
			$this->load->view('header');
			$this->load->view('web/success', $data);
			$this->load->view('footer');
		}else{
			$data['error_title'] = "Connection Error";
			$data['error_message'] = "There was an error connecting to ".CITY_NAME." Open311.  Please check back later.";
			$this->load->view('header');
			$this->load->view('web/error', $data);
			$this->load->view('footer');
		}
		
	}

	// ----- AJAX ------- //
	
	public function get_services_selector($group){
		$this->load->model('group_model');
		$this->group = new Group_model();

		if($group == "null") return;
		$group = str_replace("_"," ",$group);
		$services = $this->group->get($group);
		if(sizeof($services) == 1): ?>
			<input type="hidden" value="<?=$services[0]?>" />
			<p id="<?=$services[0]->service_code?>_description" class="description"><?=$services[0]->description?></p>
		<? else:
			?>
			<label for="service_code">Service</label>
			<select name="service_code">
				<option value="null">-- Select a Service --</option><?
			foreach($services as $service): ?>
				<option value="<?=$service->service_code?>"><?=str_replace("_"," ",$service->service_name)?></option>
			<? endforeach; ?>
			</select>
			<? foreach($services as $service): ?>
				<p id="<?=$service->service_code?>_description" class="invisible description"><?=$service->description?></p>
			<? endforeach;
		endif;
	}

	
}
