<?php
//
   session_start();
   if($_SESSION['Role'] != "Admin"){
              header('Location:login.php');
         }    
  include 'contact.php' ;
   include 'files.php' ;
  // ADD NOTICE

 
    include 'contact.php';

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
    	$title = $_POST['title'];
    	$description = $_POST['description'];
    	$start_date = $_POST['start_date'];
    	$end_date = $_POST['end_date'];

        if( ! isset($_GET['do'])){
    	$sql ="INSERT INTO Notices (title,description,start_date,end_date) VALUES ('$title','$description','$start_date','$end_date')" ;
    	$con ->exec($sql);
         header('Location: NoticeList.php ');
    }
     else if ($_GET['do'] == 'Edit')
    {

           $id = $_GET['id'];

           $stmt = $con ->prepare("UPDATE Notices SET title = ? ,description = ?,start_date = ?,end_date = ? WHERE id = ?");
         
           $stmt ->execute(array($title,$description,$start_date,$end_date,$id));
                
           header('Location: NoticeList.php ');

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
 
   <?php include 'navbar/navbar.php'; ?> 

    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
  
           <div class="panel-heading no-print">
                <div class="btn-group"> 
                      <a class="btn btn-primary btn-lg " href="NoticeList.php"> <i class="fa fa-list"></i>  Notice List </a> 
                </div>
            </div> 
    <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-10 col-sm-12">
         <form action="addNotice.php" method="POST" class="form-horizontal" >
    <div class="form-group row">
              <label  class="control-label col-sm-2">Title <i class="text-danger">*</i></label>
                 <div class="col-sm-10">
                <input type="text" name="title" placeholder="title" class="form-control" required="" >
                 </div>
            </div>

            <div class="form-group row">
              <label  class="control-label col-sm-2">Description  <i class="text-danger">*</i></label>
                 <div class="col-sm-10">
                <textarea name="description" placeholder="description" maxlength="140" rows="7" class="tinymce form-control" required=""></textarea>
                 </div>
            </div>

             <div class="form-group row">
              <label  class="control-label col-sm-2">Start Date  <i class="text-danger">*</i></label>
                 <div class="col-sm-10">
                <input type="date" name="start_date" placeholder="start date" class="form-control" required="" >
                  </div>
            </div>
            
             <div class="form-group row">
              <label  class="control-label col-sm-2">End Date <i class="text-danger">*</i></label>
                 <div class="col-sm-10">
                <input type="date" name="end_date" placeholder="end date" class="form-control" required="">
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