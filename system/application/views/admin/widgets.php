<h1>Widgets</h1>
<table id="users_table">
	<tr>
		<th>Name</th>
		<th>Author</th>
		<th>Path</th>
	</tr>
	<?
		$w = new Widget();
		$widgets = $w->get();
		foreach ($widgets as $widget) {
			echo '<tr><td>'.$widget->name.'</td><td>'.$widget->author.'</td><td>'.$widget->url.'/'.$widget->url.'.xml</td></tr>';
		}
	?>
</table>

<div class="toolbar">
	<input type="button" value="Add new widget"/>
</div>