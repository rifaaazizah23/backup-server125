<!DOCTYPE html>
<html>
<head>
	<title>Menghubungkan codeigniter dengan database mysql</title>
</head>
<body>
	<h1>Mengenal Model Pada Codeigniter | MalasNgoding.com</h1>
	<table border="1">
		<tr>
			<th>user Name</th>
			<th>Password</th>
			<th>Name</th>
		</tr>
		<?php foreach($user as $u){ ?>
		<tr>
			<td><?php echo $u->username ?></td>
			<td><?php echo $u->password ?></td>
			<td><?php echo $u->name ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>