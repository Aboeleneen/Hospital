     <?php 
            session_start();

     ?>
     
    <!-- sidebar area -->
   
    <!-- end sidebar area -->
      
 <?php 



 //Limit Approval List 
  
  $do = isset($_GET['do']) ? $_GET['do'] : 'manage' ;
    include 'contact.php' ;
    if($do != 'Edit' and $do !='delete'){


   global $i;

    $i = 1 ;

    include 'contact.php';

    $sql = $con->prepare("SELECT * FROM limitapproval ");
        $sql->execute();
          ?>
  
            <!--  table area -->
           
    <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
             
           <?php include 'files.php' ; ?>
            <?php include 'sidebar/sidebar.php' ; ?>

    </div>

            <div id="main">
              <?php include 'navbar/navbar.php' ; ?>
            <div class="col-sm-12">
                <div  class="panel panel-default thumbnail">
         
                    <div class="panel-heading no-print">
                        <div class="btn-group" style="position: relative;"> 
                            <a class="btn btn-success btn-lg" href="addLimitApproval.php"> <i class="fa fa-plus"></i>  Add Limit Approval </a>  
                           
                        </div>
                    </div> 

            <div class="panel-body">
                <div  class="table-responsive ">
                       <table class="datatable table table-striped table-bordered"  cellspacing="0" width="100%">
                         <h1 class="btn btn-success btn-block btn-lg" >Limit Approval List </h1>
                        <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Patient Name</th>
                                    <th>Consultant Name</th>
                                    <th>Policy Name</th>
                                    <th>Policy No.</th>
                                    <th>Policy Holder Name</th> 
                                    <th>Insurance Name</th> 
                                    <th>Total</th> 
                                     <th>Action</th>
                                </tr>
                            </thead>
         
           <?php 
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        ?>
         <tr>
         <td> <?php echo $i; $i++ ;?>
          <td><?php echo $row['patient_name'];?></td>
         <td><?php echo $row['consultant'];?></td> 
         <td><?php echo $row['policy_name'];?></td> 
         <td><?php echo $row['policy_no'];?></td>
           <td><?php echo $row['policy_holder_name'];?></td>
             <td><?php echo $row['insurance'];?></td>
             <td><?php echo $row['total'];?></td>
              <td><a  class="btn btn-primary" href="LimitApprovalList.php?do=Edit&id=<?php echo $row['id'] ?>"> edit</a> 
               <a  class="btn btn-danger" href="LimitApprovalList.php?do=delete&id=<?php echo $row['id'] ?>"> delete</a></td> 
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
              exit();
         }


          $id = $_GET['id'];
           $sql = $con->prepare("SELECT * FROM limitapproval Where id = ? ");
           $sql->execute(array($id));
           $row = $sql ->fetch();
           $count =$sql ->rowCount();

           $patient_name = $row['patient_name'];
            $Room =$row['Room'];
            $disease = $row['disease'];
            $disease_details = $row['disease_details'];
            $consultant = $row['consultant'];
            $policy_name = $row['policy_name'];
            $policy_no = $row['policy_no'];
            $policy_holder_name = $row['policy_holder_name'];
            $insurance = $row['insurance'];
            $disease_name = $row['disease_name'];
            $disease_charge = $row['disease_charge'];
            $total = $row['total'];

            if($count > 0)
           { ?> 
            
    <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
             
           <?php include 'files.php' ;?>
            <?php include 'sidebar/sidebar.php'; ?>

    </div>


                  <div id="main">
            <?php include 'navbar/navbar.php' ;?>
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
              <form action="addLimitApproval.php?do=Edit&id=<?php echo $row['id'] ?>" method="POST" class="form-horizontal" >


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
                  <input type="text" name="room" placeholder="Room No" value="<?php echo $Room ?>" class="form-control" > 
               </div>
            </div>

            <div class="form-group row">
               <label class="control-label col-sm-2">Disease Details <i class="text-danger">*</i></label>
                 <div class="col-xs-5">
                  <input type="text" name="disease" placeholder="disease" value="<?php echo $disease ?>"  class="form-control" > 
                 </div>
                   <div class="col-xs-5">
                  <textarea name="disease_details" placeholder="Disease details" class="tinymce form-control" > <?php echo $disease_details ?> </textarea> 
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
                  <input type="text" name="policy_name" placeholder="policy Name" value="<?php echo $policy_name ?>" class="form-control" > 
                   </div>
               </div>

               <div class="form-group row">
               <label class="control-label col-sm-2">policy No<i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                  <input type="text" name="policy_no" placeholder="policy No" value="<?php echo $policy_no ?>"  class="form-control"  > 
                 </div>
               </div>

                <div class="form-group row">
               <label class="control-label col-sm-2">policy holder Name<i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                  <input type="text" name="policy_holder_name" placeholder="policy holder Name" value="<?php echo $policy_holder_name ?>" class="form-control" > 
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
                        echo "<option <?php if($insurance == $value) { selected = 'selected'}?> >" .$value . "</option>";
                       }
                         ?>
                  </select> 
                   </div>
               </div>


                <div class="form-group row">
               <label class="control-label col-sm-2">Approval Charge Break up<i class="text-danger">*</i></label>
                 <div class="col-xs-5">
                  <input type="text" name="disease_name" placeholder="disease name" value="<?php echo $disease_name ?>" class="form-control" > 
                  </div>
                  <div class="col-xs-5">
                  <input type="text" name="disease_charge" placeholder="disease charge" value="<?php echo $disease_charge ?>" class="form-control" > 
                 </div>
               </div>

               <div class="form-group row">
               <label class="control-label col-sm-2">Total<i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                       <input type="text" name="total" placeholder="total"  value="<?php echo $total ?>" class="form-control" > 

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
                       if($_SESSION['Role'] != "Admin" AND $_SESSION['Role'] != "Accountant"){
              header('Location:login.php');
              exit();
         }
                           $id = $_GET['id'];
                          $stmt = $con ->prepare(" DELETE FROM limitapproval WHERE id=? ");
                          $stmt ->execute(array($id));

                          header('Location: LimitApprovalList.php?do=" " ');


                    } 

