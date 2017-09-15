<?php
require_once('dbconnect.php');

if(isset($_POST['btnRegister'])){

	$artistname = strip_tags($_POST['txtArtistname']);
		 
	$list = implode(",", $_POST['genre']);
		   //echo strlen($phn);
    $phn  = $_POST['txtPh'];
	$phone      = "(".substr($phn,0,2).") ".substr($phn,2,3)."-".substr($phn,5,3)."-".substr($phn,8);	
	

	$address    = trim($_POST['txtAddress']);
	$description = trim(mysql_real_escape_string($_POST['txtDescription']));
	if(empty($artistname)){
		$msg = "Please enter artistname";
	}
	else if(empty($list)){
		$msg = "Please choose gender";
	}else if(strlen($list)>6){
		$msg = "U cannot choose more than 3 genres";
	}else if(empty($phone)){
		$msg = "Please enter phone number";
	}else if(strlen($phn)>11){
		$msg = "Wrong phone number digits";
	}else if(empty($address)){
		$msg = "Please enter address";
	}else if(empty($description)){
		$msg = "please write description";
	}else{
		connect();
		$query = mysql_query("select * from artist where artist_name = '$artistname' and phone = '$phone'") or die("Cannot Select");
		if(mysql_num_rows($query)>0){
			$msg = "This artist is already exit";
		}else{
			$query1 = mysql_query("insert into artist(artist_name,genre,phone,address,description) VALUES ('$artistname',
				'$list','$phone','$address','$description')") or die("Cannot Insert".mysql_error());
			if($query1){
				$msg = "Save Successfully Record";
			}
		}
	}

}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Registeration</title>
</head>
<body>
	<?php
	if(!empty($msg)){
		echo "<font color = \"red\">".$msg."</font>";
	}
	?>
	<form method = "POST" action = "">
		<table border="1px" border-padding="10px">
			<tr>
				<thead>
					<td colspan="2">Registeration</td>
				</thead>
			</tr>

			<tbody>
				<tr>
					<td>Name</td>
					<td><input type="text" name="txtArtistname"></td>
				</tr>



				<tr>
					<td>Gender</td>
					<td><input type="checkbox" name="genre[]" value = "1">Pop
						<input type="checkbox" name="genre[]" value = "2">Rock
						<input type="checkbox" name="genre[]" value = "3">Dance/Electronic</br>
						<input type="checkbox" name="genre[]" value = "4">Soul
						<input type="checkbox" name="genre[]" value = "5">R&B
						<input type="checkbox" name="genre[]" value = "6">Hip Hop</br>
						<input type="checkbox" name="genre[]" value = "7">Other
					</td>

				</tr>
				<tr>
					<td>Phone</td>
					<td><input type="text" name="txtPh"></td>
				</tr>

				<tr>
					<td>Address</td>
					<td><input type="text" name="txtAddress"></br>

					</tr>
					<tr>
						<td>Descriptions</td>
						<td><textarea name="txtDescription">

						</textarea></td>
					</tr>

					<tr>
						<td colspan="2"><button name = "btnRegister">Register</button><button>Back to home</button></td>
					</tr>
				</tbody>
			</table>
		</form>
	</body>
	</html>