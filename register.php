<?php
include "head.php";
include "menu.php";

$host ="localhost";
$dbname ="club";
$dbuser ="root";
$dbpass ="";

$conn = mysqli_connect($host, $dbuser, $dbpass,$dbname);

if(!$conn){
    exit("Error:connection not established!!");
}

if (isset($_POST["sub"]))
{
$name=$_POST["fname"];
$idno=$_POST["idno"];
$gen=$_POST["gender"];
$email=$_POST["email"];
$dob=$_POST["dob"];
$psswd=md5($_POST["pwd"]);
$phone=$_POST["pno"];
$address=$_POST["addr"];
$county=$_POST["county"];
$profile_pic=$_FILES["photo"] ["name"];
$path="profiles/";
$photo = $path.$profile_pic;

$result = mysqli_query($conn,"SELECT * FROM members WHERE email='$email'");
$email_check = mysqli_num_rows($result);

if ($email_check==0)
{
	move_uploaded_file($_FILES["photo"] ["tmp-name"],$photo);
	$query = mysqli_query($conn,"INSERT INTO members VALUES (0,'$name',$idno,'$gen','$county',
	'$email','$dob','$phone','$address','$photo','$psswd')");

if($query)
{
	echo "<script>alert('Registration Successful!!');</script>";
	}
	else
	{
		echo "<script>alert('Sorry,Registration failed');</script>";
	}
	}
	else{
		echo"<script>alert('Sorry, This email exist');</script>";
		}
	}
	mysqli_close($conn);
?>

<h3>Register Here</h3>
	<form action="register.php" method="post" enctype="multipart/form-data">
	<table width="80%">
	<tr><td>Full Name:</td><td><input type="text" name="fname" required placeholder="Enter your full name"></td></tr>
	<tr><td>ID No.:</td><td><input type="number" name="idno"></td></tr>
	<tr><td>Gender:</td><td> Male<input type="radio" value="male" name="gender"> |
	 Female<input type="radio" value="female" name="gender"></td></tr>
	<tr><td>Date of Birth:</td><td><input type="date" name="dob"></td></tr>
	<tr><td>Email:</td><td><input type="email" name="email" required></td></tr>
	<tr><td>Password:</td><td><input type="password" name="pwd" required></td></tr>
	<tr><td>Phone No.:</td><td><input type="number" name="pno" required></td></tr>
	<tr><td>Address:</td><td><textarea name="addr"></textarea></td></tr>
	<tr><td>County:</td><td>
	<select name="county">
	<option>Taita taveta</option>
	<option>Mombasa</option>
	<option>Nairobi</option>
	</select>
	</td></tr>
	<tr><td>Profile Pic.:</td><td><input type="file" name="photo"></td></tr>
	<tr><td colspan="2"><input type="submit" name="sub" value="Register"></td></tr>
	</table>
	</form>
	<?php
	include "footer.php";
	?>
