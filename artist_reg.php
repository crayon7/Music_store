<?php
require_once('dbconnect.php');

if(isset($_POST['btnRegister'])){

	$artistname = strip_tags($_POST['txtArtistname']);
		 $genre = strip_tags($_POST['genre']);
		  $list = implode(',',$genre);
				for($i = 0;count($genre)<$i;$i++){ // for each value
					$list = $genre[$i]; // put insert query and value of selected price
				}
		   $phn = $_POST['txtPh'];
		   //echo strlen($phn);
	$phone      = "(".substr($phn,0,2).") ".substr($phn,2,3)."-".substr($phn,5,3)."-".substr($phn,8);	
	$address    = trim($_POST['txtAddress']);
	$description = trim(mysql_real_escape_string($_POST['txtDescription']));
	if(empty($artistname)){
		$msg = "Please enter artistname";
	}
	else if(empty($list)){
		$msg = "Please choose gender";
	}else if (count($genre)>3) {
		$msg = "Please Select only 3";
	}else if(empty($phone)){
		$msg = "Please enter phone number";
	}else if(strlen($phone)>11){
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
					<td><input type="checkbox" name="genre[]" value = "Pop">Pop
						<input type="checkbox" name="genre[]" value = "Rock">Rock
						<input type="checkbox" name="genre[]" value = "Dance/Electronic">Dance/Electronic</br>
						<input type="checkbox" name="genre[]" value = "Soul">Soul
						<input type="checkbox" name="genre[]" value = "R&B">R&B
						<input type="checkbox" name="genre[]" value = "Hip Hop">Hip Hop</br>
						<input type="checkbox" name="genre[]" value = "Other...">Other
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