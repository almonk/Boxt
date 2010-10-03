<table>
<?
$counter=0;
foreach ($results as $row) {
	$counter++;
	if ($counter % 2) {
		echo '<tr class="item">';
	}else{
		echo '<tr class="item alt">';
	}
	?>
		
		<td width="50" style="width:50px;padding-left:10px">
			<div class="icon"><img src="<?if($row->icon_url==""){echo 'http://alasdairmonk.net/private/boxt/images/icons/no_icon.png';}else{echo $row->icon_url;}?>" border="0"/>
			</div>
		</td>
		<td>
			<div class="name"><a href="javascript:load_widget('<?=$row->url?>','mid');flash_widgets_library();halo_widget('#<?=$row->url?>');"><?=$row->name?></a></div>
			<p><?=$row->description?></p>
		</td>
<? } ?>
</table>