<!DOCTYPE html>
<html>
<head>
	<title>Artist Edit</title>
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
					<td colspan="2">Edit </td>
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
						<td colspan="2"><button name = "btnedit">Edit</button> <a href="artist_mng.php"> <input type="button" name="" value="Back to Home"></a>
						</a></td>
					</tr>
				</tbody>
			</table>
		</form>
	</body>
	</html>