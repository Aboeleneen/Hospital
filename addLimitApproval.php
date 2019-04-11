<?php
//
   session_start();
   if($_SESSION['Role'] != "Admin" AND $_SESSION['Role'] != "Accountant"){
              header('Location:login.php');
         }
  include 'contact.php' ;
   include 'files.php' ;
  // add Limit Approval   
  
  include 'contact.php';
  
  if($_SERVER['REQUEST_METHOD'] == "POST"){
  	  $patient_name = $_POST['patient_name'];
  	  $Room =$_POST['room'];
  	  $disease = $_POST['disease'];
  	  $disease_details = $_POST['disease_details'];
  	  $consultant = $_POST['consultant'];
  	  $policy_name = $_POST['policy_name'];
  	  $policy_no = $_POST['policy_no'];
  	  $policy_holder_name = $_POST['policy_holder_name'];
  	  $insurance = $_POST['insurance'];
  	  $disease_name = $_POST['disease_name'];
  	  $disease_charge = $_POST['disease_charge'];
  	  $total = $_POST['total'];

      if( ! isset($_GET['do'])){

  	  $sql = "INSERT INTO LimitApproval(patient_name,Room,disease,disease_details,consultant,policy_name,policy_no,policy_holder_name,insurance,disease_name,disease_charge,total) VALUES ('$patient_name','$Room','$disease','$disease_details','$consultant','$policy_name','$policy_no','$policy_holder_name','$insurance','$disease_name','$disease_charge','$total')" ;

  	  $con ->exec($sql);
     header('Location: LimitApprovalList.php?do=" " ');
    }

       else if ($_GET['do'] == 'Edit')
    {

           $id = $_GET['id'];
           $stmt = $con ->prepare("UPDATE LimitApproval SET patient_name = ?,Room = ?,disease = ?,disease_details = ?,consultant = ?,policy_name = ?,policy_no = ?,policy_holder_name = ?,insurance = ?,disease_name = ?,disease_charge = ?,total = ? WHERE id = ? ");
           $stmt ->execute(array($patient_name,$Room,$disease,$disease_details,$consultant,$policy_name,$policy_no,$policy_holder_name,$insurance,$disease_name,$disease_charge,$total,$id));
          header('Location: LimitApprovalList.php?do=" " ');

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
                    <a class="btn btn-primary btn-lg " href="LimitApprovalList.php"> <i class="fa fa-list"></i>  Limit Approval List </a>  
                </div>
            </div> 
    <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-10 col-sm-12">
     <form action="addLimitApproval.php" method="POST" class="form-horizontal" >
   <div class="form-group row">
               <label class="control-label col-sm-2">Patient Name <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                  <select name="patient_name" class="form-control" >
                       <option value="" selected="selected">Select Patient</option>
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


             <div class="form-group row">
               <label class="control-label col-sm-2">Room No <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                  <input type="text" name="room" placeholder="Room No"  class="form-control" required="" > 
               </div>
            </div>

            <div class="form-group row">
               <label class="control-label col-sm-2">Disease Details <i class="text-danger">*</i></label>
                 <div class="col-xs-5">
                  <input type="text" name="disease" placeholder="disease"   class="form-control" > 
                 </div>
                   <div class="col-xs-5">
                  <textarea name="disease_details" placeholder="Disease details" class="tinymce form-control" required=""> </textarea> 
               </div>
               </div>
             
              <div class="form-group row">
               <label class="control-label col-sm-2">Consultant Name<i class="text-danger">*</i></label>
                 <div class="col-xs-10">

                  <select name="consultant" class="form-control" >
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
               <label class="control-label col-sm-2">policy Name<i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                  <input type="text" name="policy_name" placeholder="policy Name"  class="form-control" required="" > 
                   </div>
               </div>

               <div class="form-group row">
               <label class="control-label col-sm-2">policy No<i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                  <input type="text" name="policy_no" placeholder="policy No"   class="form-control" required="" > 
                 </div>
               </div>

                <div class="form-group row">
               <label class="control-label col-sm-2">policy holder Name<i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                  <input type="text" name="policy_holder_name" placeholder="policy holder Name"  class="form-control" required="" > 
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
               <label class="control-label col-sm-2">Approval Charge Break up<i class="text-danger">*</i></label>
                 <div class="col-xs-5">
                  <input type="text" name="disease_name" placeholder="disease name" class="form-control" > 
                  </div>
                  <div class="col-xs-5">
                  <input type="text" name="disease_charge" placeholder="disease charge"  class="form-control" required="" > 
                 </div>
               </div>

               <div class="form-group row">
               <label class="control-label col-sm-2">Total<i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                       <input type="text" name="total" placeholder="total" class="form-control" required="" > 

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