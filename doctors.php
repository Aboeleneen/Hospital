     <?php 
            session_start();
 
 
     

      
   $do = isset($_GET['do']) ? $_GET['do'] : 'manage' ;
    include 'contact.php' ;
    if($do != 'Edit' and $do !='delete'){
   
   
    global $i;
       $i = 1 ;
    
   $sql = $con->prepare("SELECT * FROM doctors ");
        $sql->execute();
        ?>
  
       
   
    <!--  table area -->
    <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
             
           <?php include 'files.php' ; ?>
            <?php include 'sidebar/sidebar.php' ;?>

    </div>

    <div id="main">
      <?php include 'navbar/navbar.php'; ?>
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group" style="position: relative;"> 
                    <a class="btn btn-success btn-lg" href="adddoctor.php"> <i class="fa fa-plus"></i>  Add Doctor </a>  
                   
                </div>
            </div> 

    <div class="panel-body">
        <div  class="table-responsive ">
               <table class="datatable table table-striped table-bordered"  cellspacing="0" width="100%">
                 <h1 class="btn btn-success btn-block btn-lg" >Doctors List </h1>
                <thead>
                        <tr>
                            <th>NO</th>
                            <th>Picture</th>
                            <th>Full Name</th>
                            <th>User Name</th>
                            <th>Department</th>
                            <th>Email Address</th> 
                            <th>Mobile No</th> 
                            <th>Sex</th> 
                            <th>Address</th>
                            <th>Blood Group</th>  
                             <th>Action</th>
                        </tr> 
                    </thead>
 
   <?php      while($row = $sql->fetch(PDO::FETCH_ASSOC)){ ?>
          <tbody>
             <tr class="odd gradeX" >
             <td> <?php echo $i; $i++ ;?>
              <td> <img  height="40px"src="images/logo2.PNG"></td>
             <td><?php echo $row['fullname'];?></td> 
             <td><?php echo $row['username'];?></td> 
             <td><?php echo $row['department'];?></td>
             <td><?php echo $row['email'];?></td>      
                 <td><?php echo $row['mobile'];?></td>
                 <td><?php echo $row['sex'];?></td>
                 <td><?php echo $row['address'];?></td>
                 <td><?php echo $row['blood_group'];?></td>
                 <td><a class="btn btn-primary" href="doctors.php?do=Edit&id=<?php echo $row['doctorID'] ?>"> edit</a> 
                     <a class="btn btn-danger " <?php if($_SESSION['Role'] != "Admin"){ echo "disabled";}?>   href="doctors.php?do=delete&id=<?php echo $row['doctorID'] ?>"> delete</a>
                      <a class="btn btn-info"   href="profile.php?id=<?php echo $row['doctorID'] ?>&user=doctor"> show</a> </td> 
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
          $id = $_GET['id'];
           $sql = $con->prepare("SELECT * FROM doctors Where doctorID = ? ");
           $sql->execute(array($id));
            $row = $sql ->fetch();
            $count =$sql ->rowCount();
            $fullname = $row['fullname'];
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['password'];
            $phone = $row['phone'];
            $mobile =$row['mobile']; 
            $blood_group = $row['blood_group'];
            $sex = $row['sex'];
            $Date= $row['date_of_birth'];
            $picture = $row['picture'];
            $address =$row['address'];
            $department =$row['department'];
            $designation = $row['designation'];
            $short_biography = $row['biography'];
            $specialist =$row['specialist'];
            $education = $row['education'];
           
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
                    <a class="btn btn-primary btn-lg " href="doctors.php"> <i class="fa fa-list"></i>  Doctor List </a>  
                </div>
            </div> 
    <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-10 col-sm-12">


      <form action="adddoctor.php?do=edit&id=<?php echo $row['doctorID'] ?>" method="POST" class="form-horizontal" >
          

            <div class="form-group row">
              <label  class="control-label col-sm-2">Full Name <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                     <input type="text" name="fullname" placeholder="fullname" class="form-control" value="<?php echo $fullname ?>"> 
                </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-sm-2">User Name <i class="text-danger">*</i></label>
                <div class="col-xs-10">
                     <input type="lastname" name="username" placeholder="username" class="form-control" value="<?php echo $username ?>" > 
               </div>
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">email <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                     <input type="email" name="email" placeholder="email" class="form-control" value="<?php echo $email ?>"> 
                 </div>
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">password <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                     <input type="password" name="password" placeholder="password" class="form-control" value="<?php echo $password ?>" >
                 </div>
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">designation <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                       <input type="text" name="designation" placeholder="designation" class="form-control" value="<?php echo $designation ?>">
                </div>
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">department <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                <select name="department" class="form-control">
                      <option value="" selected="selected">Select Department</option>
                      <option  <?php if($department == "Microbiology"){ echo ' selected="selected"'; } ?> >Microbiology</option>
                      <option <?php if($department == "Neonatal"){ echo ' selected="selected"'; } ?>   >Neonatal</option>
                      <option <?php if($department == "Nephrology"){ echo ' selected="selected"'; } ?>   >Nephrology</option>
                      <option <?php if($department == "Neurology"){ echo ' selected="selected"'; } ?>   >Neurology</option>
                      <option <?php if($department == "Oncology"){ echo ' selected="selected"'; } ?>   >Oncology</option>
                      <option <?php if($department == "Orthopaedics"){ echo ' selected="selected"'; } ?>   >Orthopaedics</option>
                      <option <?php if($department == "Pharmacy"){ echo ' selected="selected"'; } ?>   >Pharmacy</option>
                      <option <?php if($department == "Radiotherapy"){ echo ' selected="selected"'; } ?>   >Radiotherapy</option>
                      <option <?php if($department == "Rheumatology"){ echo ' selected="selected"'; } ?>   >Rheumatology</option>
                      <option <?php if($department == "Gynaecology"){ echo ' selected="selected"'; } ?>   >Gynaecology</option>
                      <option <?php if($department == "Obstetrics"){ echo ' selected="selected"'; } ?>   >Obstetrics</option>
                      <option <?php if($department == "General Surgery"){ echo ' selected="selected"'; } ?>   >General Surgery</option>
                </select> 
               </div>
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">address <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <input type="text" name="address" placeholder="address" class="form-control" value="<?php echo $address ?>">
                 </div>
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">phone <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <input type="phone" name="phone" placeholder="phone NO" class="form-control" value="<?php echo $phone ?>"> 
                </div>
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">mobile <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                     <input type="phone" name="mobile" placeholder="mobile NO" class="form-control" value="<?php echo $mobile ?>"> 
                </div>
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">short_biography <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <textarea name="short_biography" placeholder="short_biography" maxlength="140" rows="7" class="tinymce form-control"><?php echo $short_biography ?></textarea>
                 </div>
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">picture <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <input type="file" name="picture" value="<?php echo $picture ?> "> 
                 </div>
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">specialist <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <input type="text" name="specialist" placeholder="specialist" class="form-control" value="<?php echo $specialist ?> "> 
                  </div>
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">Date of Birth <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                      <input type="date" class="datepicker form-control"  name="date_of_birth">  
                 </div>
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">Sex<i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                     <input type="Radio" name="sex" value="male" <?php if($sex == "male"){ echo ' checked="checked"'; } ?> > male  
                     <input type="Radio" name="sex" value="female" <?php if($sex == "female"){ echo ' checked="checked"'; } ?>>  female
                  </div> 
            </div>

            <div class="form-group row">
               <label class="control-label col-sm-2">Blood Group <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                      <select name="blood_group" class="form-control">
                                <option value="" selected="selected">Select Option</option>
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
               <label class="control-label col-sm-2">Education/Degree <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                      <textarea name="education" placeholder="Education/Degree" maxlength="140" rows="7" class="tinymce form-control"> <?php echo $education ?></textarea>  <br>
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
              $stmt = $con ->prepare(" DELETE FROM doctors WHERE doctorID=? ");
              $stmt ->execute(array($id));

              header('Location: doctors.php?do=" " ');


        } 

