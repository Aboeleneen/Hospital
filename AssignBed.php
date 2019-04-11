<?php


include 'contact.php' ; 

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$patient_name = $_POST['patient_name'];
	$type = $_POST['type'];
	$Assign_Date = $_POST['AssignDate'];
	$Discharge_Date = $_POST['DischargeDate'];
	$Description = $_POST['Description'];

	$sql = "INSERT INTO BedsList(patient,type,Assign_Date,Discharge_Date,Description) VALUES ('$patient_name','$type','$Assign_Date','$Discharge_Date','$Description')" ;

	$con ->exec($sql);

}


?>



<form action="AssignBed.php" method="POST">
	
		<select name="patient_name">
			<?php
	 	    $stmt = $con  ->prepare("SELECT fullname FROM patients ");
            $stmt ->execute();

        $array = $stmt->fetchAll(PDO::FETCH_COLUMN);

       foreach ($array as $value) {
       	echo "<option>" .$value . "</option>";
       }
         ?>
	</select>

	  <select name="type">
	  	  <?php
	 	    $stmt = $con  ->prepare("SELECT type FROM Beds ");
            $stmt ->execute();

        $array = $stmt->fetchAll(PDO::FETCH_COLUMN);

       foreach ($array as $value) {
       	echo "<option>" .$value . "</option>";
       }
         ?>
	  </select>

	  <input type="date" name="AssignDate" >
	  <input type="date" name="DischargeDate">
	  <textarea name="Description" placeholder="Description"></textarea>
	  <input type="submit" name="" value="login">
	
</form>