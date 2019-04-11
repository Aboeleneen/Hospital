<?php
 
 // ADD INSURANCE

  session_start();
   if($_SESSION['Role'] != "Admin"){
              header('Location:login.php');
         }
  include 'contact.php' ;
   include 'files.php' ;


 if($_SERVER['REQUEST_METHOD'] == "POST"){
 	$insurance = $_POST['insurance'];
 	$service = $_POST['service'];
 	$discout = $_POST['discout'];
 	$remark = $_POST['remark'];
 	$insurance_no =$_POST['insurance_no'];
 	$insurance_code = $_POST['insurance_code'];
 	$disease_name = $_POST['disease_name'];
 	$disease_charge =$_POST['disease_charge'];
 	$hospital_rate = $_POST['hospital_rate'];
 	$insurane_rate = $_POST['insurane_rate'];
 	$total =$_POST['total'];
    
    if( ! isset($_GET['do'])){
 	$sql = "INSERT INTO insurances(insurance,service,discout,Remark,insurance_no,insurance_code,disease_name,disease_charge,hospital_rate,insurane_rate,total) VALUES ('$insurance','$service','$discout','$remark','$insurance_no','$insurance_code','$disease_name','$disease_charge','$hospital_rate','$insurane_rate','$total')";

 	$con ->exec($sql);
 	 header('Location: InsuranceLists.php?do=" " ');
      }
      else if ($_GET['do'] == 'Edit')
    {

           $id = $_GET['id'];
			$stmt = $con ->prepare("UPDATE insurances SET insurance = ?,service = ?,discout = ?,Remark = ?,insurance_no =?,insurance_code =?,disease_name = ?,disease_charge = ? ,hospital_rate = ?,insurane_rate = ?,total = ? WHERE id = ? ");
			$stmt ->execute(array($insurance,$service,$discout,$remark,$insurance_no,$insurance_code,$disease_name,$disease_charge,$hospital_rate,$insurane_rate,$total ,$id));

			 header('Location: InsuranceLists.php?do=" " ');


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
                    <a class="btn btn-primary btn-lg " href="InsuranceLists.php"> <i class="fa fa-list"></i>  Insurance List </a>  
                </div>
            </div> 
    <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-10 col-sm-12">
       <form action="addInsurance.php" method="POST" class="form-horizontal" >
				  <div class="form-group row">
			              <label  class="control-label col-sm-2">Insurance Name <i class="text-danger">*</i></label>
			                <div class="col-sm-10">
			                <input type="text" name="insurance" placeholder="insurance name" class="form-control" required=""> 
			               </div>
			            </div>

			             <div class="form-group row">
			              <label  class="control-label col-sm-2">Service Tax <i class="text-danger">*</i></label>
			                <div class="col-sm-10">
			                <input type="text" name="service" placeholder="service tax"  class="form-control" required=""> 
			                </div>
			            </div>
			              
			            <div class="form-group row">
			              <label  class="control-label col-sm-2">Discount <i class="text-danger">*</i></label>
			                <div class="col-sm-10">
			                <input type="text" name="discout" placeholder="discout"  class="form-control" required=""> 
			                </div>
			            </div>

			            <div class="form-group row">
			              <label  class="control-label col-sm-2">Remark <i class="text-danger">*</i></label>
			                <div class="col-sm-10">
			                <textarea name="remark" placeholder="Remark"  class="tinymce form-control" required="" ></textarea>  
			               </div>
			            </div>

			             <div class="form-group row">
			              <label  class="control-label col-sm-2">Insurance No. <i class="text-danger">*</i></label>
			                <div class="col-sm-10">
			                <input type="text" name="insurance_no" placeholder="insurance NO"   class="form-control" required=""> 
			                 </div>
			            </div>
			            <div class="form-group row">
			              <label  class="control-label col-sm-2">Insurance Code <i class="text-danger">*</i></label>
			                <div class="col-sm-10">
			                <input type="text" name="insurance_code" placeholder="insurance Code"  class="form-control" required=""> 
			               </div>
			            </div>
			                  
			             <div class="form-group row">
			              <label  class="control-label col-sm-2">Disease Charge <i class="text-danger">*</i></label>
			                <div class="col-sm-5">
			                     <input type="text" name="disease_name" placeholder="Disease name"  class="form-control" required="">
			              </div>
			               <div class="col-sm-5">
			                <input type="text" name="disease_charge" placeholder="Disease Charge"  class="form-control" required=""> 
			                </div>
			            </div>

			            <div class="form-group row">
			              <label  class="control-label col-sm-2">Hospital Rate <i class="text-danger">*</i></label>
			                <div class="col-sm-10">
			                <input type="text" name="hospital_rate" placeholder="Hospital rate" class="form-control" required="">  
			              </div>
			            </div> 
			            <div class="form-group row">
			              <label  class="control-label col-sm-2">Insurance Rate <i class="text-danger">*</i></label>
			                <div class="col-sm-10">
			                <input type="text" name="insurane_rate" placeholder="insurance rate"  class="form-control" required="">  
			               </div>
			            </div> 
			            <div class="form-group row">
			              <label  class="control-label col-sm-2">Total <i class="text-danger">*</i></label>
			                <div class="col-sm-10">
			                <input type="text" name="total" placeholder="Total"  class="form-control" required="" > 
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

