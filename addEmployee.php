<?php
//
   session_start();
   if($_SESSION['Role'] != "Admin"){
              header('Location:login.php');
         }
  include 'contact.php' ;
   include 'files.php' ;
// add  new empolyee  
 include 'contact.php'; 

if($_SERVER['REQUEST_METHOD'] == "POST"){

	$Role = $_POST['Role'];
	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$mobile = $_POST['mobile'];
	$sex = $_POST['sex'];
	$picture = $_POST['picture'];
	$address = $_POST['address'];
    
    if( ! isset($_GET['do'])){
	$sql = "INSERT INTO Employees (Role,fullname,username,email,password,mobile,sex,picture,address) VALUES ('$Role','$fullname','$username','$email','$password','$mobile','$sex','$picture','$address')" ;
	$con ->exec($sql);

	$sql = "INSERT INTO users (username,password,Role,fullname,email,telephone) VALUES ('$username','$password','$Role','$fullname','$email','$mobile') " ;
	$con ->exec($sql);
   
	if($Role == 'Case_manager'){
		header('Location: CaseManagerList.php?do=" " ');
	}

	if($Role == 'Laboratorist'){
		header('Location: LaboratoristList.php?do=" " ');
	}
	if($Role == 'Nurse'){
		      header('Location: NurseList.php?do=" " ');
    }
    if($Role == 'Pharmacist'){
		      header('Location: PharmacistList.php?do=" " ');
    }
    if($Role == 'Receptionist'){
		      header('Location: ReceptionistList.php?do=" " ');
    }
    if($Role == 'Representative'){
		      header('Location: RepresentativeList.php?do=" " ');
    }
    if($Role == 'Accountant'){
		      header('Location: AccountantList.php?do=" " ');
    }



      }

      else if ($_GET['do'] == 'Edit')
    {

           $id = $_GET['id'];
           $stmt = $con ->prepare("UPDATE Employees SET Role = ?,fullname = ?,username = ?,email = ?,password = ?,mobile = ?,sex = ?,picture = ?,address = ? WHERE id = ? ");
           $stmt ->execute(array($Role,$fullname,$username,$email,$password,$mobile,$sex,$picture,$address,$id));

          
         $sql = "INSERT INTO users (username,password,Role,fullname,email,telephone) VALUES ('$username','$password','$Role','$fullname','$email','$mobile') " ;
	        $con ->exec($sql);
	        
             
           if($Role == 'Case_manager'){
		      header('Location: CaseManagerList.php?do=" " ');
	          }
           if($Role == 'Laboratorist'){
		      header('Location: LaboratoristList.php?do=" " ');
	          }
	        if($Role == 'Nurse'){
		      header('Location: NurseList.php?do=" " ');
	          }
	        if($Role == 'Pharmacist'){
		      header('Location: PharmacistList.php?do=" " ');
	          }
	        if($Role == 'Receptionist'){
		      header('Location: ReceptionistList.php?do=" " ');
               }
            if($Role == 'Representative'){
		      header('Location: RepresentativeList.php?do=" " ');
               }
            if($Role == 'Accountant'){
		      header('Location: AccountantList.php?do=" " ');
               } 

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
      <?php include 'sidebar/sidebar.php' ;?>
    </div> 
    <div id="main">
 
   <?php include 'navbar/navbar.php' ; ?> 

    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
  
           <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary btn-lg " href="AccountantList.php"> <i class="fa fa-list"></i>  Accountant List </a> <a class="btn btn-primary btn-lg " href="LaboratoristList.php"> <i class="fa fa-list"></i>  Laboratorist List </a>
                    <a class="btn btn-primary btn-lg " href="NurseList.php"> <i class="fa fa-list"></i>  Nurse List </a>
                   <a class="btn btn-primary btn-lg " href="PharmacistList.php"> <i class="fa fa-list"></i>  Pharmacist List </a>
                    <a class="btn btn-primary btn-lg " href="ReceptionistList.php"> <i class="fa fa-list"></i>  Receptionist List </a>
                    <a class="btn btn-primary btn-lg " href="RepresentativeList.php"> <i class="fa fa-list"></i>  Representative List </a>
                    <a class="btn btn-primary btn-lg " href="CaseManagerList.php"> <i class="fa fa-list"></i>  Case Manager List </a>
                </div>
            </div> 
    <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-10 col-sm-12">
     <form action="addEmployee.php" method="POST" class="form-horizontal" >
	 <div class="form-group row">
              <label  class="control-label col-sm-2">User Role <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                    <select name="Role" class="form-control" >
                      <option value="" selected="selected">Select Option</option>
                        <option ">Admin</option>
                        <option >Doctor</option>
                        <option  >Accountant</option>
                        <option >Laboratorist</option>
                        <option >Nurse</option>
                        <option >Pharmacist</option>
                        <option >Receptionist</option>
                        <option>Representative</option>
                        <option>Case_manager</option>
                    </select>
                 </div>
            </div> 

            <div class="form-group row">
              <label  class="control-label col-sm-2">Full Name <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                    <input type="text" name="fullname" placeholder="fullname"  class="form-control" required=""> 
                 </div>
            </div> 

            <div class="form-group row">
              <label  class="control-label col-sm-2">User Name <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                    <input type="text" name="username" placeholder="username"  class="form-control" required="" >  
               </div>
            </div> 

             <div class="form-group row">
              <label  class="control-label col-sm-2">Email Address <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                    <input type="email" name="email" placeholder="email address"  class="form-control" required="" >
                </div>
            </div> 

             <div class="form-group row">
              <label  class="control-label col-sm-2">Password <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                    <input type="password" name="password" placeholder="password"  class="form-control" required="" > 
                </div>
            </div> 

             <div class="form-group row">
              <label  class="control-label col-sm-2">Mobile No <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                    <input type="text" name="mobile" placeholder="mobile NO" class="form-control"  required=""> 
                 </div>
            </div> 
           <div class="form-group row">
              <label  class="control-label col-sm-2">Sex <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                    <input type="Radio" name="sex" value="Male"  > Male
                    <input type="Radio" name="sex" value="female"  >  Female
               </div>
            </div> 

            <div class="form-group row">
              <label  class="control-label col-sm-2">Picture <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                    <input type="file" name="picture"   > 
               </div>
            </div> 


            <div class="form-group row">
              <label  class="control-label col-sm-2">Address <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                    <textarea name="address" placeholder="address"  maxlength="140" rows="7" class="tinymce form-control" required=""> </textarea> 
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