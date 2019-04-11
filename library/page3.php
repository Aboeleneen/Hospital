

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
    .carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive, .thumbnail a>img, .thumbnail>img {
    display: block;
    max-width: 100%;
    height: 386px;
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
  <div class="container text-center">
    <h1>Pediateric Section</h1>      
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
        <div class="panel-heading">Essential of pediatrics</div>
        <div class="panel-body">
		<a href="https://download-health-medicine-pdf-ebooks.com/25250-free-book">
		<img src="essintial of pediatric.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
        <div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-danger">
        <div class="panel-heading">First Aid of pediatrics</div>
        <div class="panel-body">
		<a href="https://www.cmecde.com/download-first-aid-for-the-pediatrics-clerkship-3rd-edition-pdf-free/">
		<img src="first Aid.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
        <div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-success">
        <div class="panel-heading">Clinical pediatric</div>
        <div class="panel-body">
		<a href = "https://www.scribd.com/document/336570424/clinical-pediatric-pdf">
		<img src="clinical pediatric.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
        <div class="panel-footer"></div>
      </div>
    </div>
  </div>
</div><br>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Healing Children</div>
        <div class="panel-body">
		<a href="https://www.goodreads.com/topic/show/19110463-d0wnload-healing-children-pdf-audiobook-by-kurt-newman-m-d">
		<img src="healing.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
        <div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Case Files Pediatrics</div>
        <div class="panel-body">
		<a href="https://smtebooks.com/book/9345/case-files-pediatrics-5th-edition-pdf">
		<img src="case.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
        <div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Pocket Pediatrics</div>
        <div class="panel-body">
		<a href="http://am-medicine.com/2016/03/pocket-pediatrics-2nd-edition-pdf.html">
		<img src="pocket.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
        <div class="panel-footer"></div>
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
