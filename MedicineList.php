<?php  
            session_start();
 
     ?>
     
 
      
 <?php 
 
 // Medicine List 
   $do = isset($_GET['do']) ? $_GET['do'] : 'manage' ;
    include 'contact.php' ;
    if($do != 'Edit' and $do !='delete'){
 
    
     global $i;
       $i = 1 ;
     
        $sql = $con->prepare("SELECT * FROM medicines ");
        $sql->execute();
         
         ?>
            
                 
             
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
                              <a class="btn btn-success btn-lg" href="addMedicine.php"> <i class="fa fa-plus"></i>  Add Medicine </a>  
                             
                          </div>
                      </div> 

              <div class="panel-body">
                  <div  class="table-responsive ">
                         <table class="datatable table table-striped table-bordered"  cellspacing="0" width="100%">
                           <h1 class="btn btn-success btn-block btn-lg" >Medicine List </h1>
                          <thead>
                                  <tr>
                                      <th>NO</th>
                                      <th>Medicine Name</th>
                                      <th>Category Name</th>
                                      <th>Description</th>
                                      <th>price</th> 
                                      <th>Manufactured By</th>
                                       <th>Action</th>
                                  </tr>
                              </thead>
           
             <?php  




        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tbody>
          <tr class="odd gradeX" >
         <td> <?php echo $i; $i++ ;?>
         <td><?php echo $row['Medicine'];?></td>
         <td><?php echo $row['Category'];?></td> 
         <td><?php echo $row['description'];?></td> 
         <td><?php echo $row['price'];?></td> 
         <td><?php echo $row['Manufactured_By'];?></td>
         <td><a class="btn btn-primary" href="MedicineList.php?do=Edit&id=<?php echo $row['id'] ?>"> edit</a>
             <a class="btn btn-danger" href="MedicineList.php?do=delete&id=<?php echo $row['id'] ?>"> delete</a></td> 
        </tr>
          <?php } ?></tbody>
      </table>
       </div>
        </div>
    </div> 
    </div> 
  </div>
     <?php }else if($do == 'Edit'){

         if($_SESSION['Role'] != "Admin" AND $_SESSION['Role'] != "Pharmacist"){
              header('Location:login.php');
         }


          $id = $_GET['id'];
           $sql = $con->prepare("SELECT * FROM medicines Where id = ? ");
           $sql->execute(array($id));
           $row = $sql ->fetch();
           $count =$sql ->rowCount();

           $Medicine_Name = $row['Medicine'];
              $Category = $row['Category'];
              $price = $row['price'];
              $description = $row['description'];
              $Manufactured_By = $row['Manufactured_By'];

              if($count > 0)
           { ?> 

              <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
             
           <?php include 'files.php' ;  ?>
            <?php include 'sidebar/sidebar.php';?>

    </div>
    <div id="main">
      <?php include 'navbar/navbar.php'  ; ?>
        <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
  
           <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary btn-lg " href="MedicineList.php"> <i class="fa fa-list"></i> Medicine List </a>  
                </div>
            </div> 
    <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-10 col-sm-12"> 
            <form action="addMedicine.php?do=Edit&id=<?php echo $row['id'] ?>" method="POST" class="form-horizontal" >

              <div class="form-group row">
              <label  class="control-label col-sm-2">Medicine Name <i class="text-danger">*</i></label>
                <div class="col-sm-10">
              <input type="text" name="Medicine_Name" placeholder="Medicine Name" value="<?php echo $Medicine_Name ?>" class="form-control">
              </div>
            </div> 

                 <div class="form-group row">
              <label  class="control-label col-sm-2">Category Name <i class="text-danger">*</i></label>
                <div class="col-sm-10">
               <select name="Category" class="form-control" >
                <option value="" selected="selected">Select Option</option>
                <?php
                $stmt = $con  ->prepare("SELECT Category FROM medicinecategory ");
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
              <label  class="control-label col-sm-2"> Description <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                  <textarea name="description" placeholder="description" class="form-control" > <?php echo $description ?> </textarea>
                    </div>
            </div> 

                   <div class="form-group row">
              <label  class="control-label col-sm-2">price <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                  <input type="text" name="price" placeholder="price" value="<?php echo $price ?>" class="form-control">
                    </div>
            </div> 
                  
                  <div class="form-group row">
              <label  class="control-label col-sm-2">Manufactured By <i class="text-danger">*</i></label>
                <div class="col-sm-10">

                  <input type="text" name="Manufactured_By" placeholder="Manufactured By" value="<?php echo $Manufactured_By ?>" class="form-control">
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

                      if($_SESSION['Role'] != "Admin" AND $_SESSION['Role'] != "Pharmacist"){
              header('Location:login.php');
              exit();
         }

                       $id = $_GET['id'];
                      $stmt = $con ->prepare(" DELETE FROM medicines WHERE id=? ");
                      $stmt ->execute(array($id));

                      header('Location: MedicineList.php?do=" " ');


                } 


