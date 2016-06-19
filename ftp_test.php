<?php
// Create By : Pooria Jahangiri Far

$msg = ""; // Null

if(isset($_POST['submit'])){
	$ftp_server = addslashes(trim($_POST['ftp_server']));
	$ftp_username = addslashes(trim($_POST['ftp_username']));
	$ftp_password = addslashes(trim($_POST['ftp_password']));

	if(!$ftp_server){
		$msg = "Please Insert FTP Server";
	}elseif(!$ftp_username){
		$msg = "Please Insert FTP Username";
	}elseif(!$ftp_password){
		$msg = "Please Insert FTP Password";
	}else{
		$conn_id = ftp_connect($ftp_server); // Connect To The Server

		$login_result = ftp_login($conn_id, $ftp_username, $ftp_password);

		// Check Connection
		if((!$conn_id) || (!$login_result)){
			$msg = '<div style="background-color:red; padding:10px; color:#fff; font-size:16px;">FTP Connection Has Failed! - Attempted To Connect To <b>'.$ftp_server.'</b> For User <b>'.$ftp_username.'</b></div>';
		}else{
			$msg = '<div style="background-color:green; padding:10px; color:#fff; font-size:16px;">Connected To <b>'.$ftp_server.'</b>, For User <b>'.$ftp_username.'</b></div>';
		}

		ftp_close($conn_id); // Close The FTP Stream
	}
}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>FTP Test Connection</title>
</head>

</body>
	<form method="post" action="">
		<table border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td>IP Connection :</td>
				<td><input type="text" name="ftp_server" /></td>
			</tr>
			<tr>
				<td>Username :</td>
				<td><input type="text" name="ftp_username" /></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="text" name="ftp_password" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" /></td>
			</tr>
		</table>
	</form>

	<?php print_r($msg); ?>

</body>
</html>
