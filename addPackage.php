<?php
    
    // add Package   
 session_start();
   if($_SESSION['Role'] != "Admin"){
              header('Location:login.php');
         }
  include 'contact.php' ;
   include 'files.php' ;
    

   if($_SERVER['REQUEST_METHOD'] == "POST"){

   	$package = $_POST['package'];
   	$description = $_POST['description'];
   	$discount = $_POST['discount'];
      $Service = $_POST['service'];
      $quantity = $_POST['quantity'];
      $rate = $_POST['rate'];
       
       if( ! isset($_GET['do'])){
   	$sql = "INSERT INTO Packages(package,description,Service,quantity,rate,discount) VALUES ('$package','$description','$Service','$quantity','$rate','$discount')" ;

   	$con ->exec($sql);
      header('Location: PackageList.php?do=" " ');
            }
            else if ($_GET['do'] == 'Edit')
            {

           $id = $_GET['id'];
           $stmt = $con ->prepare("UPDATE Packages SET package = ?,description = ?,Service = ?,quantity = ?,rate = ?,discount = ? WHERE id = ? ");
           $stmt ->execute(array($package,$description,$Service,$quantity,$rate,$discount,$id));
           header('Location: PackageList.php?do=" " ');
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
      <?php include 'sidebar/sidebar.php' ; ?>
    </div> 
    <div id="main">
 
   <?php include 'navbar/navbar.php' ; ?> 

    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
  
           <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary btn-lg " href="PackageList.php"> <i class="fa fa-list"></i>  Package List </a> 
                </div>
            </div> 
    <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-10 col-sm-12">


            <form action="addPackage.php" method="POST" class="form-horizontal" >
          
           <div class="form-group row">
              <label  class="control-label col-sm-2">Package Name <i class="text-danger">*</i></label>
                <div class="col-sm-10">
              <input type="text" name="package" placeholder="package Name" class="form-control" required="" > 
               </div>
            </div> 

            <div class="form-group row">
              <label  class="control-label col-sm-2">Description <i class="text-danger">*</i></label>
                <div class="col-sm-10">
              <textarea name="description" placeholder="description" maxlength="140" rows="7" class="tinymce form-control" required=""></textarea> 
              </div>
            </div> 

            <div class="form-group row">
              <label  class="control-label col-sm-2">Package Including <i class="text-danger">*</i></label>
                <div class="col-sm-3">
              <input type="text" name="service" placeholder="Service Name"  class="form-control" required="" >
              </div>
               <div class="col-sm-3">
              <input type="text" name="quantity" placeholder="Quantity"  class="form-control"  required=""> 
               </div>
            <div class="col-sm-3">
              <input type="text" name="rate" placeholder="Rate"  class="form-control" required=""> 
             </div>
            </div> 
             
    

            <div class="form-group row">
              <label  class="control-label col-sm-2">Discount <i class="text-danger">*</i></label>
                <div class="col-sm-10">
              <input type="text" name="discount" placeholder="discount"  class="form-control"  required=""> 
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