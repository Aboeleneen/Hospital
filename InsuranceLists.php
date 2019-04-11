     <?php 
            session_start();

     ?>
     
    <!-- sidebar area -->
   
   

    <!-- end sidebar area -->
      
 <?php  
   
   $do = isset($_GET['do']) ? $_GET['do'] : 'manage' ;
    include 'contact.php' ;
    if($do != 'Edit' and $do !='delete'){



    global $i;

     $i = 1 ;

      $sql = $con->prepare("SELECT * FROM insurances ");
        $sql->execute();
             ?>
  
       
   
                <!--  table area -->
                 <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
             
           <?php include 'files.php' ?>
            <?php include 'sidebar/sidebar.php' ; ?>

    </div>

                <div id="main">
                  <?php include 'navbar/navbar.php' ; ?>
                <div class="col-sm-12">
                    <div  class="panel panel-default thumbnail">
             
                        <div class="panel-heading no-print">
                            <div class="btn-group" style="position: relative;"> 
                                <a class="btn btn-success btn-lg" href="addInsurance.php"> <i class="fa fa-plus"></i>  Add Insurance  </a>  
                               
                            </div>
                        </div> 

                <div class="panel-body">
                    <div  class="table-responsive ">
                           <table class="datatable table table-striped table-bordered"  cellspacing="0" width="100%">
                             <h1 class="btn btn-success btn-block btn-lg" >Insurance List </h1>
                            <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Insurance Name </th>
                                        <th>Service Tax</th>
                                        <th>Remark</th>
                                        <th>Insurance NO.</th>
                                        <th>Insurance Code</th> 
                                        <th>Hospital Rate </th> 
                                        <th>Insurance Rate</th> 
                                        <th>Total</th>
                                         <th>Action</th>
                                    </tr>
                                </thead>
             
               <?php   



        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        ?>
         <tr>
         <td> <?php echo $i; $i++ ;?>
          <td><?php echo $row['insurance'];?></td>
         <td><?php echo $row['service'];?></td> 
         <td><?php echo $row['Remark'];?></td> 
         <td><?php echo $row['insurance_no'];?></td>
           <td><?php echo $row['insurance_code'];?></td>
             <td><?php echo $row['hospital_rate'];?></td>
             <td><?php echo $row['insurane_rate'];?></td>
             <td><?php echo $row['total'];?></td> 
             <td><a class="btn btn-primary" href="InsuranceLists.php?do=Edit&id=<?php echo $row['id'] ?>"> edit</a> 
                 <a class="btn btn-danger" href="InsuranceLists.php?do=delete&id=<?php echo $row['id'] ?>"> delete</a></td>

        </tr>
        
              <?php } ?></tbody>
            </table>
             </div>
              </div>
          </div> 
          </div> 
        </div>
     <?php  }else if($do == 'Edit'){ 
      if($_SESSION['Role'] != "Admin" AND $_SESSION['Role'] != "Accountant"){
              header('Location:login.php');
         }
          $id = $_GET['id'];
           $sql = $con->prepare("SELECT * FROM insurances Where id = ? ");
           $sql->execute(array($id));
           $row = $sql ->fetch();
           $count =$sql ->rowCount();

           $insurance = $row['insurance'];
            $service = $row['service'];
            $discout = $row['discout'];
            $remark = $row['Remark'];
            $insurance_no =$row['insurance_no'];
            $insurance_code = $row['insurance_code'];
            $disease_name = $row['disease_name'];
            $disease_charge =$row['disease_charge'];
            $hospital_rate = $row['hospital_rate'];
            $insurane_rate = $row['insurane_rate'];
            $total =$row['total'];

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
                              <a class="btn btn-primary btn-lg " href="InsuranceLists.php"> <i class="fa fa-list"></i>  Insurance List </a>  
                          </div>
                      </div> 
              <div class="panel-body panel-form">
                          <div class="row">
                              <div class="col-md-10 col-sm-12">
 


            <form action="addInsurance.php?do=Edit&id=<?php echo $row['id'] ?>" method="POST" class="form-horizontal" >

             <div class="form-group row">
              <label  class="control-label col-sm-2">Insurance Name <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <input type="text" name="insurance" placeholder="insurance name" value="<?php echo $insurance ?> " class="form-control"> 
               </div>
            </div>

             <div class="form-group row">
              <label  class="control-label col-sm-2">Service Tax <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <input type="text" name="service" placeholder="service tax" value="<?php echo $service ?> " class="form-control" > 
                </div>
            </div>
              
            <div class="form-group row">
              <label  class="control-label col-sm-2">Discount <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <input type="text" name="discout" placeholder="discout" value="<?php echo $discout ?> " class="form-control" > 
                </div>
            </div>

            <div class="form-group row">
              <label  class="control-label col-sm-2">Remark <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <textarea name="remark" placeholder="Remark"  class="tinymce form-control" ><?php echo $remark ?> </textarea>  
               </div>
            </div>

             <div class="form-group row">
              <label  class="control-label col-sm-2">Insurance No. <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <input type="text" name="insurance_no" placeholder="insurance NO" value="<?php echo $insurance_no ?> "  class="form-control"> 
                 </div>
            </div>
            <div class="form-group row">
              <label  class="control-label col-sm-2">Insurance Code <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <input type="text" name="insurance_code" placeholder="insurance Code" value="<?php echo $insurance_code ?> " class="form-control" > 
               </div>
            </div>
                  
             <div class="form-group row">
              <label  class="control-label col-sm-2">Disease Charge <i class="text-danger">*</i></label>
                <div class="col-sm-5">
                     <input type="text" name="disease_name" placeholder="Disease name" value="<?php echo $disease_name ?> "  class="form-control" >
              </div>
               <div class="col-sm-5">
                <input type="text" name="disease_charge" placeholder="Disease Charge" value="<?php echo $disease_charge ?> "  class="form-control"> 
                </div>
            </div>

            <div class="form-group row">
              <label  class="control-label col-sm-2">Hospital Rate <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <input type="text" name="hospital_rate" placeholder="Hospital rate" value="<?php echo $hospital_rate ?> "  class="form-control" >  
              </div>
            </div> 
            <div class="form-group row">
              <label  class="control-label col-sm-2">Insurance Rate <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <input type="text" name="insurane_rate" placeholder="insurance rate" value="<?php echo $insurane_rate ?> "  class="form-control" >  
               </div>
            </div> 
            <div class="form-group row">
              <label  class="control-label col-sm-2">Total <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                <input type="text" name="total" placeholder="Total" value="<?php echo $total ?> "  class="form-control" > 
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
              $stmt = $con ->prepare(" DELETE FROM insurances WHERE id=? ");
              $stmt ->execute(array($id));

              header('Location: InsuranceLists.php?do=" " ');


        } 


