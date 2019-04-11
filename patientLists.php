       <?php 
            session_start();

     ?>
     
    <!-- sidebar area -->
   
    

    <!-- end sidebar area --> 
     
    
    
   <?php      $do = isset($_GET['do']) ? $_GET['do'] : 'manage' ;
         include 'contact.php' ;
       global $i;
       $i = 1 ;
      
      
        if($do != 'Edit' and $do !='delete'){
         
        $sql = $con->prepare("SELECT * FROM patients ");
        $sql->execute();
 ?>

    <!--  table area -->
    <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
             
           <?php include_once 'files.php' ;?>
            <?php include_once 'sidebar/sidebar.php'; ?>


    </div>
        <div id="main">
      <?php include_once 'navbar/navbar.php'; ?>
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group" style="position: relative;"> 
                    <a class="btn btn-success btn-lg " href="addpatient.php"> <i class="fa fa-plus"></i>  Add Patient </a>  
                   
                </div>
            </div> 

    <div class="panel-body">
        <div  class="table-responsive ">
               <table class="datatable table table-striped table-bordered"  cellspacing="0" width="100%">
                 <h1 class="btn btn-success btn-block " >patient list </h1>
                <thead>
                        <tr>
                            <th>NO</th>
                            <th>Picture</th>
                            <th>Full Name</th>
                            <th>User Name</th>
                            <th>Email Address</th> 
                            <th>Mobile No</th> 
                            <th>Sex</th> 
                            <th>Address</th>
                            <th>Blood Group</th>  
                             <th>Action</th>
                        </tr>
                    </thead>
  <?php      while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        ?>
         <tr>
             <td> <?php echo $i; $i++ ;?>
              <td> <img  height="40px"src="images/logo2.PNG"></td>
             <td><?php echo $row['fullname'];?></td> 
             <td><?php echo $row['username'];?></td> 
             <td><?php echo $row['email'];?></td>
             <td><?php echo $row['mobile'];?></td>
             <td><?php echo $row['sex'];?></td>
             <td><?php echo $row['address'];?></td>
             <td><?php echo $row['bloodgroup'];?></td> 
             <td><a class="btn btn-primary "  href="patientLists.php?do=Edit&id=<?php echo $row['userID'] ?>"> edit</a> 
             <a class="btn btn-danger" href="patientLists.php?do=delete&id=<?php echo $row['userID'] ?>"> delete</a>
             <a class="btn btn-info"   href="profile.php?id=<?php echo $row['userID'] ?>&user=patient"> show</a> </td> 
        </tr>
    <?php } ?></tbody>
      </table>
       </div>
        </div>
    </div> 
    </div> 
  </div>

        <?php  }elseif($_GET['do'] == 'Edit'){
           if($_SESSION['Role'] != "Admin" AND $_SESSION['Role'] != "Doctor" AND $_SESSION['Role'] != "Receptionist" AND $_SESSION['Role'] != "Representative"){
              header('Location:login.php');
         }
            $id = $_GET['id']; 
            $sql = $con->prepare("SELECT * FROM patients Where userID = ? ");
            $sql->execute(array($id));
            $row = $sql ->fetch();
            $count =$sql ->rowCount();
            $fullname = $row['fullname'];
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['password'];
            $phone = $row['phone'];
            $mobile =$row['mobile'];
            $blood_group = $row['bloodgroup'];
            $sex = $row['sex'];
            $Date= $row['birth'];
            $picture = $row['picture'];
            $address =$row['address'];

              if($count > 0)
           { ?>
            <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
             
           <?php include_once 'files.php'; ?>
            <?php include_once 'sidebar/sidebar.php' ;?>


    </div>
             <div id="main">
      <?php include 'navbar/navbar.php'; ?>
        <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
  
           <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary btn-lg " href="patientLists.php"> <i class="fa fa-list"></i> Patient List </a>  
                </div>
            </div> 
    <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-10 col-sm-12">
            <form action="addpatient.php?do=Edit&id=<?php echo $row['userID'] ?>" method="POST" class="form-horizontal">
            <div class="form-group row">
              <label  class="control-label col-sm-2">Full Name <i class="text-danger">*</i></label>
                 <div class="col-sm-10">
                    <input type="text" name="fullname" placeholder="fullname" class="form-control"  value="<?php echo $fullname ?> "> <br>
              </div>
           </div> 

           <div class="form-group row">
              <label  class="control-label col-sm-2">User Name <i class="text-danger">*</i></label>
                 <div class="col-sm-10">      
            <input type="lastname" name="username" placeholder="username" value="<?php echo $username ?> " class="form-control"> 
                </div>
           </div> 

           <div class="form-group row">
              <label  class="control-label col-sm-2">Email <i class="text-danger">*</i></label>
                 <div class="col-sm-10">  
                     <input type="email" name="email" placeholder="email" value="<?php echo $email ?> " class="form-control"> 
                </div>
           </div> 

           <div class="form-group row">
              <label  class="control-label col-sm-2">password <i class="text-danger">*</i></label>
                 <div class="col-sm-10">  
          <input type="password" name="password" placeholder="password" value="<?php echo $password ?> " class="form-control"> 
                  </div>
           </div> 

          <div class="form-group row">
              <label  class="control-label col-sm-2">phone NO <i class="text-danger">*</i></label>
                 <div class="col-sm-10">  
          <input type="phone" name="phone" placeholder="phone NO" value="<?php echo $phone ?> " class="form-control">       </div>
           </div> 
       
           <div class="form-group row">
              <label  class="control-label col-sm-2">phone NO <i class="text-danger">*</i></label>
                 <div class="col-sm-10">  
             <input type="phone" name="mobile" placeholder="mobile NO" value="<?php echo $mobile ?> " class="form-control" >
               </div>
           </div> 
          
         <div class="form-group row">
               <label class="control-label col-sm-2">Blood Group <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
          <select name="blood_group" value="<?php echo $blood_group ?> " class="form-control">
                <option>Select Option </option>
                <option <?php if($blood_group == "A+"){ echo ' selected="selected"'; } ?>  >A+</option>
                <option <?php if($blood_group == "A-"){ echo ' selected="selected"'; } ?> >A-</option>
                <option <?php if($blood_group == "B+"){ echo ' selected="selected"'; } ?> >B+</option>
                <option <?php if($blood_group == "B-"){ echo ' selected="selected"'; } ?> >B-</option>
                <option <?php if($blood_group == "O+"){ echo ' selected="selected"'; } ?> >O+</option>
                <option <?php if($blood_group == "O-"){ echo ' selected="selected"'; } ?> >O-</option>
                <option <?php if($blood_group == "AB+"){ echo ' selected="selected"'; } ?> >AB+</option>
                <option <?php if($blood_group == "AB-"){ echo ' selected="selected"'; } ?> >AB-</option>
                </select> 
              </div>
           </div>


          <div class="form-group row">
               <label class="control-label col-sm-2">Sex<i class="text-danger">*</i></label>
               <div class="col-xs-10">
                 <input type="Radio" name="sex" value="male" <?php if($sex == "male"){ echo ' checked="checked"'; } ?>  >  male
                  <input type="Radio" name="sex" value="female" <?php if($sex == "female"){ echo ' checked="checked"'; } ?> >female
                  </div>
           </div> 

        <div class="form-group row">
               <label class="control-label col-sm-2">Date of Birth <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                   <input type="date" name="date_of_birth" class="datepicker form-control" >                  
               </div>
           </div> 

             <div class="form-group row">
               <label class="control-label col-sm-2">picture <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                   <input type="file" name="picture" value="<?php echo $picture ?> " > 
              </div>
           </div> 
            
            <div class="form-group row">
               <label class="control-label col-sm-2">Address<i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                 <textarea name="address" placeholder="Address" maxlength="140" rows="7" class="tinymce form-control" ><?php echo $address ?> </textarea>
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
      } 

     elseif ($_GET['do'] == 'delete') {
             if($_SESSION['Role'] != "Admin" AND $_SESSION['Role'] != "Doctor" AND $_SESSION['Role'] != "Receptionist" AND $_SESSION['Role'] != "Representative"){
              header('Location:login.php');
              exit();
         }
               $id = $_GET['id'];
              $stmt = $con ->prepare(" DELETE FROM patients WHERE userID=? ");
              $stmt ->execute(array($id));

              header('Location: patientLists.php?do=" "');


        } 
     
