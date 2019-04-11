

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
    <h1>Ophthalmology Section</h1>      
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
        <div class="panel-heading">basic ophthalmology</div>
        <div class="panel-body">
		<a href="https://docs.google.com/file/d/0BxvjJ4mG_bfYVVhrTmgyS3h0bXc/view">
		<img src="oph1.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
        <div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-danger">
        <div class="panel-heading">clinical ophthalmology</div>
        <div class="panel-body">
		<a href="http://www.medicosrepublic.com/kanskis-clinical-ophthalmology-pdf-free-download/">
		<img src="oph2.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
        <div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-success">
        <div class="panel-heading">Clinical Ophthalmology: A Systematic Approach</div>
        <div class="panel-body">
		<a href="https://www.amazon.com/Clinical-Ophthalmology-Systematic-Approach-Consult/dp/0702040932">
		<img src="oph3.jpg" class="img-responsive" style="width:100%" alt="Image">
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
        <div class="panel-heading">The Massachusetts Eye and Ear Infirmary Illustrated Manual of Ophthalmology</div>
        <div class="panel-body">
		<a href="https://www.amazon.com/Massachusetts-Infirmary-Illustrated-Manual-Ophthalmology/dp/1455776440">
		<img src="oph4.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
        <div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">textbook of ophthalmology pdf</div>
        <div class="panel-body">
		<a href="https://www.google.com.eg/search?q=textbook+of+ophthalmology+pdf&oq=textbook+of+oph&aqs=chrome.1.69i57j0l5.18960j0j7&sourceid=chrome&ie=UTF-8">
		<img src="oph5.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
		<div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Ophthalmology: An Illustrated Colour Text</div>
        <div class="panel-body">
		<a href="https://www.amazon.co.uk/Ophthalmology-Illustrated-Colour-Text-3e/dp/0702030597">
		<img src="oph6.jpg" class="img-responsive" style="width:100%" alt="Image">
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
