<?php
//
   session_start();
   if($_SESSION['Role'] != "Admin"){
              header('Location:login.php');
         }    
  include 'contact.php' ;
   include 'files.php' ;
// add new bed 
include 'contact.php' ;
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$type = $_POST['type'];
	$description = $_POST['description'];
	$capacity =$_POST['capacity'];
	$charge = $_POST['charge'];
   
   if( ! isset($_GET['do'])){
	$sql = "INSERT INTO Beds(type,description,capacity,charge) VALUES ('$type','$description','$capacity','$charge')" ;

	$con ->exec($sql);

	header("Location:BedList.php");
     }

     else if ($_GET['do'] == 'Edit')
     {
     	$id = $_GET['id'];
     	$stmt = $con ->prepare("UPDATE beds SET type= ? ,description = ?,capacity = ? ,charge = ? WHERE id = ?");
     	$stmt ->execute(array($type,$description,$capacity,$charge,$id));

     	header("Location:BedList.php");
     }
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	    <div id="mySidenav" class="sidenav">
           <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <?php include 'sidebar/sidebar.php' ;?>
    </div> 
    <div id="main">
 
   <?php include 'navbar/navbar.php'; ?> 

    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
  
           <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary btn-lg " href="BedList.php"> <i class="fa fa-list"></i>  Bed List </a>  
                </div>
            </div> 
    <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-10 col-sm-12">
            <form action="addBed.php" method="POST" class="form-horizontal" >
	 <div class="form-group row">
              <label  class="control-label col-sm-2">Bed Type <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <input type="text" name="type" placeholder="Bed type"  class="form-control" required="">
             </div>
            </div> 

            <div class="form-group row">
              <label  class="control-label col-sm-2">Description <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <textarea name="description" placeholder="description"  maxlength="140" rows="7" class="tinymce form-control" required="" ></textarea>
             </div>
            </div> 

             <div class="form-group row">
              <label  class="control-label col-sm-2">Bed Capacity <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <input type="number" name="capacity"  class="form-control" required="">
                 </div>
            </div> 

             <div class="form-group row">
              <label  class="control-label col-sm-2">Charge <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <input type="text" name="charge" placeholder="charge"   class="form-control" required="" >
                  </div>
            </div> 


                <div class="form-group row">
                <div class="col-sm-offset-3 col-sm-6">
                               <input type="submit" name="" value="save" class="btn btn-success btn-lg " >
                               <button type="reset" class="btn btn-primary btn-lg " > Reset</button>
               </div>
           </div>
                  


          </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</body>
</html>