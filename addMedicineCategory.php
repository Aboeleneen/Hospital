<?php
//
   session_start();  
    if($_SESSION['Role'] != "Admin" AND $_SESSION['Role'] != "Pharmacist"){
              header('Location:login.php');
         }
  include 'contact.php' ;
   include 'files.php' ;
//Add Medicine Category  
  include 'contact.php' ;

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
      $Category= $_POST['Category'];
      $description = $_POST['description'];
      if( ! isset($_GET['do'])){
      $sql = "INSERT INTO medicineCategory(Category,description) VALUES ('$Category' , '$description')" ;

      $con ->exec($sql);
      header('Location: MedicineCategoryList.php?do=" " ');
      }
      else if ($_GET['do'] == 'Edit')
    {

           $id = $_GET['id'];
           $stmt = $con ->prepare("UPDATE medicineCategory SET Category = ? , description = ? WHERE id = ? ");
           $stmt ->execute(array($Category,$description,$id));
           header('Location: MedicineCategoryList.php?do=" " ');
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
 
   <?php include 'navbar/navbar.php' ; ?> 

    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
  
           <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary btn-lg " href="MedicineCategoryList.php"> <i class="fa fa-list"></i>  Medicine Category List </a>  
                </div>
            </div> 
    <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-10 col-sm-12">

   <form action="addMedicineCategory.php" method="POST" class="form-horizontal" >
   <div class="form-group row">
              <label  class="control-label col-sm-2">Category Name <i class="text-danger">*</i></label>
                <div class="col-sm-10">
              <input type="text" name="Category" placeholder="Category" class="form-control" required="">
                </div>
            </div> 

            <div class="form-group row">
              <label  class="control-label col-sm-2">Description <i class="text-danger">*</i></label>
                <div class="col-sm-10">
              <textarea name="description" maxlength="140" rows="7" class="tinymce form-control" required="">
                  
              </textarea>
              </div>
            </div> 
              <   <div class="form-group row">
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