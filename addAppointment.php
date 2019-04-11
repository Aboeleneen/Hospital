<?php
 session_start();
  if($_SESSION['Role'] != "Admin" AND $_SESSION['Role'] != "Doctor" AND $_SESSION['Role'] != "Receptionist" AND $_SESSION['Role'] != "Representative"  AND $_SESSION['Role'] != "Patient"){
              header('Location:login.php');
         }
  include 'contact.php' ;
   include 'files.php' ;
  // add new appointment   

   if($_SERVER['REQUEST_METHOD'] == "POST"){

   	$patient_name = $_POST['patient_name'];
   	$department =$_POST['department'];
   	$doctor_name = $_POST['doctor_name'];
   	$appointment = $_POST['appointment'];
   	$problem = $_POST['problem'];
   
  if( ! isset($_GET['do'])){

   $sql="INSERT INTO appointments(patient,department,doctor,appointment,problem) VALUES ('$patient_name','$department','$doctor_name','$appointment','$problem')";
   
   $con ->exec($sql);

   header('Location: appointments.php?do=" " ');
 }
 else if ($_GET['do'] == 'Edit')
    {

           $id = $_GET['id'];
$stmt = $con ->prepare("UPDATE appointments SET patient = ? ,department = ? , doctor = ?, appointment = ? ,problem = ? WHERE id = ?");
$stmt ->execute(array($patient_name,$department,$doctor_name,$appointment,$problem,$id));
header('Location: appointments.php?do=" " ');
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
 
   <?php include 'navbar/navbar.php' ;?> 

    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
  
           <div class="panel-heading no-print">
                <div class="btn-group"> 
                   <a class="btn btn-primary btn-lg " href="Appointments.php"> <i class="fa fa-list"></i> Appointments list </a>
                </div>
            </div> 
    <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-10 col-sm-12"> 


          <form action="addAppointment.php" method="POST" class="form-horizontal" >
                    <div class="form-group row" >
                         <label class="control-label col-sm-2">Patient Name <i class="text-danger">*</i></label>
                           <div class="col-xs-10">
                       <select name="patient_name" class="form-control" >
                         <option value="">Select Patient</option>
                         <?php
                         $stmt = $con  ->prepare("SELECT fullname FROM patients ");
                         $stmt ->execute();

                         $array = $stmt->fetchAll(PDO::FETCH_COLUMN);

                        foreach ($array as $value) {
                           echo "<option>" .$value . "</option>";
                              }
                        ?>
                      </select>
                     </div>
                   </div> 


               <div class="form-group row" >
                         <label class="control-label col-sm-2">Department <i class="text-danger">*</i></label>
                           <div class="col-xs-10">

                      <select name="department" class="form-control">
                          <option >Select Department</option>
                              <?php
                          $stmt = $con  ->prepare("SELECT department FROM departments ");
                              $stmt ->execute();

                          $array = $stmt->fetchAll(PDO::FETCH_COLUMN);

                         foreach ($array as $value) {
                          echo "<option>" .$value . "</option>";
                         }
                           ?>
                      
                    </select>
                    </div>
                   </div>


                 <div class="form-group row" >
                      <label class="control-label col-sm-2">Doctor Name <i class="text-danger">*</i></label>
                           <div class="col-xs-10">
                              <select name="doctor_name"  class="form-control" >
                                 <option value="">Select Doctor</option>
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

                <div class="form-group row" >
                      <label class="control-label col-sm-2">Appointment <i class="text-danger">*</i></label>
                           <div class="col-xs-10">

                      <input type="Datetime-local" class="form-control" name="appointment" placeholder="appointment" required="" >
                       </div>
                </div>

                <div class="form-group row" >
                      <label class="control-label col-sm-2">Problem <i class="text-danger">*</i></label>
                           <div class="col-xs-10">

                            <textarea name="problem" class="tinymce form-control" placeholder="Problem" required="">
                               
                           </textarea>
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