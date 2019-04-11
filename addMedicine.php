<?php
//
   session_start();
   if($_SESSION['Role'] != "Admin" AND $_SESSION['Role'] != "Pharmacist"){
              header('Location:login.php');
         }
  include 'contact.php' ;
   include 'files.php' ;

if($_SERVER['REQUEST_METHOD'] == "POST"){
  $Medicine_Name = $_POST['Medicine_Name'];
  $Category = $_POST['Category'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  $Manufactured_By = $_POST['Manufactured_By'];
   
   if( ! isset($_GET['do'])){
        $sql = "INSERT INTO Medicines(Medicine,Category,description,price,Manufactured_By) VALUES ('$Medicine_Name','$Category','$description','$price','$Manufactured_By')";
        $con ->exec($sql);
        header('Location: MedicineList.php?do=" " ');
      }

       else if ($_GET['do'] == 'Edit')
    {

           $id = $_GET['id'];
           $stmt = $con ->prepare("UPDATE Medicines SET Medicine = ?,Category = ?,description = ?,price = ?,Manufactured_By = ? WHERE id = ? ");
           $stmt ->execute(array($Medicine_Name,$Category,$description,$price,$Manufactured_By,$id));
           header('Location: MedicineList.php?do=" " ');
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
      <?php include 'sidebar/sidebar.php' ; ?>
    </div> 
    <div id="main">
 
   <?php include 'navbar/navbar.php' ; ?> 

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

          <form action="addMedicine.php" method="POST" class="form-horizontal" >
   <div class="form-group row">
              <label  class="control-label col-sm-2">Medicine Name <i class="text-danger">*</i></label>
                <div class="col-sm-10">
              <input type="text" name="Medicine_Name" placeholder="Medicine Name" class="form-control" required="">
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
                  <textarea name="description" placeholder="description" class="form-control" required="" >  </textarea>
                    </div>
            </div> 

                   <div class="form-group row">
              <label  class="control-label col-sm-2">price <i class="text-danger">*</i></label>
                <div class="col-sm-10">
                  <input type="text" name="price" placeholder="price"  class="form-control" required="">
                    </div>
            </div> 
                  
                  <div class="form-group row">
              <label  class="control-label col-sm-2">Manufactured By <i class="text-danger">*</i></label>
                <div class="col-sm-10">

                  <input type="text" name="Manufactured_By" placeholder="Manufactured By"  class="form-control" required="">
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