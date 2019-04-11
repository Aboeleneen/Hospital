  <?php 
            session_start();
 
     ?>
     

      
 <?php
    //Advance Payment Lists
  $do = isset($_GET['do']) ? $_GET['do'] : 'manage' ;
    include 'contact.php' ;
    if($do != 'Edit' and $do !='delete'){




  

    global $i;

     $i = 1 ;

      $sql = $con->prepare("SELECT * FROM advancepayments ");
        $sql->execute();

         ?>
  
       
   
    <!--  table area -->
    <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
             
           <?php include 'files.php' ;?>
            <?php include 'sidebar/sidebar.php' ; ?>

    </div>

    <div id="main">
      <?php include 'navbar/navbar.php' ; ?>
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group" style="position: relative;"> 
                    <a class="btn btn-success btn-lg" href="addAdvancePayment.php"> <i class="fa fa-plus"></i>  Add Advance Payment </a>  
                   
                </div>
            </div> 

    <div class="panel-body">
        <div  class="table-responsive ">
               <table class="datatable table table-striped table-bordered"  cellspacing="0" width="100%">
                 <h1 class="btn btn-success btn-block btn-lg" >Advance Payment List </h1>
                <thead>
                        <tr>
                            <th>NO</th>
                            <th>AID</th>
                            <th>Patient Name</th> 
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Receipt No</th> 
                             <th>Action</th>
                        </tr>
                    </thead>
 
   <?php 
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        ?>
         <tbody>
         <tr>
         <td> <?php echo $i; $i++ ;?>
          <td><?php echo $row['AID'];?></td>
         <td><?php echo $row['patient_name'];?></td> 
         <td><?php echo $row['amount'];?></td> 
         <td><?php echo $row['payment_method'];?></td>
           <td><?php echo $row['receipt_no'];?></td> 
           <td><a class="btn btn-primary" href="AdvancePaymentList.php?do=Edit&id=<?php echo $row['id'] ?>"> edit</a>
                <a class="btn btn-danger" href="AdvancePaymentList.php?do=delete&id=<?php echo $row['id'] ?>"> delete</a></td> 
        </tr>
        <?php } ?></tbody>
      </table>
       </div>
        </div>
    </div> 
    </div> 
  </div>
     <?php  }else if($do == 'Edit'){
    if($_SESSION['Role'] != "Admin" AND $_SESSION['Role'] != "Accountant"){
              header('Location:login.php');
         }
          $id = $_GET['id'];
           $sql = $con->prepare("SELECT * FROM advancepayments Where id = ? ");
           $sql->execute(array($id));
           $row = $sql ->fetch();
           $count =$sql ->rowCount();

           $AID = $row['AID'];
           $patient_name = $row['patient_name'];
           $amount = $row['amount'];
           $payment_method = $row['payment_method'];
           $receipt_no = $row['receipt_no'];

           if($count > 0)
           { ?>
                <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
             
           <?php include 'files.php'  ; ?>
            <?php include 'sidebar/sidebar.php' ; ?>

    </div>
    <div id="main">
      <?php include 'navbar/navbar.php' ; ?>
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
            <form action="addAdvancePayment.php?do=Edit&id=<?php  echo $row['id'] ?>" method="POST" class="form-horizontal" >

            <div class="form-group row">
              <label  class="control-label col-sm-2">AID  <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <input type="text"  name="AID" placeholder="AID"value="<?php echo $AID ?>" class="form-control" >
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
                  <option <?php if($payment_method == "Cash"){ echo ' selected="selected"'; } ?> >Cash</option>
                  <option <?php if($payment_method == "Card"){ echo ' selected="selected"'; } ?> >Card</option>
                  <option <?php if($payment_method == "Cheque"){ echo ' selected="selected"'; } ?> >Cheque</option>
                </select>
               </div>
            </div> 


             <div class="form-group row">
              <label  class="control-label col-sm-2">Amount <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <input type="text" required="" name="amount" placeholder="amount" value="<?php echo $amount ?>" class="form-control" >
               </div>
            </div> 

             <div class="form-group row">
              <label  class="control-label col-sm-2">Receipt No<i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <input type="receipt_no" name="receipt_no" placeholder="Receipt No" value="<?php echo $receipt_no ?>" class="form-control" > 
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
            <?php    }
           
        }elseif ($_GET['do'] == 'delete') {
            if($_SESSION['Role'] != "Admin"){
              header('Location:login.php');
         }
               $id = $_GET['id'];
              $stmt = $con ->prepare(" DELETE FROM advancepayments WHERE id=? ");
              $stmt ->execute(array($id));

              header('Location: AdvancePaymentList.php?do=" " ');


        } 



