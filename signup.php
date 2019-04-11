<?php
   include 'contact.php';
   if($_SERVER['REQUEST_METHOD'] == "POST"){
   	$username = $_POST['username'] ;
   	$password = $_POST['password'] ;
   	$group = $_POST['group'];
   	$tele = $_POST['telephone'];
   	$email = $_POST['email'];
   	$fullname = $_POST['fullname'];
   	if($group== "admin")
   	{
   		$id=1;
   		
   	}
   	else if ($group== "patient")
   	{
   		$id=2;
   		
   	}
   	else if ($group == "doctor")
   	{
   		$id =3;
   	
   	}
   	else if ($group == "accountant")
   	{
   		$id=4;
   	}
   	
   	$sql = "INSERT INTO users (username, password, fullname, email,telephone,groupID) VALUES ( '$username','$password','$fullname','$email','$tele','$id') " ;
   	$con ->exec($sql);
  
}

?>
 <form action="signup.php" method="post">
 	<input type="text" name="username" placeholder="username">
 	<input type="password" name="password" placeholder="password">
 	<input type="text" name="fullname" placeholder="fullname">
 	<input type="email" name="email" placeholder="email">
 	<input type="telephone" name="telephone" placeholder="telephone">
 	<select name="group">
 		<option>admin</option>
		<option>patient</option>
		<option>doctor</option>
		<option>accountant</option>
 	</select>
 	<input type="submit" name="" value="log in">
 </form>