<?php
//
   session_start();
   if($_SESSION['Role'] != "Admin"){
              header('Location:login.php');
         }    
  include 'contact.php' ;
   include 'files.php' ;
   // add new doctors  
  if($_SERVER['REQUEST_METHOD']== "POST")
  {
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
    $department =$_POST['department'];
    $designation = $_POST['designation'];
    $short_biography = $_POST['short_biography'];
    $specialist = $_POST['specialist'];
    $education = $_POST['education'];    
     
     if( ! isset($_GET['do'])){
    $sql = "INSERT INTO doctors (fullname, username, email, password,designation,department,address, phone, mobile,biography,picture,specialist,date_of_birth,sex, blood_group, education ) VALUES ('$fullname', '$username', '$email', '$password', '$designation','$department','$address','$phone', '$mobile','$short_biography','$picture','$specialist','$Date','$sex', '$blood_group', '$education')" ;

   

    $con ->exec($sql); 


        $sql = "INSERT INTO users (username,password,Role,fullname,email,telephone) VALUES ('$username','$password','Doctor  ','$fullname','$email','$mobile') " ;
       $con ->exec($sql);

       header('Location: doctors.php?do=" " ');

    }
    else if ($_GET['do'] == 'edit')
    {

           $id = $_GET['id'];
$stmt = $con ->prepare("UPDATE doctors SET fullname= ?,username = ? ,email = ? ,password = ?,designation = ? ,department = ?,address=? ,phone = ? ,mobile = ?,biography = ? ,picture = ?,specialist = ? ,date_of_birth = ?, sex = ?, blood_group = ? ,education = ? WHERE doctorID =  ?  ");
      $stmt ->execute(array($fullname,$username,$email,$password,$designation,$department,$address,$phone,$mobile,$short_biography,$picture,$specialist,$Date,$sex,$blood_group,$education,$_GET['id']));



      header('Location: doctors.php?do=" " ');
     /* $stmt = $con ->prepare("UPDATE `doctors` SET `fullname` = 'mahmoud22', `username` = 'username22', `email` = 'ss@gamil.com22', `password` = 'ssss22', `designation` = '22', `department` = 'Neonatal', `address` = '22', `phone` = '02', `mobile` = '02', `biography` = '2', `picture` = '02', `specialist` = 'specialist2', `date_of_birth` = '2018-04-27', `sex` = 'female', `blood_group` = 'B+', `education` = 'ed2ucation' WHERE `doctors`.`doctorID` = 2")
      $sql = "INSERT INTO users (username,password,Role,fullname,email,telephone) VALUES ('$username','$password','Doctor  ','$fullname','$email','$mobile') " ;
       $con ->exec($sql);*/
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
     m      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <?php include 'sidebar/sidebar.php' ;?>
    </div> 
    <div id="main">
 
   <?php include 'navbar/navbar.php'; ?> 

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

      <form action="adddoctor.php" method="POST" class="form-horizontal" >
            <div class="form-group row">
              <label  class="control-label col-sm-2">First Name <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                     <input type="text" name="fullname" placeholder="fullname" class="form-control" required=""> 
                </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-sm-2">User Name <i class="text-danger">*</i></label>
                <div class="col-xs-10">
                     <input type="lastname" name="username" placeholder="username" class="form-control" required="" > 
               </div>
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">email <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                     <input type="email" name="email" placeholder="email" class="form-control" required=""> 
                 </div>
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">password <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                     <input type="password" name="password" placeholder="password" class="form-control" required="" >
                 </div>
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">designation <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                       <input type="text" name="designation" placeholder="designation" class="form-control" required="">
                </div>
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">department <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                <select name="department" class="form-control">
                  <option value="" selected="selected">Select Department</option>
                  <option >Microbiology</option>
                  <option >Neonatal</option>
                  <option >Nephrology</option>
                  <option >Neurology</option>
                  <option >Oncology</option>
                  <option >Orthopaedics</option>
                  <option >Pharmacy</option>
                  <option >Radiotherapy</option>
                  <option >Rheumatology</option>
                  <option >Gynaecology</option>
                  <option >Obstetrics</option>
                  <option >General Surgery</option>
                </select> 
               </div>
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">address <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <input type="text" name="address" placeholder="address" class="form-control" required="">
                 </div>
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">phone <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <input type="phone" name="phone" placeholder="phone NO" class="form-control" required=""> 
                </div>
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">mobile <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                     <input type="phone" name="mobile" placeholder="mobile NO" class="form-control" required=""> 
                </div>
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">short_biography <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <textarea name="short_biography" placeholder="short_biography" maxlength="140" rows="7" class="tinymce form-control" required=""></textarea>
                 </div>
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">picture <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <input type="file" name="picture"> 
                 </div>
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">specialist <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                    <input type="text" name="specialist" placeholder="specialist" class="form-control" required=""> 
                  </div> 
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">Date of Birth <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                      <input type="date" class="datepicker form-control"  name="date_of_birth" required="">  
                 </div>
            </div>
            <div class="form-group row">
               <label class="control-label col-sm-2">Sex<i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                     <input type="Radio" name="sex" value="male"> male  
                     <input type="Radio" name="sex" value="female">  female
                  </div>
            </div>

            <div class="form-group row">
               <label class="control-label col-sm-2">Blood Group <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                      <select name="blood_group" class="form-control">
                                <option value="" selected="selected">Select Option</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                        </select>
                 </div>
            </div>    
              
            <div class="form-group row">
               <label class="control-label col-sm-2">Education/Degree <i class="text-danger">*</i></label>
                 <div class="col-xs-10">
                      <textarea name="education" placeholder="Education/Degree" maxlength="140" rows="7" class="tinymce form-control" required=""></textarea>  <br>
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

