<?php

session_start();
    if($_SESSION['Role'] != "Admin" AND $_SESSION['Role'] != "Doctor" AND $_SESSION['Role'] != "Receptionist" AND $_SESSION['Role'] != "Representative"){
              header('Location:login.php');
         }
  include 'contact.php' ;
   include 'files.php' ;
   
   if($_SERVER['REQUEST_METHOD']== "POST"){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $mobile = $_POST['mobile'];
    $blood_group = $_POST['blood_group'];
    $sex = $_POST['sex'];
    $Date= $_POST['date_of_birth'];
    $picture = $_POST['picture'];
    $address = $_POST['address'];
  
  if( ! isset($_GET['do'])){
      $sql = "INSERT INTO patients (fullname, username, email, password, phone, mobile, bloodgroup, sex, birth, picture, address) VALUES ('$fullname', '$username', '$email', '$password', '$phone', '$mobile', '$blood_group', '$sex', '$Date', '$picture', '$address')" ;

       $con ->exec($sql);

        $sql = "INSERT INTO users (username,password,Role,fullname,email,telephone) VALUES ('$username','$password','patient  ','$fullname','$email','$mobile') " ;
       $con ->exec($sql);
       header('Location: patientLists.php?do=" " ');
   }
   elseif($_GET['do'] == 'Edit'){
    $id = $_GET['id'];
$stmt = $con ->prepare("UPDATE patients SET fullname= ?,username = ? ,email = ? ,password = ?,address=? ,phone = ? ,mobile = ?,picture = ?,birth = ?, sex = ?, bloodgroup = ? WHERE userID =  ?  ");
      $stmt ->execute(array($fullname,$username,$email,$password,$address,$phone,$mobile,$picture,$Date,$sex,$blood_group,$_GET['id']));
      header('Location: patientLists.php?do=" " ');
   }
   }
?>






<!DOCTYPE html>
<html>
<head>
  <title></title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
     
</head>
<body>

   <div id="mySidenav" class="sidenav">
           <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <?php include 'sidebar/sidebar.php'; ?>
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
            <form action="addpatient.php" method="POST" class="form-horizontal">
            <div class="form-group row">
              <label  class="control-label col-sm-2">Full Name <i class="text-danger">*</i></label>
                 <div class="col-sm-10">
                    <input type="text" name="fullname" placeholder="fullname" class="form-control" required=""  > 
              </div>
           </div> 

           <div class="form-group row">
              <label  class="control-label col-sm-2">User Name <i class="text-danger">*</i></label>
                 <div class="col-sm-10">      
            <input type="lastname" name="username" placeholder="username" class="form-control" required=""> 
                </div>
           </div> 

           <div class="form-group row">
              <label  class="control-label col-sm-2">Email <i class="text-danger">*</i></label>
                 <div class="col-sm-10">  
                     <input type="email" name="email" placeholder="email" class="form-control" required=""> 
                </div>
           </div> 

           <div class="form-group row">
              <label  class="control-label col-sm-2">password <i class="text-danger">*</i></label>
                 <div class="col-sm-10">  
          <input type="password" name="password" placeholder="password" class="form-control" required=""> 
                  </div>
           </div> 

          <div class="form-group row">
              <label  class="control-label col-sm-2">phone NO <i class="text-danger">*</i></label>
                 <div class="col-sm-10">  
          <input type="phone" name="phone" placeholder="phone NO"  class="form-control" required="">       </div>
           </div> 
       
           <div class="form-group row">
              <label  class="control-label col-sm-2">phone NO <i class="text-danger">*</i></label>
                 <div class="col-sm-10">  
             <input type="phone" name="mobile" placeholder="mobile NO" class="form-control" required="">
               </div>
           </div> 
          
         <div class="form-group row">
               <label class="control-label col-sm-2">Blood Group <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
          <select name="blood_group" value="<?php echo $blood_group ?> " class="form-control">
                <option>Select Option </option>
                <option  >A+</option>
                <option>A-</option>
                <option>B+</option>
                <option>B-</option>
                <option >O+</option>
                <option  >O-</option>
                <option  >AB+</option>
                <option  >AB-</option>
                </select> 
              </div>
           </div>


          <div class="form-group row">
               <label class="control-label col-sm-2">Sex<i class="text-danger">*</i></label>
               <div class="col-xs-10">
                 <input type="Radio" name="sex" value="male" >  male
                  <input type="Radio" name="sex" value="female"  >female
                  </div>
           </div> 

        <div class="form-group row">
               <label class="control-label col-sm-2">Date of Birth <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                   <input type="date" name="date_of_birth" class="datepicker form-control" required="">                  
               </div>
           </div> 

             <div class="form-group row">
               <label class="control-label col-sm-2">picture <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                   <input type="file" name="picture"  " > 
              </div>
           </div> 
            
            <div class="form-group row">
               <label class="control-label col-sm-2">Address <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                 <textarea name="address" placeholder="Address" maxlength="140" rows="7" class="tinymce form-control" required=""> </textarea>
                </div>
           </div> 
          
            <div class="form-group row">
                <div class="col-sm-offset-3 col-sm-6">
                               <input type="submit" name="" value="save" class="btn btn-success btn-lg" >
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