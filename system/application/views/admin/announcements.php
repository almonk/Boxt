<h1>Announcements</h1>
<?
$this->load->helper('form');
echo form_open('admin/save_announcement');
?>
<label for="announcement">Announcement</label><br/>
<input type="text" name="announcement" value="" />
<br/>
<br/>
<div class="submit">
	<input type="submit" value="Send announcement &rarr;">
</div>
</form>