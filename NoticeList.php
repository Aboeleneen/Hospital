    <?php 
          if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
 
      // Notice List
     ?>
 
 <?php
   $do = isset($_GET['do']) ? $_GET['do'] : 'manage' ;
    include 'contact.php' ;
    if($do != 'Edit' and $do !='delete'){
 
    
     global $i; 
       $i = 1 ;
     
        $sql = $con->prepare("SELECT * FROM notices ");
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
                            <a class="btn btn-success btn-lg" href="addNotice.php"> <i class="fa fa-plus"></i>  Add Notice </a>  
                           
                        </div>
                    </div> 

            <div class="panel-body">
                <div  class="table-responsive ">
                       <table class="datatable table table-striped table-bordered"  cellspacing="0" width="100%">
                         <h1 class="btn btn-success btn-block btn-lg" >Notice List </h1>
                        <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                     <th>Action</th>
                                </tr>
                            </thead>
         
           <?php  


        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tbody>
             <tr class="odd gradeX" >
         <td> <?php echo $i; $i++ ;?>
         <td><?php echo $row['title'];?></td>
         <td><?php echo $row['description'];?></td> 
         <td><?php echo $row['start_date'];?></td> 
         <td><?php echo $row['end_date'];?></td>
          <td><a class="btn btn-primary" href="NoticeList.php?do=Edit&id=<?php echo $row['id'] ?>"> edit</a> 
               <a class="btn btn-danger" href="NoticeList.php?do=delete&id=<?php echo $row['id'] ?>"> delete</a></td> 
        </tr>
         <?php } ?></tbody>
      </table>
       </div>
        </div>
    </div> 
    </div> 
  </div>
     <?php } else if($do == 'Edit'){

          if($_SESSION['Role'] != "Admin"){
              header('Location:login.php');
         }


          $id = $_GET['id'];
           $sql = $con->prepare("SELECT * FROM notices Where id = ? ");
           $sql->execute(array($id));
           $row = $sql ->fetch();
           $count =$sql ->rowCount();

           $title = $row['title'];
           $description = $row['description'];
           $start_date = $row['start_date'];
           $end_date = $row['end_date'];

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
                    <a class="btn btn-primary btn-lg " href="NoticeList.php"> <i class="fa fa-list"></i>  Notice List </a>  
                </div>
            </div> 
    <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-10 col-sm-12">

            <form action="addNotice.php?do=Edit&id=<?php echo $row['id'] ?>" method="POST" class="form-horizontal" >


            <div class="form-group row">
              <label  class="control-label col-sm-2">Title <i class="text-danger">*</i></label>
                 <div class="col-sm-10">
                <input type="text" name="title" placeholder="title" value="<?php echo $title ?>" class="form-control" >
                 </div>
            </div>

            <div class="form-group row">
              <label  class="control-label col-sm-2">Description  <i class="text-danger">*</i></label>
                 <div class="col-sm-10">
                <textarea name="description" placeholder="description" maxlength="140" rows="7" class="tinymce form-control" ><?php echo $description ?></textarea>
                 </div>
            </div>

             <div class="form-group row">
              <label  class="control-label col-sm-2">Start Date  <i class="text-danger">*</i></label>
                 <div class="col-sm-10">
                <input type="date" name="start_date" placeholder="start date" value="<?php echo $start_date ?>" class="form-control" >
                  </div>
            </div>
            
             <div class="form-group row">
              <label  class="control-label col-sm-2">End Date <i class="text-danger">*</i></label>
                 <div class="col-sm-10">
                <input type="date" name="end_date" placeholder="end date" value="<?php echo $end_date ?>" class="form-control" >
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
              $stmt = $con ->prepare(" DELETE FROM notices WHERE id= ? ");
              $stmt ->execute(array($id));

              header('Location: NoticeList.php?do=" " ');


        } 


