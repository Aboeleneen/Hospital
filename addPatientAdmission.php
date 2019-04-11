<?php
//
   session_start();
   if($_SESSION['Role'] != "Admin" AND $_SESSION['Role'] != "Accountant"){
              header('Location:login.php');
         }
  include 'contact.php' ;
   include 'files.php' ;
   // add patient admission
   include 'contact.php' ;

   if($_SERVER['REQUEST_METHOD'] == "POST"){

   	  $patient_name = $_POST['patient_name'];
   	  $doctor = $_POST['doctor'];
   	  $Admission_Date = $_POST['Admission_Date'];
   	  $Discharge_Date = $_POST['Discharge_Date'];
   	  $Package_Name = $_POST['Package_Name'];
   	  $insurance = $_POST['insurance'];
   	  $policy_no = $_POST['policy_no'];
   	  $agent_name = $_POST['agent_name'];
   	  $Guardian_Name = $_POST['Guardian_Name'];
   	  $Guardian_Relation = $_POST['Guardian_Relation'];
   	  $Guardian_Contact = $_POST['Guardian_Contact'];
      $Guardian_Address = $_POST['Guardian_Address'];
      
      if( ! isset($_GET['do'])){
      $sql ="INSERT INTO patientAdmission(patient_name,doctor,Admission_Date,Discharge_Date,Package_Name,insurance,policy_no,agent_name,Guardian_Name,Guardian_Relation,Guardian_Contact,Guardian_Address) VALUES ('$patient_name','$doctor','$Admission_Date','$Discharge_Date','$Package_Name','$insurance','$policy_no','$agent_name','$Guardian_Name','$Guardian_Relation','$Guardian_Contact','$Guardian_Address')" ;

      $con ->exec($sql);
      header('Location: PatientAdmissionList.php?do=" " ');

         }
         else if ($_GET['do'] == 'Edit')
    {

           $id = $_GET['id'];
           $stmt = $con ->prepare("UPDATE patientAdmission SET patient_name = ?,doctor = ?,Admission_Date = ?,Discharge_Date = ?,Package_Name = ?,insurance = ?,policy_no = ?,agent_name = ?,Guardian_Name = ?,Guardian_Relation = ?,Guardian_Contact = ?,Guardian_Address = ? WHERE id = ? ");
           $stmt ->execute($patient_name,$doctor,$Admission_Date,$Discharge_Date,$Package_Name,$insurance,$policy_no,$agent_name,$Guardian_Name,$Guardian_Relation,$Guardian_Contact,$Guardian_Address,$id);
           header('Location: PatientAdmissionList.php?do=" " ');

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
                   <a class="btn btn-primary btn-lg " href="PatientAdmissionList.php"> <i class="fa fa-list"></i>  Patient Admission List </a>  
                </div>
            </div> 
    <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-10 col-sm-12">



         <form action="addPatientAdmission.php" method="POST" class="form-horizontal" >
   <div class="form-group row">
               <label class="control-label col-sm-2">Patient Name <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <select name="patient_name" class="form-control" >
                        <option value="" selected="selected">Select Option</option>
                            <?php
                            $stmt = $con  ->prepare("SELECT fullname FROM patients ");
                            $stmt ->execute();

                        $array = $stmt->fetchAll(PDO::FETCH_COLUMN);

                       foreach ($array as $value) {
                        echo "<option> " .$value . "</option>";
                       }
                         ?>
                    </select> 
                 </div>
            </div>

            <div class="form-group row">
               <label class="control-label col-sm-2">Doctor Name <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
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
               <label class="control-label col-sm-2">Admission Date <i class="text-danger">*</i></label>
                 <div class="col-xs-10">

                    <input type="date" name="Admission_Date" class="datepicker form-control" required="" > 

                </div>
            </div>

             <div class="form-group row">
               <label class="control-label col-sm-2">Discharge Date <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <input type="date" name="Discharge_Date" class="datepicker form-control" required="" > 

                </div>
            </div>


              <div class="form-group row">
               <label class="control-label col-sm-2">Package Name <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <select name="Package_Name" class="form-control"  >
                      <option value="" selected="selected">Select Option</option>
                         <?php
                     $stmt = $con  ->prepare("SELECT package FROM Packages ");
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
               <label class="control-label col-sm-2">Insurance Name <i class="text-danger">*</i></label>
                 <div class="col-xs-10">

                    <select name="insurance" class="form-control" >
                      <option value="" selected="selected">Select Option</option>
                         <?php
                     $stmt = $con  ->prepare("SELECT insurance FROM insurances ");
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
               <label class="control-label col-sm-2">Policy No. <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <input type="text" name="policy_no" placeholder="policy NO"  class="form-control" required="">  
                 </div>
            </div>

            <div class="form-group row">
               <label class="control-label col-sm-2">Agent Name <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <input type="text" name="agent_name" placeholder="Agent Name"  class="form-control" required="" >
                 </div>
            </div>
     
            <div class="form-group row">
               <label class="control-label col-sm-2">Guardian Name <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                   <input type="text" name="Guardian_Name" placeholder="Guardian Name"  class="form-control" required="" >   
               </div>
            </div>

             <div class="form-group row">
               <label class="control-label col-sm-2">Guardian Relation <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <input type="text" name="Guardian_Relation" placeholder="Guardian Relation"  class="form-control" required=""> 
              </div>
            </div>


              <div class="form-group row">
               <label class="control-label col-sm-2">Guardian Contact <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <input type="text" name="Guardian_Contact" placeholder="Guardian Contact"  class="form-control" required="">    
                 </div>
            </div>


             <div class="form-group row">
               <label class="control-label col-sm-2">Guardian Address <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <input type="text" name="Guardian_Address" placeholder="Guardian Address"  class="form-control" required=""> 
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