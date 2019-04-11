<?php
   
   
   session_start();
   include 'contact.php' ;
   if($_SERVER['REQUEST_METHOD'] == "POST"){
   	$username = $_POST['username'] ;
   	$password = $_POST['password'] ;
   	$Role = $_POST['Role'];
   
   	$stmt = $con  ->prepare("SELECT username,password,Role FROM users WHERE username= ? AND password= ? AND Role= ?");
    $stmt ->execute(array($username , $password,$Role));
    $count= $stmt -> rowCount();
   
    if($count > 0)
    { 


    	 $_SESSION['username'] = $username;
       echo $Role;
    	 $_SESSION['Role'] = $Role ;

      $sql = $con->prepare("SELECT * FROM users WHERE username= ? AND password= ? AND Role= ?");
                           $sql->execute(array($username , $password,$Role));
                           $row = $sql->fetch(PDO::FETCH_ASSOC);
                         



      $_SESSION['id'] = $row['userID'] ;

      
      
     header('Location:Dashboard.php');
         exit();
    }
 


    

   }
  
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="Css/login.css">
  <style type="text/css">
    body{
      background: url('images/medical.JPG');
      opacity: .8;
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
   

  <div class="card">
        <div class="front">
            <header>
                <img src="images/logo2.PNG">
            </header>

             <form action="login.php" method="post" class="for">
                <div class="form-group row">
             
                <div class="col-sm-12">
  <input type="text" name="username" placeholder="username" class="form-control" required="">
</div>
</div>
  <div class="form-group row">
                <div class="col-sm-12">
  <input type="password" name="password" placeholder="password" class="form-control" required="">
  </div>
</div>
 
 <div class="form-group row">
                <div class="col-sm-12">
  <select name="Role" class="form-control">
        <option>Select Option</option>
        <option ">Admin</option>
        <option>Patient</option>
        <option >Doctor</option>
        <option>Accountant</option>
        <option >Laboratorist</option>
        <option >Nurse</option>
        <option >Pharmacist</option>
        <option >Receptionist</option>
        <option>Representative</option>
        <option>Case_manager</option>
  </select>
  </div>
</div>
  <input type="submit" class="btn btn-danger " name="submit" value="log in">
        </div>
      
    </div>

 <link rel="stylesheet" type="text/css" href="Css/login.css">
</form>
</body>
</html>