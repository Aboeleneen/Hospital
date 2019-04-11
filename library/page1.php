
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
      background: url('medical6.JPG');
      background-repeat: no-repeat;
      background-size: cover;
          color: #fff9f9;
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
    /* Add a gray background color and some padding to the footer */
    footer {
     background-color: #159cc1;
      padding: 25px;
    }
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center" >
    <h1> Medical Library</h1>      
    <p>Books && Information</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Bonus Team</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="../web.php">Home</a></li>
        <li><a href="page1.php" class="active">library</a></li>
        <li><a href="../Blog.php">Blog</a></li>
        <li><a href="../login.php">login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Surgery</div>
        <div class="panel-body">
		<a href="page2.php">
		<img src="books.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
        <div class="panel-footer">Some books to know more about surgery</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Pediateric</div>
        <div class="panel-body">
		<a href="page3.php">
		<img src="books.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
		<div class="panel-footer">Some books to know more about Pediateric </div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Dentistry</div>
        <div class="panel-body">
		<a href="page4.php">
	    <img src="books.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
        
		<div class="panel-footer">Some books to know more about Dentistry</div>
      </div>
    </div>
  </div>
</div><br>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Gynaecology and Obstetrics</div>
        <div class="panel-body">
		<a href="page5.php">
		<img src="books.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
        <div class="panel-footer">Some books to know more about Gynaecology and Obstetrics</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Ophthalmology</div>
        <div class="panel-body">
		<a href="page6.php">
		<img src="books.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
        <div class="panel-footer">Some books to know more about Ophthalmology</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Orthopedic</div>
        <div class="panel-body">
		<a href="page7.php">
		<img src="books.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
        <div class="panel-footer">Some books to know more about Orthopedic</div>
      </div>
    </div>
  </div>
</div><br><br>

<footer class="container-fluid text-center">
  <h3>Bonus Team Copyright</h3>  
  <h4>faculty of engineering<h4>
</footer>

</body>
</html>
