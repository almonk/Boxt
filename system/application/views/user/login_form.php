<div class="loginform">
	<?
	$this->load->helper('form');
	echo form_open('users/login');
	?>
	<label for="username">Username</label><br/>
	<input type="text" name="username"/><br/>
	<label for="password">Password</label><br/>
	<input type="password" name="password"/><br/>
	<input type="submit" value="Go to your dashboard &rarr;"/><br/>
	</form>
</div>