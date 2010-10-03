<div id="firsttime" style="display:none">
	<div style="padding-top:100px;padding-left:15px;padding-right:15px;text-align:center;">
		<p>Click this link I'm pointing at to<br/>liven things up.</p>
	</div>
</div>

<div class="announcement" style="display:none;">
	<div style="padding:10px;">
		<table style="width:100%">
			<tr>
				<td width="180" style="font-weight:bold">
					Important Announcement
				</td>
				<td width="600" id="annon_text">
					Test
				</td>
			</tr>
		</table>
	</div>
</div>

<div class="widgets">
	<div id="left"></div>
	<div id="mid"></div>
	<div id="right"></div>
</div>

<div class="contextMenu" id="contextMenuWidget">
	<ul>
		<li id="settings"><img src="<?=base_url();?>images/icons/Settings16x16.png" /> Settings</li>
		<li id="delete"><img src="<?=base_url();?>images/icons/Delete16x16.png" /> Delete</li>
	</ul>
</div>

<script type="text/javascript" charset="utf-8">
	<?
	//Code that writes widgets in database to dashboard
	$u = new User();
	$u->get_widgets($this->session->userdata('id'));
	?>

	$('#left').bind('sortupdate', function(event, ui) {
		save_widgets_position(<?=$this->session->userdata('id')?>,'column_left');
	});
	
	$('.add_widget_link').bind('click', function(event) {
		$('#firsttime').fadeOut('slow');
	});

	function save_widgets_position(user_id,column_id){
		var order = $(column_id).sortable('serialize');
		$.post('<?=site_url()?>/users/save_widgets_array', { userid: user_id, columnid: column_id, widget_array: order } );
	}
</script>