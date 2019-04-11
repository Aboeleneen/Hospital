<?php
//
   session_start();
   if($_SESSION['Role'] != "Admin" AND $_SESSION['Role'] != "Doctor"){
              header('Location:login.php');
         }
  include 'contact.php' ;
   include 'files.php' ;


if($_SERVER['REQUEST_METHOD'] == "POST"){ 
  $fullname = $_POST['fullname'];
  $date_of_birth = $_POST['date_of_birth'];
  $title = $_POST['title'];
  $description = $_POST['description'];  
  $doctor = $_POST['doctor'];

   if( ! isset($_GET['do'])){
  $sql = "INSERT INTO Birthreports(fullname,date_of_birth,title,description,doctor) VALUES ('$fullname','$date_of_birth','$title','$description','$doctor')";
      $con ->exec($sql);
      header('Location: BirthReports.php?do=" " ');
      }

      else if ($_GET['do'] == 'Edit')
          {

                 $id = $_GET['id'];
      $stmt = $con ->prepare("UPDATE Birthreports SET fullname = ?,date_of_birth = ?,title = ?,description = ?,doctor = ? WHERE id = ? ");
      $stmt ->execute(array($fullname,$date_of_birth,$title,$description,$doctor,$id));
      header('Location: BirthReports.php?do=" " ');
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
      <?php include 'sidebar/sidebar.php'; ?>
    </div> 
    <div id="main">
 
   <?php include 'navbar/navbar.php'; ?>

    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
  
           <div class="panel-heading no-print">
                <div class="btn-group"> 
                     <a class="btn btn-primary btn-lg " href="BirthReports.php"> <i class="fa fa-list"></i>  Birth Reports </a
                </div>
            </div> 
    <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-10 col-sm-12">
         <form action="addBirthreport.php" method="POST" class="form-horizontal" >
   <div class="form-group row">
              <label  class="control-label col-sm-2">Full Name <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <input type="text" name="fullname" placeholder="fullname" class="form-control" required="">
               </div>
            </div> 


            <div class="form-group row">
              <label  class="control-label col-sm-2">Date <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <input type="date" name="date_of_birth" placeholder="date" class="datepicker form-control" >
               </div>
            </div> 

             <div class="form-group row">
              <label  class="control-label col-sm-2">Title <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <input type="text" name="title" placeholder="title" class="form-control" required="" >
                </div>
            </div> 


              <div class="form-group row">
              <label  class="control-label col-sm-2">Description <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <textarea name="description" placeholder="description" maxlength="140" rows="7" class="tinymce form-control" required="">  </textarea>
               </div>
            </div> 

              <div class="form-group row">
              <label  class="control-label col-sm-2">Doctor Name <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                 <select name="doctor" class="form-control" >
                   <option value="" selected="selected">Select Option</option>
                  <?php
                  $stmt = $con  ->prepare("SELECT concat('DR.',fullname ) FROM doctors ");
                      $stmt ->execute();

                      $array = $stmt->fetchAll(PDO::FETCH_COLUMN);

                     foreach ($array as $value) {
                      echo "<option>" .$value . "</option>";
                     }
                       ?>
                   </select>
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