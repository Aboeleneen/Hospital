<?php
  //add service 
  session_start();
    if($_SESSION['Role'] != "Admin" AND $_SESSION['Role'] != "Accountant"){
              header('Location:login.php');
         }
  include 'contact.php' ;
   include 'files.php' ;

   if($_SERVER['REQUEST_METHOD'] == "POST"){
   	$Service = $_POST['service'];
   	$description = $_POST['description'];
   	$quantity = $_POST['quantity'];
   	$rate = $_POST['rate'];
      
       if( ! isset($_GET['do'])){
   	$sql = "INSERT INTO Services(Service,description,quantity,rate) VALUES ('$Service','$description','$quantity','$rate')" ;

   	$con ->exec($sql);
      header('Location: ServiceList.php?do=" " ');
   }
     else if ($_GET['do'] == 'Edit')
    {

     $id = $_GET['id'];
$stmt = $con ->prepare("UPDATE Services SET Service = ?,description = ?,quantity = ? ,rate = ? WHERE id = ? ");
$stmt ->execute(array($Service,$description,$quantity,$rate,$id));

    header('Location: ServiceList.php ');
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
 
   <?php include 'navbar/navbar.php'  ;?> 

    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
  
           <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary btn-lg " href="ServiceList.php"> <i class="fa fa-list"></i>  Service List </a> 
                </div>
            </div> 
    <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-10 col-sm-12">
        <form action="addService.php" method="POST" class="form-horizontal" >
               <div class="form-group row">
                          <label  class="control-label col-sm-2">Service Name <i class="text-danger">*</i></label>
                            <div class="col-sm-10">
                            <input type="text" name="service" placeholder="Service Name"  class="form-control"  required="">
                              </div>
                        </div> 
                         <div class="form-group row">
                          <label  class="control-label col-sm-2">Description <i class="text-danger">*</i></label>
                            <div class="col-sm-10">
                            <textarea name="description" placeholder="description" class="tinymce form-control" required=""> </textarea>
                              </div>
                        </div> 

                        <div class="form-group row">
                          <label  class="control-label col-sm-2">Quantity <i class="text-danger">*</i></label>
                            <div class="col-sm-10">
                            <input type="text" name="quantity" placeholder="Quantity" class="form-control" required="">
                            </div>
                        </div> 

                        <div class="form-group row">
                          <label  class="control-label col-sm-2">Rate <i class="text-danger">*</i></label>
                            <div class="col-sm-10">
                            <input type="text" name="rate" placeholder="Rate" class="form-control" required="">
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