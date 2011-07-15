<?=form_open('home/submit')?>
	<?=form_hidden('jurisdiction_id', 'sfgov.org')?>

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
	<div id="meta">
		<?=form_label('Details','description')?>
		<?=form_textarea('description')?>
		<?=form_label('Photo','media')?> <!-- media_url -->
		<?=form_upload('media')?>
	</div>
	<div id="location">
		<?=form_label('Latitude','lat')?>
		<?=form_input('lat')?>
		<?=form_label('Longitude','long')?>
		<?=form_input('long')?>
		<?=form_label('Address','address_string')?>
		<?=form_input('address_string')?>		
	</div>
	<div id="contact">
		<?=form_label('Email Address','email')?>
		<?=form_input('email')?>
		<?=form_label('First','first_name')?>
		<?=form_input('first_name')?>
		<?=form_label('Last','last_name')?>
		<?=form_input('last_name')?>
		<?=form_label('Phone Number','phone')?>
		<?=form_input('phone')?>
	</div>
	
	<?=form_submit('submit','Submit')?>
	
<?=form_close()?>