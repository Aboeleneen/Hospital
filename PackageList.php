   <?php 
            session_start();

     ?>
     
    <!-- sidebar area -->
   


    <!-- end sidebar area -->
      
 <?php  

   //Package List  

    $do = isset($_GET['do']) ? $_GET['do'] : 'manage' ;
    include 'contact.php' ;
    if($do != 'Edit' and $do !='delete'){

 

   global $i;
       $i = 1 ;

        include 'contact.php' ;

       $sql = $con->prepare("SELECT * FROM packages ");
        $sql->execute();

         ?>
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
             
           <?php include 'files.php' ; ?>
            <?php include 'sidebar/sidebar.php' ; ?>

    </div>
       
             
              <!--  table area -->

              <div id="main">
                <?php include 'navbar/navbar.php' ;?>
              <div class="col-sm-12">
                  <div  class="panel panel-default thumbnail">
           
                      <div class="panel-heading no-print">
                          <div class="btn-group" style="position: relative;"> 
                              <a class="btn btn-success btn-lg" href="addPackage.php"> <i class="fa fa-plus"></i>  Add Package </a>  
                             
                          </div>
                      </div> 

              <div class="panel-body">
                  <div  class="table-responsive ">
                         <table class="datatable table table-striped table-bordered"  cellspacing="0" width="100%">
                           <h1 class="btn btn-success btn-block btn-lg" >Package List </h1>
                          <thead>
                                  <tr>
                                      <th>NO</th>
                                      <th>Package Name</th>
                                      <th>Description</th>
                                      <th>Discount</th>
                                       <th>Action</th>
                                  </tr>
                              </thead>
           
   <?php     


        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tbody>
        <tr class="odd gradeX" >
         <td> <?php echo $i; $i++ ;?>
         <td><?php echo $row['package'];?></td>
         <td><?php echo $row['description'];?></td> 
         <td><?php echo $row['discount'];?></td>
         <td><a class="btn btn-primary"  href="PackageList.php?do=Edit&id=<?php echo $row['id'] ?>"> edit</a>
             <a  class="btn btn-danger" href="PackageList.php?do=delete&id=<?php echo $row['id'] ?>"> delete</a></td>
       </tr>
         <?php } ?></tbody>
              </table>
               </div>
                </div>
            </div> 
            </div> 
          </div>
     <?php }else if($do == 'Edit'){

        if($_SESSION['Role'] != "Admin" AND $_SESSION['Role'] != "Accountant"){
              header('Location:login.php');
         }

          $id = $_GET['id'];
          $sql = $con->prepare("SELECT * FROM packages Where id = ? ");
          $sql->execute(array($id));
          $row = $sql ->fetch();
          $count =$sql ->rowCount();

          $package = $row['package'];
          $description = $row['description'];
          $discount = $row['discount'];
          $Service = $row['service'];
          $quantity = $row['quantity'];
          $rate = $row['rate'];

          if($count > 0)
           { ?>
              <div id="main">
                <?php include 'navbar/navbar.php' ;?>
                  <div class="col-sm-12">
                  <div  class="panel panel-default thumbnail">
            
                     <div class="panel-heading no-print">
                          <div class="btn-group"> 
                              <a class="btn btn-primary btn-lg " href="PackageList.php"> <i class="fa fa-list"></i>  Package List </a>  
                          </div>
                      </div> 
              <div class="panel-body panel-form">
                          <div class="row">
                              <div class="col-md-10 col-sm-12">
            <form action="addPackage.php?do=Edit&id=<?php echo $row['id'] ?>" method="POST" class="form-horizontal" >

            <div class="form-group row">
              <label  class="control-label col-sm-2">Package Name <i class="text-danger">*</i></label>
                <div class="col-sm-10">
              <input type="text" name="package" placeholder="package Name" value="<?php echo $package ?>" class="form-control" > 
               </div>
            </div> 

            <div class="form-group row">
              <label  class="control-label col-sm-2">Description <i class="text-danger">*</i></label>
                <div class="col-sm-10">
              <textarea name="description" placeholder="description" maxlength="140" rows="7" class="tinymce form-control"> <?php echo $description ?></textarea> 
              </div>
            </div> 

            <div class="form-group row">
              <label  class="control-label col-sm-2">Package Including <i class="text-danger">*</i></label>
                <div class="col-sm-3">
              <input type="text" name="service" placeholder="Service Name" value="<?php echo $Service ?>" class="form-control"  >
              </div>
               <div class="col-sm-3">
              <input type="text" name="quantity" placeholder="Quantity" value="<?php echo $quantity ?>" class="form-control" > 
               </div>
            <div class="col-sm-3">
              <input type="text" name="rate" placeholder="Rate" value="<?php echo $rate ?>" class="form-control" > 
             </div>
            </div> 
             
    

            <div class="form-group row">
              <label  class="control-label col-sm-2">Discount <i class="text-danger">*</i></label>
                <div class="col-sm-10">
              <input type="text" name="discount" placeholder="discount" value="<?php echo $discount ?>" class="form-control"  > 
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
                     if($_SESSION['Role'] != "Admin" AND $_SESSION['Role'] != "Accountant"){
              header('Location:login.php');
              exit();
         }
                         $id = $_GET['id'];
                        $stmt = $con ->prepare(" DELETE FROM packages WHERE id=? ");
                        $stmt ->execute(array($id));

                        header('Location: PackageList.php?do=" " ');


                  } 