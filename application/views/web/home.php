<h3 id="project_description"><?=$settings['project_description']?></h3>


<?=form_open_multipart('home/submit')?>
	<?=form_hidden('jurisdiction_id', 'sfgov.org')?>
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
			<div class="map_help">Click the map or enter an address.</div>
		</div>
		<div id="map_canvas"></div>
		<?=form_hidden('lat', null, 'id="lat"')?>
		<?=form_hidden('long', null, 'id="long"')?>
	</fieldset>

	<fieldset id="contact">
		<div class="field">
			<?=form_label('Email Address','email')?>
			<?=form_input('email')?>
		</div>
		<div class="field">
			<?=form_label('First','first_name')?>
			<?=form_input('first_name')?>
		</div>
		<div class="field">
			<?=form_label('Last','last_name')?>
			<?=form_input('last_name')?>
		</div>
		<div class="field">
			<?=form_label('Phone Number','phone')?>
			<?=form_input('phone')?>
		</div>
	</fieldset>
	
	<a class="large green button" id="submit">Submit</a>
	
	
<?=form_close()?>


