<?
	$this->load->helper('form');
	echo form_open('admin/save_general');
?>
	<h1>General</h1>
	<label for="intname">Institution name</label><br/>
	<input type="text" name="intname" value="<?=$this->config->item('institution_name');?>" />
	<br/>
	<label for="intlogo">Institution logo</label><br/>
	<input type="text" name="intlogo" value="<?=$this->config->item('institution_logo');?>" />
	<br/>
	<label for="supportcontact">Support email address</label><br/>
	<input type="text" name="supportcontact" value="<?=$this->config->item('support_contact');?>" />
	<br/>
	<label for="allowregister">Allow users to register?</label><br/>
	<?
		if ($this->config->item('self_register')==true) {
			echo '<input type="checkbox" name="allowregister" value="allowregister" checked="true"/>';
		}else{
			echo '<input type="checkbox" name="allowregister" value="allowregister"/>';
		}
	?>
	<br/>
	<br/>
	<div class="submit">
		<input type="submit" value="Save settings &rarr;">
	</div>
	</form>