<h1>Users</h1>
<table id="users_table">
	<tr>
		<th>User name</th>
		<th>Email</th>
		<th>Join date</th>
		<th>Role</th>
	</tr>
	<?
		$u = new User();
		$users = $u->get();
		foreach ($users as $user) {
			if ($user->admin=='1'){
				$role = 'Admin';
			}else{
				$role = 'User';
			}
			echo '<tr><td>'.$user->username.'</td><td>'.$user->email.'</td><td>'.$user->join_date.'</td><td>'.$role.'</td></tr>';
		}
	?>
</table>

<div class="toolbar">
	<input type="button" value="Add new user"/>
</div>