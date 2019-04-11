<?php

  $dsn ='mysql:host=localhost;dbname=Hospital' ;
  $user = 'root' ;
  $pass = '';
  $options =array(
     PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' 

  );
  try {
  	$con=new PDO($dsn,$user,$pass,$options);
  
     $con->setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 



  } catch (PDOException $e) {

  	echo 'Failed' . $e->getmessage();
  	
  }


?>

 
    


   