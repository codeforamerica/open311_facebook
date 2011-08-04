<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	public function __construct() {
		parent::__construct();		
	}
	
	public function index($medium = 'web')
	{	
		$this->session->set_userdata('medium', $medium); // Facebook or web
		$this->load->model('group_model');
		$group = new Group_model();

		if($data['group_names'] = $group->get_names()):
			$this->load->vars($data);
			$this->load->view('home');
		else:
			$data['error_title'] = "Connection Error";
			$data['error_message'] = "There was an error connecting to ".CITY_NAME." Open311.  Please check back later.";
			$this->load->vars($data);
			$this->load->view('error');
		endif;
	}
	
	public function submit()
	{

		$this->load->model('service_model');
		$this->load->helper('s3');
		
		$media_url = "";
		
		//check whether a file was submitted
		if($_FILES['fileupload']['name'] != ""){	
			$s3 = new S3(AMAZON_S3_KEY, AMAZON_S3_SECRET);
			$s3->putBucket(AMAZON_S3_BUCKET, S3::ACL_PUBLIC_READ);
						
			
			if ($s3->putObjectFile($_FILES['fileupload']['tmp_name'], "open311_facebook", $_FILES['fileupload']['name'], S3::ACL_PUBLIC_READ)) {
				$media_url = "http://open311_facebook.s3.amazonaws.com/" . $_FILES['fileupload']['name'];
			}else{
				$data['error_title'] = "File upload error";
				$data['error_message'] = "There was an error uploading your file.  Please try again.";
				$this->load->vars($data);
				$this->load->view('error');
				return;
			}
		}
		
		$service = new Service_model();
		if($data['response'] = $service->submit($this->input->post(), $media_url)){
			error_log(print_r($data['response'], true));
			
			if($data['response']->error){
				$data['error_title'] = "Submission Error";
				$data['error_message'] = $data['response']->error->description;
				$this->load->vars($data);
				$this->load->view('error');
				return;
			}elseif($data['response']->request){
				$this->load->vars($data);
				$this->load->view('success');
				return;
			}
		}

		$data['error_title'] = "Connection Error";
		$data['error_message'] = "There was an error connecting to ".CITY_NAME." Open311.  Please check back later.";
		$this->load->vars($data);
		$this->load->view('error');
		
	}

	// ----- AJAX ------- //
	
	public function get_services_selector($selected_group){
		$this->load->model('group_model');
		$group = new Group_model();

		if($selected_group == "null") return;
		$selected_group = str_replace("_"," ",$selected_group);
		$services = $group->get($selected_group);
		if(sizeof($services) == 1): ?>
			<input type="hidden" name="service_code" value="<?=$services[0]->service_code?>" />
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
