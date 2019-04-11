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
      

        $sql = $con->prepare("SELECT * FROM schdule ");
        $sql->execute(); ?>


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
                    <a class="btn btn-success btn-lg" href="addSchedule.php"> <i class="fa fa-plus"></i>  Add Schedule </a>  
                   
                </div>
            </div> 

    <div class="panel-body">
        <div  class="table-responsive ">
               <table class="datatable table table-striped table-bordered"  cellspacing="0" width="100%">
                 <h1 class="btn btn-success btn-block btn-lg" >Schedule List </h1>
                <thead>
                        <tr>
                            <th>NO</th>
                            <th>Doctor Name</th>
                            <th>Day</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Per Patient Time</th> 
                            <th>Serial Visibilty</th> 
                             <th>Action</th>
                        </tr>
                    </thead>
 
   <?php      

        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        ?>
         <tr>
         <td> <?php echo $i; $i++ ;?>
         <td><?php echo $row['doctorname'];?></td>
         <td><?php echo $row['avaiable_day'];?></td> 
         <td><?php echo $row['starttime'];?></td> 
         <td><?php echo $row['endtime'];?></td>
         <td><?php echo $row['patienttime'];?></td>
         <td><?php echo $row['serial_visibilty'];?></td>
         <td><a  class="btn btn-primary"  href="ScheduleList.php?do=Edit&id=<?php echo $row['id'] ?>"> edit</a>
             <a  class="btn btn-danger" href="ScheduleList.php?do=delete&id=<?php echo $row['id'] ?>"> delete</a></td>
         </tr>
          <?php } ?></tbody>
      </table>
       </div>
        </div>
    </div> 
    </div> 
  </div>
     <?php  }else if($do == 'Edit'){

  if($_SESSION['Role'] != "Admin"){
              header('Location:login.php');
         }


      if($_SESSION['Role'] != "Admin"){
              header('Location:login.php');
         }
          $id = $_GET['id'];
           $sql = $con->prepare("SELECT * FROM schdule Where id = ? ");
           $sql->execute(array($id));
           $row = $sql ->fetch();
           $count =$sql ->rowCount();

           $doctorname = $row['doctorname'];
           $dayname = $row['avaiable_day'];
           $starttime = $row['starttime'];
           $endtime = $row['endtime'];
           $Serial_Visibility =$row['serial_visibilty'];
           $patient_time = $row['patienttime'];

            if($count > 0)
           { ?> 

<div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
             
           <?php include 'files.php' ; ?>
            <?php include 'sidebar/sidebar.php' ; ?>

    </div>
   <div id="main">
      <?php include 'navbar/navbar.php' ;?>
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

      <form action="addSchedule.php?do=Edit&id=<?php echo $row['id'] ?>" method="POST"  class="form-horizontal" >
   
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
             <option <?php if($dayname == "Sunday"){ echo ' selected="selected"'; } ?> value="Sunday">Sunday</option>
             <option  <?php if($dayname == "Monday"){ echo ' selected="selected"'; } ?> value="Monday">Monday</option>
             <option  <?php if($dayname == "Tuesday"){ echo ' selected="selected"'; } ?> value="Tuesday">Tuesday</option>
             <option  <?php if($dayname == "Wednesday"){ echo ' selected="selected"'; } ?> value="Wednesday">Wednesday</option>
             <option  <?php if($dayname == "Thursday"){ echo ' selected="selected"'; } ?> value="Thursday">Thursday</option>
             <option  <?php if($dayname == "Friday"){ echo ' selected="selected"'; } ?> value="Friday">Friday</option>
             <option  <?php if($dayname == "Saturday"){ echo ' selected="selected"'; } ?> value="Saturday">Saturday</option>
            
             </select>
                       </div>
             </div>

             <div class="form-group row">
               <label class="control-label col-sm-2">Available Time <i class="text-danger">*</i></label>
                 <div class="col-xs-5">
                      <input type="time" name="starttime" value="<?php echo $starttime ?>" class="form-control" >
                </div>
                <div class="col-xs-5">
                     <input type="time" name="endtime" value="<?php echo $endtime ?>"  class="form-control"  >
                </div>
             </div>

           <div class="form-group row">
                  <label class="control-label col-sm-2">Per Patient Time <i class="text-danger">*</i></label>
                     <div class="col-xs-10">
                        <input type="time" name="patinet_time" value="<?php echo $patient_time ?>" class="form-control"  >
                   </div>
           </div>

       <div class="form-group row">
                       <label class="control-label col-sm-2"> Available Days <i class="text-danger">*</i></label>
                         <div class="col-xs-10">
               <select name="Serial_Visibility" class="form-control" >
                    <option value="">Select Option</option>
                    <option <?php if($Serial_Visibility == "Sequential"){ echo ' selected="selected"'; } ?>  >Sequential</option>
                    <option <?php if($Serial_Visibility == "Timestamp"){ echo ' selected="selected"'; } ?>  >Timestamp</option>
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
     <?php    }
           
        }elseif ($_GET['do'] == 'delete') {

             if($_SESSION['Role'] != "Admin"){
                                header('Location:login.php');
                                exit();
                               }

               $id = $_GET['id'];
              $stmt = $con ->prepare(" DELETE FROM Schdule WHERE id=? ");
              $stmt ->execute(array($id));

              header('Location: ScheduleList.php?do=" " ');


        } 

