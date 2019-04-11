<?php include 'contact.php'; 
  
 if($_SERVER['REQUEST_METHOD'] == "POST"){
  $doctor = $_POST['doctor'];
  $password = $_POST['password'];
  $title = $_POST['title'];
  $Message = $_POST['Message'];
  $date = date("Y-m-d h:i:sa");

  $username = $doctor ;
   	$Role = 'Doctor';
   
   	$stmt = $con  ->prepare("SELECT username,password,Role FROM users WHERE username= ? AND password= ? AND Role= ?");
    $stmt ->execute(array($username , $password,$Role));
    $count= $stmt -> rowCount();
   
    if($count > 0)
    { 
          $sql = "INSERT INTO Blog(doctor,title,date_message,message) VALUES ('$doctor','$title','$date','$Message')";
  $con ->exec($sql);
    }

}





?>
<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Our Hospital</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style2.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,800,700,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=BenchNine:300,400,700' rel='stylesheet' type='text/css'>
	<script src="js/modernizr.js"></script>
	  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<!-- ====================================================
	header section -->
	<header class="top-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-5 header-logo"> 
					<br>
					<a><img src="images/logo6.PNG" alt="" class="img-responsive logo"></a>
				</div>

				
					<nav class="navbar navbar-default">
					  <div class="container-fluid nav-bar">
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					    </div>

					    <!-- Collect the nav links, forms, and other content for toggling --> 
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					      
					      <ul class="nav navbar-nav navbar-right">
					        <li><a class="menu active" href="web.php" >Home</a></li>
                   <li><a class="menu" href="library/page1.php" >Library</a></li>
                 
                  <li><a class="menu" href="Blog.php">Blog</a></li>
                  <li><a class="menu" href="web.php#contact"> contact us</a></li>
                  <li><a class="menu" href="login.php"  >log in </a></li>
					      </ul>
					    </div><!-- /navbar-collapse -->
					  </div><!-- / .container-fluid -->
					</nav>
				
			</div>
		</div>
	</header> <!-- end of header area -->

	<div class="col-sm-12 blog">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
              
                    <a class="btn btn-danger btn-block btn-lg">OUR BLOG </a>  
                   
                
            </div> 

         
    <div class="panel-body">
                   <form action="Blog.php" method="POST" class="form-horizontal" >

            <div class="form-group row">
              <label  class="control-label col-sm-2">Doctor Name</label>
                <div class="col-sm-8">
                  <input type="text" name="doctor" class="form-control" placeholder="username">
                   </div>
            </div> 

            <div class="form-group row">
              <label  class="control-label col-sm-2">Password</label>
                <div class="col-sm-8">
                  <input type="password" name="password" class="form-control" placeholder="password">
                   </div>
            </div> 

             <div class="form-group row">
              <label  class="control-label col-sm-2">Title</label>
                <div class="col-sm-8">
                  <input type="text" name="title" class="form-control" placeholder="Title">
                   </div>
            </div>

            <div class="form-group row">
              <label  class="control-label col-sm-2">Your Message </label>
                <div class="col-sm-8">
                	 <textarea name="Message" placeholder="Message" minlength="140" rows="7" class="tinymce form-control" required="" >  </textarea>
                	</div>
                </div>


                <div class="form-group row">
                <div class="col-sm-offset-3 col-sm-6">
                               <input type="submit" name="" value="save" class="btn btn-success " >
                               <button type="reset" class="btn btn-primary " > Reset</button>
               </div>
           </div>
        </form>
    </div>

</div>
</div>

  <?php  $sql = $con->prepare("SELECT * FROM Blog ");
        $sql->execute(); 

     while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        ?>
<div class="col-sm-12 message">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
              
                    <ul><li><h3> <i class="glyphicon glyphicon-user"></i> Doctor Name :  <?php echo  $row['doctor'] ?></h3></li></ul>
              <ul><li><h3> <i class="fa fa-floppy-o"></i> Title : <?php echo $row['title'] ?> </h3></li></ul>
              <ul><li><h3> <i class="fa fa-calendar"></i> Date : <?php echo $row['date_message'] ?> </h3></li></ul>  
                   
                
            </div> 

    <div class="panel-body">


                  

                   
                 <h3>  <?php echo $row['message'] ?></h3>
                   
    </div>

</div>
</div> <?php } ?>

<style>
	.blog{
		margin-top: 180px;
	}
	.message .panel {
    margin-bottom: 20px;
    background-color: #29b1bd;
    border: 1px solid transparent;
    border-radius: 4px;
    color: #eee;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
 /* width */
::-webkit-scrollbar {
    width: 8px;
}

/* Track */
::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey; 
    border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
    background: #2c889e;
    border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #2c889e;
}
</style>
</body>
</html>