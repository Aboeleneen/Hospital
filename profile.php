<?php

 session_start();
?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
       <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
             
           <?php include 'files.php' ; ?>
            <?php include 'sidebar/sidebar.php' ; ?>
            <?php include 'contact.php' ; ?>

      </div>

       <div id="main">
       	 <?php include 'navbar/navbar.php'; ?>
       	<div class="col-sm-12" id="PrintMe">

        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">

            	<!-- Button Group -->
                <div class="btn-group"> 

                	<!-- doctor profile -->
                   <?php 
                	if($_GET['user'] == 'doctor'){ ?>
                    <a class="btn btn-success" href="adddoctor.php"> <i class="fa fa-plus"></i>  Add Doctor </a>  
                    <a class="btn btn-primary" href="doctors.php"> <i class="fa fa-list"></i>  Doctor List </a> 
                   
                    <?php } ?>


                    <!-- doctor profile -->



                	<!-- patient profile -->
                   <?php 
                	if($_GET['user'] == 'patient'){ ?>
                    <a class="btn btn-success" href="addpatient.php"> <i class="fa fa-plus"></i>  Add Patient </a>  
                    <a class="btn btn-primary" href="patientlists.php"> <i class="fa fa-list"></i>  Patient List </a> 
                   
                    <?php } ?>


                    <!-- patient profile -->


                    	<!-- Employee profile -->
                   <?php 
                	if($_GET['user'] == 'Employee'){ ?>
                    <a class="btn btn-success btn-lg " href="addEmployee.php"> <i class="fa fa-plus"></i>  Add Employee </a>
                      <a class="btn btn-primary btn-lg " href="AccountantList.php"> <i class="fa fa-list"></i>  Accountant List </a> <a class="btn btn-primary btn-lg " href="LaboratoristList.php"> <i class="fa fa-list"></i>  Laboratorist List </a>
                    <a class="btn btn-primary btn-lg " href="NurseList.php"> <i class="fa fa-list"></i>  Nurse List </a>
                   <a class="btn btn-primary btn-lg " href="PharmacistList.php"> <i class="fa fa-list"></i>  Pharmacist List </a>
                    <a class="btn btn-primary btn-lg " href="ReceptionistList.php"> <i class="fa fa-list"></i>  Receptionist List </a>
                    <a class="btn btn-primary btn-lg " href="RepresentativeList.php"> <i class="fa fa-list"></i>  Representative List </a>
                    <a class="btn btn-primary btn-lg " href="CaseManagerList.php"> <i class="fa fa-list"></i>  Case Manager List </a>  

                    <?php } ?>


                    <!-- Employee profile -->



                </div>
               <!-- Button Group -->

            </div> 

     
        <div class="panel-body">
                <div class="row">



                	<!-- HEADER OF PROFILE -->

                    <div class="col-sm-12" align="center">  

                    	<!-- doctor profile -->
                    	<?php if($_GET['user'] == 'doctor')
                          echo   "<h1>Doctor Information</h1>" ; ?>
                         <!-- doctor profile -->

                           
                         <!-- patient profile -->
                    	<?php if($_GET['user'] == 'patient')
                          echo   "<h1>Patient Information</h1>" ; ?>
                         <!-- patient profile -->

                          <!-- Employee profile -->
                    	<?php if($_GET['user'] == 'Employee')
                          echo   "<h1>Employee Information</h1>" ; ?>
                         <!-- Employee profile -->
                     


                    <br>
                    </div>


                    <!-- HEADER OF PROFILE -->

                    <div class="col-md-3 col-lg-4 " align="center"> 
                        <img alt="Picture" src="images/logo.PNG" class="img-thumbnail img-responsive">
                      


                      <!-- INFORMATION OF PROFILE -->

                      <!-- doctor profile -->
                        <?php
                        if($_GET['user'] == 'doctor'){
                        $stmt = $con  ->prepare("SELECT concat('DR.',fullname ) FROM doctors WHERE doctorID = ? LIMIT 1");
                      $stmt ->execute(array($_GET['id']));

                      $array = $stmt->fetchAll(PDO::FETCH_COLUMN);

                     foreach ($array as $value) {
                         echo "<h3>".$value . "</h3>" ;
                      }

                       $sql = $con->prepare("SELECT * FROM doctors WHERE doctorID = ? LIMIT 1 ");
                           $sql->execute(array($_GET['id']));
                           $row = $sql->fetch(PDO::FETCH_ASSOC);
                       ?> 
                    </div>


                  

                    <div class="col-md-7 col-lg-7 "> 
                        <dl class="dl-horizontal">
                        	<dt>username:</dt><dd><?php echo $row['username'];?></dd>
                            <dt>Email Address:</dt><dd><?php echo $row['email'];?></dd>
                            <dt>Designation:</dt><dd><?php echo $row['designation'];?></dd>
                            <dt>Department:</dt><dd><?php echo $row['department'];?></dd>
                            <dt>Address:</dt><dd><?php echo $row['address'];?> </dd>
                            <dt>Phone No:</dt><dd><?php echo $row['phone'];?></dd>
                            <dt>Mobile No:</dt><dd><?php echo $row['mobile'];?></dd>
                            <dt>Short Biography:</dt><dd><p><?php echo $row['biography'];?></p></dd>
                            <dt>Specialist:</dt><dd><?php echo $row['department'];?></dd>
                            <dt>Date of Birth:</dt><dd><?php echo $row['date_of_birth'];?></dd>
                            <dt>Sex:</dt><dd><?php echo $row['sex'];?></dd>
                            <dt>blood group:</dt><dd><?php echo $row['blood_group'];?></dd>
                        </dl> 
                    </div>  <?php } ?>

                    <!-- END of doctor profile -->


                     <!-- patient profile -->
                        <?php
                        if($_GET['user'] == 'patient'){
                        $stmt = $con  ->prepare("SELECT fullname FROM patients WHERE userID = ? ");
                        $stmt ->execute(array($_GET['id']));

                      $array = $stmt->fetchAll(PDO::FETCH_COLUMN);

                     foreach ($array as $value) {
                         echo "<h3>".$value . "</h3>" ;
                      }

                       $sql = $con->prepare("SELECT * FROM patients WHERE userID = ? LIMIT 1 ");
                           $sql->execute(array($_GET['id']));
                           $row = $sql->fetch(PDO::FETCH_ASSOC);
                       ?>
                    </div>


                  

                    <div class="col-md-7 col-lg-7 "> 
                        <dl class="dl-horizontal">
                        	<dt>username :</dt><dd><?php echo $row['username'];?></dd> <br>
                            <dt>Email Address :</dt><dd><?php echo $row['email'];?></dd> <br>
                            <dt>Address :</dt><dd><?php echo $row['address'];?> </dd> <br>
                            <dt>Phone No : </dt><dd><?php echo $row['phone'];?></dd> <br>
                            <dt>Mobile No :</dt><dd><?php echo $row['mobile'];?></dd> <br>
                            <dt>Date of Birth :</dt><dd><?php echo $row['birth'];?></dd> <br>
                            <dt>Sex :</dt><dd><?php echo $row['sex'];?></dd> <br>
                            <dt>blood group :</dt><dd><?php echo $row['bloodgroup'];?></dd> <br>
                        </dl> 
                    </div>  <?php } ?>
 
                    <!-- END of patient profile -->




                     <!-- Employee profile -->
                        <?php
                        if($_GET['user'] == 'Employee'){
                        $stmt = $con  ->prepare("SELECT fullname FROM Employees WHERE id = ?");
                        $stmt ->execute(array($_GET['id']));

                      $array = $stmt->fetchAll(PDO::FETCH_COLUMN);

                     foreach ($array as $value) {
                         echo "<h3>".$value . "</h3>" ;
                      }

                       $sql = $con->prepare("SELECT * FROM Employees WHERE id = ?  LIMIT 1 ");
                           $sql->execute(array($_GET['id']));
                           $row = $sql->fetch(PDO::FETCH_ASSOC);
                       ?>
                    </div>


                 

                    <div class="col-md-7 col-lg-7 "> 
                        <dl class="dl-horizontal">

                        	<dt>user type </dt><dd><?php echo $row['Role'];?></dd>  <br>
                        	<dt>username</dt><dd><?php echo $row['username'];?></dd> <br>
                            <dt>Email Address</dt><dd><?php echo $row['email'];?></dd> <br>
                            <dt>Address</dt><dd><?php echo $row['address'];?> </dd> <br>
                            <dt>Mobile No</dt><dd><?php echo $row['mobile'];?></dd> <br>
                            <dt>Sex</dt><dd><?php echo $row['sex'];?></dd> <br>
                           
                        </dl> 
                    </div>  <?php } ?>

                    <!-- END of Employee profile -->

                <!-- user profile -->
                    <?php
                    $id = $_SESSION['id'];
                        if($_GET['user'] == 'User'){
                        $stmt = $con  ->prepare("SELECT fullname FROM users WHERE userID = ?");
                        $stmt ->execute(array($id));

                      $array = $stmt->fetchAll(PDO::FETCH_COLUMN);

                     foreach ($array as $value) {
                         echo "<h3>".$value . "</h3>" ;
                      }

                       $sql = $con->prepare("SELECT * FROM users WHERE userID = ?  LIMIT 1 ");
                           $sql->execute(array($id));
                           $row = $sql->fetch(PDO::FETCH_ASSOC);
                       ?>
                    </div>


                 

                    <div class="col-md-7 col-lg-7 "> 
                        <dl class="dl-horizontal">
                      
                           <dt>user ID: </dt><dd><?php echo $row['userID'];?></dd> <br>
                           <dt>Full name:</dt><dd><?php echo $row['fullname'];?></dd> <br>
                           <dt>User name</dt><dd><?php echo $row['username'];?></dd> <br>
                          <dt>User type : </dt><dd><?php echo $row['Role'];?></dd>  <br>
                          
                            <dt>Email Address  :</dt><dd><?php echo $row['email'];?></dd> <br>
                            <dt>Mobile No :</dt><dd><?php echo $row['telephone'];?></dd> <br>
                            
                           
                        </dl> 
                    </div>  <?php } ?>




                <!-- end of user profile -->
                
                   <!-- INFORMATION OF PROFILE -->

                </div>
            </div> 

            <div class="panel-footer">
                <div class="text-center">
                    <strong>Bouns Team Hospital </strong>
                    <p class="text-center">faculty of engineering </p>
                </div>
            </div>
        </div>
    </div>
 
</div>

  
</body>
</html>


