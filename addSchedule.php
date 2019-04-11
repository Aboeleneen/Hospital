<?php
    session_start();
   if($_SESSION['Role'] != "Admin" AND $_SESSION['Role'] != "Doctor"){
              header('Location:login.php');
         }
  include 'contact.php' ;
   include 'files.php' ;
  //add schedule



   if ($_SERVER['REQUEST_METHOD'] == "POST")
   {
   	$doctorname = $_POST['doctor'];
   	$dayname = $_POST['dayname'];
   	$starttime = $_POST['starttime'];
   	$endtime = $_POST['endtime'];
   	$Serial_Visibility =$_POST['Serial_Visibility'];
   	$patient_time = $_POST['patinet_time'];
   if( ! isset($_GET['do'])){
   	$sql ="INSERT INTO Schdule (doctorname, avaiable_day, starttime ,endtime,patienttime ,serial_visibilty) VALUES ('$doctorname', '$dayname' ,'$starttime','$endtime','$patient_time','$Serial_Visibility')";
   	$con ->exec($sql);
     header('Location: ScheduleList.php?do=" " ');
   }
     else if ($_GET['do'] == 'Edit')
    {

           $id = $_GET['id'];
$stmt = $con ->prepare("UPDATE Schdule SET doctorname = ?, avaiable_day = ?, starttime = ? ,endtime = ?,patienttime = ?,serial_visibilty = ? WHERE id = ? ");
$stmt ->execute(array($doctorname,$dayname,$starttime,$endtime,$patinet_time,$Serial_Visibility,$id));
    header('Location: ScheduleList.php?do=" " ');

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
                    <a class="btn btn-primary btn-lg " href="ScheduleList.php"> <i class="fa fa-list"></i> Schedule List </a>  
                </div>
            </div> 
    <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-10 col-sm-12">



         <form action="addSchedule.php" method="POST" class="form-horizontal" >
   

                   <div class="form-group row">
               <label class="control-label col-sm-2">Doctor Name <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                       <select name="doctor" class="form-control" >
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

          <div class="form-group row">
                       <label class="control-label col-sm-2"> Available Days <i class="text-danger">*</i></label>
                         <div class="col-xs-10">

             <select name="dayname" class="form-control" >
               <option value="">Select Day</option>
             <option value="Sunday">Sunday</option>
             <option  value="Monday">Monday</option>
             <option  value="Tuesday">Tuesday</option>
             <option value="Wednesday">Wednesday</option>
             <option   value="Thursday">Thursday</option>
             <option  value="Friday">Friday</option>
             <option  value="Saturday">Saturday</option>
            
             </select>
                       </div>
             </div>

             <div class="form-group row">
               <label class="control-label col-sm-2">Available Time <i class="text-danger">*</i></label>
                 <div class="col-xs-5">
                      <input type="time" name="starttime"  class="form-control" required="" >
                </div>
                <div class="col-xs-5">
                     <input type="time" name="endtime"   class="form-control" required="" >
                </div>
             </div>

           <div class="form-group row">
                  <label class="control-label col-sm-2">Per Patient Time <i class="text-danger">*</i></label>
                     <div class="col-xs-10">
                        <input type="time" name="patinet_time"  class="form-control"  required="">
                   </div>
           </div>

       <div class="form-group row">
                       <label class="control-label col-sm-2"> Available Days <i class="text-danger">*</i></label>
                         <div class="col-xs-10">
               <select name="Serial_Visibility" class="form-control" >
                    <option value="">Select Option</option>
                    <option   >Sequential</option>
                    <option  >Timestamp</option>
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