<?php
//
   session_start();
   if($_SESSION['Role'] != "Admin" AND $_SESSION['Role'] != "Accountant"){
              header('Location:login.php');
         }
  include 'contact.php' ;
   include 'files.php' ;
 
  if($_SERVER['REQUEST_METHOD'] == "POST"){
  	$AID = $_POST['AID'];
  	$patient_name = $_POST['patient_name'];
  	$amount = $_POST['amount'];
    $payment_method = $_POST['payment_method'];
  	$receipt_no = $_POST['receipt_no'];
     
     if( ! isset($_GET['do'])){
  	$sql = "INSERT INTO AdvancePayments(AID,patient_name,amount,payment_method,receipt_no) VALUES ('$AID','$patient_name','$amount','$payment_method','$receipt_no')" ;

  	$con ->exec($sql);
    header('Location: AdvancePaymentList.php?do=" " ');
         }
         else if ($_GET['do'] == 'Edit')
    {

           $id = $_GET['id'];
        $stmt = $con ->prepare("UPDATE  AdvancePayments SET AID = ?,patient_name = ?,amount = ?,payment_method = ?,receipt_no = ? WHERE id = ? ");
        $stmt ->execute(array($AID,$patient_name,$amount,$payment_method,$receipt_no,$id));
         header('Location: AdvancePaymentList.php?do=" " ');
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
 
   <?php include 'navbar/navbar.php' ;?> 

    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
  
           <div class="panel-heading no-print">
                <div class="btn-group"> 
                   <a class="btn btn-primary btn-lg " href="AdvancePaymentList.php"> <i class="fa fa-list"></i>  Advance Payment List </a>
                </div>
            </div> 
    <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-10 col-sm-12">

<form action="addAdvancePayment.php" method="POST" class="form-horizontal" >
   <div class="form-group row">
              <label  class="control-label col-sm-2">AID  <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <input type="text" name="AID" placeholder="AID"  class="form-control" required="" >
              </div>
            </div> 

             <div class="form-group row">
              <label  class="control-label col-sm-2">Patient Name <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <select name="patient_name" class="form-control" >
                   <option value="" selected="selected">Select Option</option>
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
              <label  class="control-label col-sm-2">Payment Method  <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <select name="payment_method" class="form-control" >
                   <option value="" selected="selected">Select Option</option>
                  <option  >Cash</option>
                  <option  >Card</option>
                  <option  >Cheque</option>
                </select>
               </div>
            </div> 


             <div class="form-group row">
              <label  class="control-label col-sm-2">Amount <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <input type="text" name="amount" placeholder="amount"  class="form-control" required="">
               </div>
            </div> 

             <div class="form-group row">
              <label  class="control-label col-sm-2">Receipt No<i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <input type="receipt_no" name="receipt_no" placeholder="Receipt No"  class="form-control" required=""> 
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