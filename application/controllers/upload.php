<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class upload extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index()
	{	
		?>
		<html>
		<body>
		
		<form action="action" method="post"
		enctype="multipart/form-data">
		<label for="file">Filename:</label>
		<input type="file" name="file" id="file" /> 
		<br />
		<input type="submit" name="submit" value="Submit" />
		</form>
		
		</body>
		</html>
		<?
	}
	
	public function action(){
		if ($_FILES["file"]["error"] > 0)
		  {
		  echo "Error: " . $_FILES["file"]["error"] . "<br />";
		  }
		else
		  {
		  echo "Upload: " . $_FILES["file"]["name"] . "<br />";
		  echo "Type: " . $_FILES["file"]["type"] . "<br />";
		  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
		  echo "Stored in: " . $_FILES["file"]["tmp_name"];
		  }
	}
		
}
