  <?php 
            session_start();
 
     ?>
     

      
 <?php 
     //patient admission list 

 $do = isset($_GET['do']) ? $_GET['do'] : 'manage' ;
    include 'contact.php' ;
    if($do != 'Edit' and $do !='delete'){
       global $i;
       $i = 1 ;

   
        $sql = $con->prepare("SELECT * FROM patientadmission ");
        $sql->execute();
  
                          ?>
          
               
           
            <!--  table area -->
            <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     
                   <?php include 'files.php' ; ?>
                    <?php include 'sidebar/sidebar.php' ;?>

            </div>

            <div id="main">
              <?php include 'navbar/navbar.php' ; ?>
            <div class="col-sm-12">
                <div  class="panel panel-default thumbnail">
         
                    <div class="panel-heading no-print">
                        <div class="btn-group" style="position: relative;"> 
                            <a class="btn btn-success btn-lg" href="addPatientAdmission.php"> <i class="fa fa-plus"></i>  Add Patient Admission </a>  
                           
                        </div>
                    </div> 

            <div class="panel-body">
                <div  class="table-responsive ">
                       <table class="datatable table table-striped table-bordered"  cellspacing="0" width="100%">
                         <h1 class="btn btn-success btn-block btn-lg" >Patient Admission List </h1>
                        <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Patient Name</th>
                                    <th>Admission Date</th>
                                    <th>Discharge Date</th>
                                    <th>Doctor Name</th>
                                    <th>Package Name</th> 
                                    <th>Insurance Name</th> 
                                    <th>Policy No.</th> 
                                    <th>Agent Name</th>
                                    <th>Guardian Name</th>  
                                    <th>Guardian Relation</th>
                                    <th>Guardian Contact</th>
                                    <th>Guardian Address</th>
                                     <th>Action</th>
                                </tr>
                            </thead>
         
           <?php  


        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        ?>
         <tbody>
      <tr>
         <td> <?php echo $i; $i++ ;?>
         <td><?php echo $row['patient_name'];?></td>
         <td><?php echo $row['Admission_Date'];?></td> 
         <td><?php echo $row['Discharge_Date'];?></td> 
         <td><?php echo $row['doctor'];?></td>
         <td><?php echo $row['Package_Name'];?></td>
         <td><?php echo $row['insurance'];?></td>
         <td><?php echo $row['policy_no'];?></td>
         <td><?php echo $row['agent_name'];?></td>
         <td><?php echo $row['Guardian_Name'];?></td>
         <td><?php echo $row['Guardian_Relation'];?></td>
         <td><?php echo $row['Guardian_Contact'];?></td>
         <td><?php echo $row['Guardian_Address'];?></td>
         <td><a class="btn btn-primary" href="PatientAdmissionList.php?do=Edit&id=<?php echo $row['id'] ?>"> Edit</a>
              <a class="btn btn-danger" href="PatientAdmissionList.php?do=delete&id=<?php echo $row['id'] ?>"> delete</a></td>
     </tr>
          <?php } ?></tbody>
      </table>
       </div>
        </div>
    </div> 
    </div> 
  </div>
     <?php }else if($do == 'Edit'){
          
           if($_SESSION['Role'] != "Admin" AND $_SESSION['Role'] != "Accountant"){
              header('Location:login.php');
         }


          $id = $_GET['id'];
           $sql = $con->prepare("SELECT * FROM patientadmission Where id = ? ");
           $sql->execute(array($id));
           $row = $sql ->fetch();
           $count =$sql ->rowCount();

              $patient_name = $row['patient_name'];
              $doctor = $row['doctor'];
              $Admission_Date = $row['Admission_Date'];
              $Discharge_Date = $row['Discharge_Date'];
              $Package_Name = $row['Package_Name'];
              $insurance = $row['insurance'];
              $policy_no = $row['policy_no'];
              $agent_name = $row['agent_name'];
              $Guardian_Name = $row['Guardian_Name'];
              $Guardian_Relation = $row['Guardian_Relation'];
              $Guardian_Contact = $row['Guardian_Contact'];
              $Guardian_Address = $row['Guardian_Address'];


              if($count > 0)
           { ?> 


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
                        <div class="btn-group"> 
                            <a class="btn btn-primary btn-lg " href="PatientAdmissionList.php"> <i class="fa fa-list"></i>  Patient Admission List </a>  
                        </div>
                    </div> 
            <div class="panel-body panel-form">
                        <div class="row">
                            <div class="col-md-10 col-sm-12">



            <form action="addPatientAdmission.php?do=Edit&id=<?php echo $row['id'] ?>" method="POST" class="form-horizontal" >
                    
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
                        echo "<option <?php if($patient_name == $value ) { selected = 'selected'}; ?> " .$value . "</option>";
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
                        echo "<option <?php if($doctor == $value ) { selected = 'selected'}; ?> " .$value . "</option>";
                       }
                         ?> 
                    </select>
                  </div>
            </div>

            <div class="form-group row">
               <label class="control-label col-sm-2">Admission Date <i class="text-danger">*</i></label>
                 <div class="col-xs-10">

                    <input type="date" name="Admission_Date" class="datepicker form-control" > 

                </div>
            </div>

             <div class="form-group row">
               <label class="control-label col-sm-2">Discharge Date <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <input type="date" name="Discharge_Date" class="datepicker form-control" > 

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
                        echo "<option <?php if($Package_Name == $value ) { selected = 'selected'}; ?>  " .$value . "</option>";
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
                        echo "<option  <?php if($insurance == $value ) { selected = 'selected'}; ?>  " .$value . "</option>";
                       }
                         ?> 
                    </select>  
                  </div>
            </div>

             <div class="form-group row">
               <label class="control-label col-sm-2">Policy No. <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <input type="text" name="policy_no" placeholder="policy NO" value="<?php echo $policy_no ?>" class="form-control">  
                 </div>
            </div>

            <div class="form-group row">
               <label class="control-label col-sm-2">Agent Name <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <input type="text" name="agent_name" placeholder="Agent Name" value="<?php echo $agent_name ?>" class="form-control" >
                 </div>
            </div>
     
            <div class="form-group row">
               <label class="control-label col-sm-2">Guardian Name <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                   <input type="text" name="Guardian_Name" placeholder="Guardian Name" value="<?php echo $Guardian_Name ?>" class="form-control" >   
               </div>
            </div>

             <div class="form-group row">
               <label class="control-label col-sm-2">Guardian Relation <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <input type="text" name="Guardian_Relation" placeholder="Guardian Relation" value="<?php echo $Guardian_Relation ?>" class="form-control" > 
              </div>
            </div>


              <div class="form-group row">
               <label class="control-label col-sm-2">Guardian Contact <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <input type="text" name="Guardian_Contact" placeholder="Guardian Contact" value="<?php echo $Guardian_Contact ?>" class="form-control" >    
                 </div>
            </div>


             <div class="form-group row">
               <label class="control-label col-sm-2">Guardian Address <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <input type="text" name="Guardian_Address" placeholder="Guardian Address" value="<?php echo $Guardian_Address ?>" class="form-control"> 
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
                                  $stmt = $con ->prepare(" DELETE FROM patientadmission WHERE id=? ");
                                  $stmt ->execute(array($id));

                                  header('Location: PatientAdmissionList.php?do=" " ');


                            } 