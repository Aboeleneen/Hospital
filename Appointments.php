  <?php 
            session_start();

     ?>
     
    <!-- sidebar area -->
   
  

    <!-- end sidebar area -->
      
 <?php 
    $do = isset($_GET['do']) ? $_GET['do'] : 'manage' ;
    include 'contact.php' ;
    if($do != 'Edit' and $do !='delete'){

    
     global $i;
       $i = 1 ;
     
        $sql = $con->prepare("SELECT * FROM appointments ");
        $sql->execute(); ?>

                 <!--  table area -->
                  <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
             
           <?php include 'files.php'; ?>
            <?php include 'sidebar/sidebar.php' ; ?>

    </div>
                  <div id="main">
                    <?php include 'navbar/navbar.php' ; ?>
                  <div class="col-sm-12">
                      <div  class="panel panel-default thumbnail">
               
                          <div class="panel-heading no-print">
                              <div class="btn-group" style="position: relative;"> 
                                  <a class="btn btn-success btn-lg" href="addAppointment.php"> <i class="fa fa-plus"></i>  Add Appointments </a>  
                                 
                              </div>
                          </div> 

                  <div class="panel-body">
                      <div  class="table-responsive ">
                             <table class="datatable table table-striped table-bordered"  cellspacing="0" width="100%">
                               <h1 class="btn btn-success btn-block btn-lg" >Appointments list </h1>
                              <thead>
                                      <tr>
                                          <th>NO</th>
                                          <th>Patient Name</th>
                                          <th>Department</th>
                                          <th>Doctor Name</th>
                                          <th>Appointment</th>
                                          <th>Problem</th> 
                                           <th>Action</th>
                                      </tr>
                                  </thead>
               
                 <?php      



        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        ?>
         <tr>
         <td> <?php echo $i; $i++ ;?>
          <td><?php echo $row['patient'];?></td>
         <td><?php echo $row['department'];?></td> 
         <td><?php echo $row['doctor'];?></td> 
         <td><?php echo $row['appointment'];?></td>
           <td><?php echo $row['problem'];?></td> 
           <td><a class="btn btn-primary"  href="Appointments.php?do=Edit&id=<?php   echo $row['id'] ?>"> edit</a>
             <a class="btn btn-danger" href="Appointments.php?do=delete&id=<?php echo $row['id'] ?>"> delete</a></td> 
        </tr>
        
                  <?php } ?></tbody>
                </table>
                 </div>
                  </div>
              </div> 
              </div> 
            </div>
     <?php  }else if($do == 'Edit'){
         if($_SESSION['Role'] != "Admin" AND $_SESSION['Role'] != "Doctor" AND $_SESSION['Role'] != "Receptionist" AND $_SESSION['Role'] != "Representative" AND $_SESSION['Role'] != "Patient"){
              header('Location:login.php');
         }
          $id = $_GET['id'];
           $sql = $con->prepare("SELECT * FROM appointments Where id = ? ");
           $sql->execute(array($id));
           $row = $sql ->fetch();
           $count =$sql ->rowCount();

           $patient_name = $row['patient'];
           $department =$row['department'];
           $doctor_name = $row['doctor'];
           $appointment = $row['appointment'];
           $problem = $row['problem'];
           
           if($count>0)
            {?>
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
                <div class="btn-group"> 
                    <a class="btn btn-primary btn-lg " href="Appointments.php"> <i class="fa fa-list"></i> Appointments list </a>  
                </div>
            </div> 
    <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-10 col-sm-12">

         <form action="addAppointment.php?do=Edit&id=<?php echo $row['id'] ?>" method="POST" class="form-horizontal" >
           

           <div class="form-group row" >
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


     <div class="form-group row" >
               <label class="control-label col-sm-2">Department <i class="text-danger">*</i></label>
                 <div class="col-xs-10">

            <select name="department" class="form-control">
                <option value="" selected="selected">Select Department</option>
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
                       <option value="" selected="selected">Select Doctor</option>
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

            <input type="Datetime-local" class="form-control" name="appointment" placeholder="appointment" value="<?php echo $appointment ?>">
             </div>
      </div>

      <div class="form-group row" >
            <label class="control-label col-sm-2">Problem <i class="text-danger">*</i></label>
                 <div class="col-xs-10">

                  <textarea name="problem" class="tinymce form-control" placeholder="Problem">
                      <?php echo $problem ?>
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

  <?php    }
           
      }elseif ($_GET['do'] == 'delete') {
            if($_SESSION['Role'] != "Admin" AND $_SESSION['Role'] != "Doctor" AND $_SESSION['Role'] != "Receptionist" AND $_SESSION['Role'] != "Representative" AND $_SESSION['Role'] != "Patient"){
              header('Location:login.php');
              exit();
         }
               $id = $_GET['id'];
              $stmt = $con ->prepare(" DELETE FROM appointments WHERE id=? ");
              $stmt ->execute(array($id));

              header('Location: appointments.php?do=" " ');


        } 

