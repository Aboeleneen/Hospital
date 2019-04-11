<?php
 session_start();
  if( ! isset($_SESSION['username'])){
              header('Location:login.php');
  }
?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <style>
     /* width */
::-webkit-scrollbar {
    width: 20px;
}

/* Track */
::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey; 
    border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
    background: red; 
    border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #b30000; 
}
   </style>
</head>
<body>
      <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
             
           <?php include 'files.php' ; ?>
            <?php include 'sidebar/sidebar.php' ; ?>
            <?php include 'contact.php' ; ?>

      </div>
      
       <div id="main" class="main">
       	         <?php include 'navbar/navbar.php'; ?>
       	         
       	         <!-- NOTICE DASHBOARD -->





      <?php if($_SESSION['Role'] != "patient" ) { ?>

       <div class="col-sm-12">
        <div class="panel panel-default thumbnail">

            <div class="panel-heading">
                <h3>Noticeboard</h3>
            </div>

            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>SL.NO</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Assign By</th>
                           
                        </tr>
                    </thead>
                     <?php  
                      global $i; 
       $i = 1 ;
     
        $sql = $con->prepare("SELECT * FROM notices ");
        $sql->execute();

                     while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tbody>
             <tr class="odd gradeX" >
         <td> <?php echo $i; $i++ ;?>
         <td><?php echo $row['title'];?></td>
         <td><?php echo $row['description'];?></td> 
         <td><?php echo $row['start_date'];?></td> 
         <td><?php echo $row['end_date'];?></td>
         <td>Admin </td>
         
        </tr>
         <?php } ?></tbody>
                </table>  <!-- /.table-responsive -->
            </div>
        </div>
    </diV>  <!-- END OF NOTICE DASHBOARD -->


 <?php if($_SESSION['Role'] == "Admin" ) { ?>
      <div class="col-sm-12">
        <div class="panel panel-default thumbnail">

            <div class="panel-heading">
                <h3>Inbox</h3>
            </div>

            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>SL.NO</th>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Message</th>
                            <th>Action</th> 
                        </tr>
                    </thead>
                     <?php  
                      global $i; 
       $i = 1 ;
     
        $sql = $con->prepare("SELECT * FROM messages ");
        $sql->execute();

                     while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tbody>
             <tr class="odd gradeX" >
         <td> <?php echo $i; $i++ ;?>
         <td><?php echo $row['name'];?></td>
         <td><?php echo $row['email'];?></td> 
         <td><?php echo $row['message'];?></td> 
          <td>
               <a class="btn btn-danger" href="web.php?do=delete&id=<?php echo $row['id'] ?>"> delete</a></td> 
        </tr>
         <?php } ?></tbody>
                </table>  <!-- /.table-responsive -->
            </div>
        </div>
    </diV>  <?php } ?>

    <?php } ?>
          
       	         
       	</div>
          

     
  
</body>
</html>