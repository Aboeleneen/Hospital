

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
    <h1>Gynaecology and Obstetrics Section</h1>      
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
      <a class="navbar-brand" href="#">Bouns Team</a>
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
        <div class="panel-heading">Gynaecology and Obstetrics</div>
        <div class="panel-body">
		<a href = "https://www.researchgate.net/publication/224982799_HANDBOOK_OF_OBSTETRICS_AND_GYNAECOLOGY">
		<img src="first obs.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
        <div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-danger">
        <div class="panel-heading">Clinical Gynaecology and Obstetrics</div>
        <a href="https://www.elsevier.com/books/clinical-obstetrics-and-gynaecology/magowan/978-0-7020-5408-2">
		<div class="panel-body"><img src="clinical ops.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
        <div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-success">
        <div class="panel-heading">Beside Gynaecology and Obstetrics books</div>
        <div class="panel-body">
		<a href="https://www.google.com.eg/search?q=Beside+Gynaecology+and+Obstetrics+books&oq=Beside+Gynaecology+and+Obstetrics+books&aqs=chrome..69i57.15084j0j7&sourceid=chrome&ie=UTF-8">
		<img src="beside.jpg" class="img-responsive" style="width:100%" alt="Image">
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
        <div class="panel-heading">DC Dutta’s Textbook of Gynecology sixth Edition, Kindle Edition</div>
        <div class="panel-body">
		<a href="https://www.amazon.in/DC-Duttas-Textbook-Gynecology-Dutta-ebook/dp/B01GQ3IM3G">
		<img src="51evV1WWT+L._SX260_.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
        <div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Textbooks of Obstetrics & Gynaecology</div>
        <div class="panel-body">
		<a href="https://desimedicos.com/textbooks-obstetrics-gynaecology-comparative-review/">
		<img src="dc.jpg" class="img-responsive" style="width:100%" alt="Image">
		</a>
		</div>
        <div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">DC Dutta’s Textbook of Gynecology</div>
        <div class="panel-body">
		<a href="https://www.amazon.in/DC-Duttas-Textbook-Gynecology-Dutta-ebook/dp/B01GQ3IM3G">
		<img src="dc2.jpg" class="img-responsive" style="width:100%" alt="Image">
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
