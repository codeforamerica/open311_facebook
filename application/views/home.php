<h3 id="project_description"><?=PROJECT_DESCRIPTION?></h3>


<?=form_open_multipart('home/submit')?>
	<?=form_hidden('jurisdiction_id', OPEN_311_JURISDICTION_ID)?>
	<input type="hidden" name="lat" id="lat" />
	<input type="hidden" name="long" id="long" />
	<fieldset id="service_selection">
		<div id="group">
			<label for="group">Category</label>
			<select name="group">
				<option value="null">-- Select a Category --</option>
			<? foreach($group_names as $group_name): ?>
				<option value="<?=str_replace(" ","_",$group_name)?>"><?=$group_name?></option>
			<? endforeach ?>
			</select>
		</div>
		<div id="service">
		
		</div>
	</fieldset>
	<fieldset id="meta">
		<div class="field">
			<?=form_label('Details','description')?>
			<?=form_textarea('description')?>
		</div>
		<div class="field">
			<?=form_label('Photo','fileupload')?> 
			<?=form_upload('fileupload')?> <!-- media_url -->
		</div>
	</fieldset>
	<fieldset id="location">
		<div class="address field">
			<?=form_label('Address','address_string')?>
			<?=form_input('address_string', null, 'id="address_string"')?>		
			<input type="button" id="mapit" value="Map it"></button>
			<span class="map_help">Click location on the map</span>
		</div>
		<div id="map_canvas"></div>
	</fieldset>

	<fieldset id="contact">
		<div class="field" id="email">
			<?=form_label('Email Address','email')?>
			<?=form_input('email')?>
		</div>
		<div class="field" id="first">
			<?=form_label('First','first_name')?>
			<?=form_input('first_name', $first)?>
		</div>
		<div class="field" id="last">
			<?=form_label('Last','last_name')?>
			<?=form_input('last_name', $last)?>
		</div>
		<div class="field" id="phone">
			<?=form_label('Phone Number','phone')?>
			<?=form_input('phone')?>
		</div>
		<p id="logged_in" class="invisible"></p>
	</fieldset>

	<div id="fb_connect">
		<div class="bracket"></div>
		<p class="explanation">This contact info lets departments contact you for more information. Your email also allows you to track your service request.</p>
		<p><a id="connect">Autofill with Facebook</a></p>
	</div>
	
	<div style="clear:both"></div>
	
	<a class="large green button" id="submit">Submit</a>
	<input type="submit" style="visibility:hidden;" />
	
<?=form_close()?>

<div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>

	    

FB.init({
	appId  : '<?=FACEBOOK_APP_ID?>',
	status : true, // check login status
	cookie : true, // enable cookies to allow the server to access the session
	xfbml  : true  // parse XFBML
});

FB.api('/me', function(response) {
  if(response.email) autofill();
});

function autofill(){
	FB.login(function(response) {
		FB.api('/me', function(response) {
	  		if(response.first_name){$('#first input').val(response.first_name);}
	  		if(response.last_name){$('#last input').val(response.last_name);}
	  		if(response.email){$('#email input').val(response.email);}
	  		if(response.mobile_phone){$('#phone input').val(response.mobile_phone);}
	  		$('#connect').fadeOut();
		});
	}, {perms:'email'});
}

$(document).ready(function(){
    $('#connect').click(function(){
    	autofill();
	});
});
	
</script>