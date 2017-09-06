<?php
	require_once('dbconnect.php');

	if(isset($_POST['btnRegister'])){
		
	$band = $_POST['txt_Bandname'];
		$membername = $_POST['txtMembername'];
		$role   = $_POST['txtRole'];

		$genre       = $_POST['genre'];
		$phone       = substr($_POST['txtPh'],0,3);
		echo $phone;
		$address     = $_POST['txtAddress'];
		$description = $_POST['txtDescription'];

		if(empty($band)){
			$msg = "Please enter bandname";
		}else if(empty($membername)){
			$msg = "Please enter member name";
		}else if(empty($role)){
			$msg = "Please enter role";
		}else if(empty($genre)){
			$msg = "Please choose genre";
		}else if(empty($phone)){
			$msg = "Please enter phone number";
		}else if(empty($address)){
			$msg = "Please enter address";
		}else if(empty($description)){
			$msg = "please write description";
		}else{
			connect();
			$query = mysql_query("select * from band where band_name = '$band' and member_name = '$membername'") or die("Cannot Select");
			if(mysql_num_rows($query)>0){
				$msg = "This artist is brand exit ";
			}else{
				$query1 = mysql_query("insert into band(band_name,member_name,genre,role,phone,address,description) VALUES ('$band','$membername','$genre','$role','$phone','$address','$description')") or die("Cannot Insert".mysql_error());
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
				<td>Band Name</td>
				<td><input type="text" name="txt_Bandname"></td>
		</tr>
		
		<tr>
				<td>member name 1</td>
				<td><input type="text" name="txtMembername">Role <input type="text" name="txtRole"></td>
		</tr>

		

		<tr>
				<td colspan="2"><button>+ add more member </button></td>
		</tr>

		<tr>
			<td>Gender</td>
			<td><input type="checkbox" name="genre" value = "1">pop
				<input type="checkbox" name="genre" value = "2">rock
				<input type="checkbox" name="genre" value = "3">Dance/Electronic</br>
				<input type="checkbox" name="genre" value = "4">Soul
				<input type="checkbox" name="genre" value = "5">R&B
				<input type="checkbox" name="genre" value = "6">Hip Hop</br>
				<input type="checkbox" name="genre" value = "7">Otherlsdfkjsdlfkjsdlfksaldfkj
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