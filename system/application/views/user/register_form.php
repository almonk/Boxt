<div class="register_form">
<?
$this->load->helper('form');
echo form_open('users/register');
?>
<p>
<label for="username">Pick a username</label><br/>
<input type="text" name="username" class="validate(required,username)"/>
</p>

<p>
<label for="username">Email Address</label><br/>
<input type="text" name="email" class="validate(required,email)"/>
</p>

<p>
<label for="username">Choose a password</label><br/>
<input type="password" id="password1" name="password" class="validate(required)"/>
</p>

<p>
<label for="username">Write it again...</label><br/>
<input type="password" name="password_confirm" class="validate(required,match(#password1))"/>
</p>

<input type="submit" value="Sign up &rarr;"/>
</form>
</div>