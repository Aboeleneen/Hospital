
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
    <h1>Orthopedic Section</h1>      
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
        <div class="panel-heading">tips and trics Orthopedic</div>
        <div class="panel-body">
		<a href="https://www.slideshare.net/yexevkcbu/download-pdf-tips-and-tricks-in-orthopedic-surgery">
		<img src="orth1.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
        <div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-danger">
        <div class="panel-heading">millers review orthopaedics pdf</div>
        <div class="panel-body">
		<a href="https://www.google.fr/maps/d/viewer?mid=13VTRSrUgZp7XiTHb4B4O12sEG2o&hl=fr&ll=26.923679756009093%2C30.802498000000014&z=6">
		<img src="orth2.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
        <div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-success">
        <div class="panel-heading">Practice Of Pediatric Orthopaedics</div>
		<div class="panel-body">
		<a href="https://global-help.org/products/practice_of_pediatric_orthopaedics/">
		<img src="opth3.jpg" class="img-responsive" style="width:100%" alt="Image">
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
        <div class="panel-heading">illustrator orthographic physical assessment</div>
		<div class="panel-body">
        <a href="https://www.google.com.eg/search?ei=3M30WvakB8v5wQLdxojIDA&q=illustrator+orthographic+physical+assessment+pdf&oq=illustrator+orthographic+physical+assessment+&gs_l=psy-ab.1.1.35i39k1l2.2367.2872.0.5189.4.4.0.0.0.0.488.488.4-1.1.0....0...1c.1.64.psy-ab..3.1.488....0.ZrTTgXJ56-A">
		<img src="orth4.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
        <div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Orthopedic Imaging: A Practical Approach Fifth</div>
        <div class="panel-body">
		<a href="https://www.amazon.com/Orthopedic-Imaging-Adam-Greenspan-M-D/dp/1608312879">
		<img src="orth5.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
        <div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Examination of Orthopedic & Athletic Injuries </div>
        <div class="panel-body">
		<a href="https://www.amazon.com/Examination-Orthopedic-Athletic-Injuries-Starkey/dp/080363918X">
		<img src="orth6.jpg" class="img-responsive" style="width:100%" alt="Image">
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
