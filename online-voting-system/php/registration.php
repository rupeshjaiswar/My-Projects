<html>
<head>
<link rel="stylesheet" type="text/css" href="../styles/style.css">   
<title> Registration </title>
<style>
	span{
		color: red;
	}
	</style>
</head>
<body> 
<?php
	$fname =$lname= $email= $dob=$aadhar=$cpassword=$image= $password="";
	$efname =$elname= $eemail= $edob=$eaadhar=$ecpassword=$eimage= $epassword ="";
	if($_SERVER["REQUEST_METHOD"]=="POST" ){
        $fname =$_POST["f_name"];
        $lname =$_POST["l_name"];
        $email =$_POST["email"];
        $dob=$_POST["dob"];
        $aadhar =$_POST["aadhar"];
		$password =$_POST["psw"];
		$cpassword =$_POST["psw1"];
		if(empty($fname)){
			$efname="First Name is required";
			echo "<script>document.myform.f_name.focus();</script>";
		  }
		  if(empty($lname)){
			$elname="Last Name is required";
		  }
		  if(empty($email)){
			$eemail="Email-Id is required";
		  }
		  if(empty($dob)){
			$edob="Date of Birth is required";
		  }
		  if(empty($aadhar)){
			$eaadhar="aadhar number is required";
		  }
		  if(empty($password)){
			$epassword="Password is required";
		  }
		  ?>
<script>
pass= <?php echo $password ?>;
if(pass=='' || (!pass.match(/[A-Z]/)) || (!pass.match(/[a-z]/)) || (!pass.match(/[0-9]/)) ||(!pass.match(/[!@#$%^&*()]/)) ){
          alert("Password should have lowercase,uppercase and one special char");
}
		  </script>
<?php
		  if(empty($cpassword)){
			$ecpassword="Confirm password is required";
		  }
		  
		  if($cpassword!=$password){
			$ecpassword="Password does not match ";
		  }
		
		}
		if(empty($fname) || empty($lname) || empty($email) ||empty($dob) || empty($aadhar) || empty($password) || empty($cpassword) ){
		
	?>     
	<div class="login-box" style="height: 770px;">
    <img src="../images/av.png" class="avatar">
		<form action="<?php ($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" name="myform">
		First Name<input type="text" name="f_name" ><span>*<?php echo $efname ?></span><br>
		Last Name<input type="text" name="l_name" ><span>*<?php echo $elname ?></span><br>
		Email Id <input type="email" name="email" ><span>*<?php echo $eemail ?></span><br>
		DOB <input type="date" name="dob" ><span>*<?php echo $edob ?></span><br>
		Aadhar number <input type="Text" name="aadhar" ><span>*<?php echo $eaadhar ?></span><br>
		Password<input type="password" name="psw"><span>*<?php echo $epassword ?></span><br>
		Confirm Your Password<input type="password" name="psw1"><span>*<?php echo $ecpassword ?></span><br>
		Upload a age proof
    <input type="file" name="image[]" /><span>*</span><br>
    <button type="submit" >Upload</button>
</form>
</div>
	<?php   }
	else{

		$cn=mysqli_connect("localhost","root","","image") or die("Could not Connect My Sql");
$output_dir = "upload/";/* Path for file upload */
	$RandomNum   = time();
	$ImageName      = str_replace(' ','-',strtolower($_FILES['image']['name'][0]));
	$ImageType      = $_FILES['image']['type'][0];
 
	$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
	$ImageExt       = str_replace('.','',$ImageExt);
	$ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
	$NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
    $ret[$NewImageName]= $output_dir.$NewImageName;
	
	/* Try to create the directory if it does not exist */
	if (!file_exists($output_dir))
	{
		@mkdir($output_dir, 0777);
	}               
	move_uploaded_file($_FILES["image"]["tmp_name"][0],$output_dir."/".$NewImageName );
	     $sql = "INSERT INTO `Registration` (`f_name`,`l_name`,`email`,`dob`,`aadhar`,`Password`,`image`)  VALUES ('$_POST[f_name]','$_POST[l_name]','$_POST[email]','$_POST[dob]','$_POST[aadhar]','$_POST[psw]','$NewImageName')";
		if (mysqli_query($cn, $sql)) {
			
			echo '<script>alert("You are successfully registered! ");  window.location.href = "../index.html";</script>'; 

		}
		else {		
	echo"<h1 style='text-align: center;background-color:rgb(180, 178, 178) ;font-size: 40px;font-style: italic; opacity: 1.0;margin-top:300px;'>". "You have entered a existing user's details please check the error below! "."</h1>";
		
		echo "<h1 style='text-align: center;background-color:rgb(180, 178, 178) ;font-size: 40px;font-style: italic; opacity: 1.0;'>". "Error: " . $sql . "" . mysqli_error($cn) ."</h1>";
	 }

	}	
	
?>
</body>
</html>