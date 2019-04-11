   <?php 
            session_start();
 
     ?>
     

      
 <?php  
    //Nurse  List


    $do = isset($_GET['do']) ? $_GET['do'] : 'manage' ;
    include 'contact.php' ;
    if($do != 'Edit' and $do !='delete'){ 

    global $i;
       $i = 1 ;
   
   $sql = $con->prepare("SELECT * FROM employees WHERE Role = 'Nurse' ");
        $sql->execute();
          ?>
  
       
   
    <!--  table area -->
    <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
             
           <?php include 'files.php' ;?>
            <?php include 'sidebar/sidebar.php' ;?>

    </div>

    <div id="main">
      <?php include 'navbar/navbar.php' ;?>
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group" style="position: relative;"> 
                    <a class="btn btn-success btn-lg" href="addEmployee.php"> <i class="fa fa-plus"></i>  Add Employee </a>  
                   
                </div>
            </div> 

    <div class="panel-body"> 
        <div  class="table-responsive ">
               <table class="datatable table table-striped table-bordered"  cellspacing="0" width="100%">
                 <h1 class="btn btn-success btn-block btn-lg" >Nurse List </h1>
                <thead>
                        <tr>
                            <th>NO</th>
                            <th>Picture</th>
                            <th>Full Name</th>
                            <th>User Name</th>
                            <th>Email Address</th> 
                            <th>Mobile No</th>  
                            <th>Address</th>
                            <th>Sex</th>
                            <th>User Role</th>  
                             <th>Action</th>
                        </tr>
                    </thead>
 
   <?php    
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tbody>
         <tr>
         <td> <?php echo $i; $i++ ;?>
          <td> <img  height="40px"src="images/logo2.PNG"></td>
         <td><?php echo $row['fullname'];?></td> 
         <td><?php echo $row['username'];?></td> 
          
         <td><?php echo $row['email'];?></td>                        
          
             <td><?php echo $row['mobile'];?></td>
             <td><?php echo $row['address'];?></td>
             <td><?php echo $row['sex'];?></td>
             <td><?php echo "Nurse";?></td> 
             <td><a class="btn btn-primary" href="NurseList.php?do=Edit&id=<?php echo $row['id'] ?>"> edit</a>
                <a class="btn btn-danger" href="NurseList.php?do=delete&id=<?php echo $row['id'] ?>"> delete</a>
                  <a class="btn btn-info"   href="profile.php?id=<?php echo $row['id'] ?>&user=Employee&Role=Nurse"> show</a> </td> 
        </tr>
          <?php } ?></tbody>
      </table>
       </div>
        </div>
    </div> 
    </div> 
  </div>
     <?php  } else if($do == 'Edit'){

          if($_SESSION['Role'] != "Admin"){
              header('Location:login.php');
         }

           $id = $_GET['id'];
           $sql = $con->prepare("SELECT * FROM employees Where id = ? AND Role = 'Nurse' ");
           $sql->execute(array($id));
           $row = $sql ->fetch();
           $count =$sql ->rowCount();

            $Role = $row['Role'];
            $fullname = $row['fullname'];
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['password'];
            $mobile = $row['mobile'];
            $sex = $row['sex'];
            $picture = $row['picture'];
            $address = $row['address'];

            if($count > 0)
           { ?> < <div id="mySidenav" class="sidenav">
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
                    <a class="btn btn-primary btn-lg " href="NurseList.php"> <i class="fa fa-list"></i>  Nurse List </a>  
                </div>
            </div> 
    <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-10 col-sm-12">

            <form action="addEmployee.php?do=Edit&id=<?php echo $row['id'] ?>" method="POST" class="form-horizontal" >
                   <div class="form-group row">
              <label  class="control-label col-sm-2">User Role <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                    <select name="Role" class="form-control" >
                      <option value="" selected="selected">Select Option</option>
                        <option ">Admin</option>
                        <option >Doctor</option>
                        <option>Accountant</option>
                        <option >Laboratorist</option>
                        <option selected="selected" >Nurse</option>
                        <option >Pharmacist</option>
                        <option >Receptionist</option>
                        <option>Representative</option>
                        <option >Case_manager</option>
                    </select>
                 </div>
            </div> 

                
                     <div class="form-group row">
              <label  class="control-label col-sm-2">Full Name <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                    <input type="text" name="fullname" placeholder="fullname" value="<?php echo $fullname ?>" class="form-control" > 
                 </div>
            </div> 

            <div class="form-group row">
              <label  class="control-label col-sm-2">User Name <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                    <input type="text" name="username" placeholder="username" value="<?php echo $username ?>" class="form-control"  >  
               </div>
            </div> 

             <div class="form-group row">
              <label  class="control-label col-sm-2">Email Address <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                    <input type="email" name="email" placeholder="email address" value="<?php echo $email ?>" class="form-control" >
                </div>
            </div> 

             <div class="form-group row">
              <label  class="control-label col-sm-2">Password <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                    <input type="password" name="password" placeholder="password" value="<?php echo $password ?>" class="form-control"  > 
                </div>
            </div> 

             <div class="form-group row">
              <label  class="control-label col-sm-2">Mobile No <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                    <input type="text" name="mobile" placeholder="mobile NO" value="<?php echo $mobile ?>" class="form-control"  > 
                 </div>
            </div> 
           <div class="form-group row">
              <label  class="control-label col-sm-2">Sex <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                    <input type="Radio" name="sex" value="Male" <?php if($sex == "male"){ echo ' checked="checked"'; } ?> > Male
                    <input type="Radio" name="sex" value="female" <?php if($sex == "female"){ echo ' checked="checked"'; } ?> >  Female
               </div>
            </div> 

            <div class="form-group row">
              <label  class="control-label col-sm-2">Picture <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                    <input type="file" name="picture" value="<?php echo $picture ?>"  > 
               </div>
            </div> 


            <div class="form-group row">
              <label  class="control-label col-sm-2">Address <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                    <textarea name="address" placeholder="address"  maxlength="140" rows="7" class="tinymce form-control" > <?php echo $address ?> </textarea> 
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
                               $sql = $con->prepare("SELECT * FROM employees Where id = ? AND Role = 'Nurse' ");
                               $sql->execute(array($id));
                               $row = $sql ->fetch();
                               $count =$sql ->rowCount();

                                $Role = $row['Role'];
                                $fullname = $row['fullname'];
                                $username = $row['username'];
                                $password = $row['password'];

                            
                             $stmt = $con ->prepare(" DELETE FROM employees Where id = ? AND Role = 'Nurse' ");
                              $stmt ->execute(array($id));

                              $stmt = $con ->prepare(" DELETE FROM users Where fullname = ? AND username = ? AND Role = ? AND password = ? ");
                              $stmt ->execute(array($fullname,$username,$Role,$password));

                              header('Location: NurseList.php?do=" " ');


                        } 

