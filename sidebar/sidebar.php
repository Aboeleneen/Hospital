<script type="text/javascript" src="js/javaScript.js"></script>
<link rel="stylesheet" type="text/css" href="side.css">
<?php 

 if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}


?>
 <ul class="list-unstyled components">
                    <li>
                        <a href="Dashboard.php"><i class="fa fa-bank"> </i> Dashboard</a>
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"><i class="fa fa-user-md"></i> <span>Doctor</span></a>
                        <ul class="collapse list-unstyled" id="homeSubmenu"> 
                            <?php   if($_SESSION['Role'] == "Admin" ){ ?>
                            <li><a href="adddoctor.php">Add Doctor</a></li> <?php } ?>
                            <li><a href="doctors.php">Doctor List</a></li>
                        </ul>
                    </li>


                    <li>
                     <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false"> <i class="fa fa-wheelchair"></i> <span>Patient</span></a>
                        <ul class="collapse list-unstyled" id="homeSubmenu2">
                            <?php   if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Receptionist" OR $_SESSION['Role'] == "Representative" OR $_SESSION['Role'] == "Doctor" ){ ?>
                            <li><a href="addpatient.php">Add Patient</a></li> <?php } ?>
                            <li><a href="patientLists.php">Patient List</a></li>
                        </ul>
                    </li>


                    <?php   if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Doctor" OR $_SESSION['Role'] == "Nurse" OR $_SESSION['Role'] == "Patient" ){ ?>
                    <li>
                    <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false"> <i class="fa fa-sitemap"></i> <span>Department</span></a>
                        <ul class="collapse list-unstyled" id="homeSubmenu3">
                             <?php   if($_SESSION['Role'] == "Admin" ){ ?>
                            <li><a href="addDepartment.php">Add Department </a></li> <?php } ?>
                            <li><a href="DepartmentList.php">Department List</a></li> 
                        </ul>
                    </li> <?php } ?>


                     <?php   if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Doctor" OR $_SESSION['Role'] == "Receptionist" OR $_SESSION['Role'] == "Representative" OR $_SESSION['Role'] == "patient"){ ?>
                    <li>
                        <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false"> <i class="fa fa-plus-square"></i> <span>Schedule</span>
</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu4">
                              <?php   if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Doctor"){ ?>
                            <li><a href="addSchedule.php">Add Schedule</a></li> <?php } ?>
                            <li><a href="ScheduleList.php">Schedule List </a></li> 
                        </ul>
                    </li> <?php } ?>

                     <?php   if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Doctor" OR $_SESSION['Role'] == "Receptionist" OR $_SESSION['Role'] == "Representative" ){ ?>
                    <li>
                        <a href="#pageSubmenu5" data-toggle="collapse" aria-expanded="false"><i class="fa fa-calendar"></i> <span>Appointment</span>
</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu5">
                              <?php   if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Doctor" OR $_SESSION['Role'] == "Receptionist" OR $_SESSION['Role'] == "Representative"  OR $_SESSION['Role'] == "Patient"){ ?>
                            <li><a href="addAppointment.php">Add Appointment</a></li> <?php } ?>
                            <li><a href="Appointments.php">Appointments list</a></li>
                        </ul>
                    </li>  <?php } ?> 
                    
                     <?php if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Patient" OR $_SESSION['Role'] == "Accountant"){ ?>
                     <li>
                        <a href="#pageSubmenu6" data-toggle="collapse" aria-expanded="false"><i class="fa fa-shield"></i> <span>Insurance </span>
</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu6">
                             <?php if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Accountant"){ ?>
                            <li><a href="addInsurance.php">Add Insurance</a></li> <?php } ?>
                            <?php if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Patient"){ ?>
                            <li><a href="InsuranceLists.php">Insurance list</a></li> <?php } ?>
                             <?php if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Accountant"){ ?>
                             <li><a href="addLimitApproval.php">Add Limit Approval</a></li> <?php } ?>
                              <?php if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Patient"){ ?>
                            <li><a href="LimitApprovalList.php">Limit Approval List</a></li> <?php } ?>
 
                        </ul>
                    </li> 
                     <li>
                        <a href="#pageSubmenu7" data-toggle="collapse" aria-expanded="false"><i class="fa fa-edit"></i> <span>Billing </span>
</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu7">
                             <?php if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Accountant"){ ?>
                            <li><a href="addService.php">Add Service</a></li><?php } ?>
                             <?php if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Patient"){ ?>
                            <li><a href="ServiceList.php">Service List</a></li><?php } ?>
                             <?php if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Accountant"){ ?>
                            <li><a href="addPackage.php">Add Package</a></li><?php } ?>
                             <?php if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Patient"){ ?>
                            <li><a href="PackageList.php">Package List</a></li><?php } ?>
                             <?php if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Accountant"){ ?>
                              <li><a href="addPatientAdmission.php">Add Patient Admission</a></li> <?php } ?>
                            <?php if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Patient"){ ?>
                            <li><a href="LimitApprovalList.php">patient admission list</a></li><?php } ?>
                             <?php if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Accountant"){ ?>
                            <li><a href="addAdvancePayment.php">Add Advance Payment</a></li><?php } ?>
                             <?php if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Patient"){ ?>
                            <li><a href="AdvancePaymentList.php">Advance Payment list</a></li><?php } ?>
                        </ul>
                    </li>  

              <?php if($_SESSION['Role'] == "Admin" ){ ?>
                      <li>
                        <a href="#pageSubmenu8" data-toggle="collapse" aria-expanded="false"><i class="fa fa-users"></i> <span>Human Resources</span>
</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu8">
                            <li><a href="addEmployee.php">Add Employee</a></li>
                            <li><a href="AccountantList.php">Accountant List</a></li>
                            <li><a href="LaboratoristList.php">Laboratorist List</a></li>
                            <li><a href="NurseList.php">Nurse List</a></li>
                            <li><a href="PharmacistList.php">Pharmacist List</a></li>
                            <li><a href="ReceptionistList.php">Receptionist List</a></li>
                            <li><a href="RepresentativeList.php">Representative List</a></li>
                            <li><a href="CaseManagerList.php">Case Manager List</a></li>
                        </ul>
                    </li> <?php } ?> <?php } ?>

                    <li>
                        <a href="#pageSubmenu9" data-toggle="collapse" aria-expanded="false"><i class="fa fa-hospital-o"></i> <span>Hospital Activities </span></a>
                        <ul class="collapse list-unstyled" id="pageSubmenu9">
                            
                            <?php  if($_SESSION['Role'] != "Pharmacist") { ?>
                             <?php   if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Doctor"){ ?>
                           
                            <li><a href="addBirthreport.php">Add Birth Report</a></li> <?php } ?>
                            <li><a href="BirthReports.php">Birth Report</a></li>
                           
                            <?php   if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Doctor"){ ?>
                            
                            <li><a href="addDeathreport.php">Add Death Report</a></li> <?php } ?>
                            <li><a href="DeathReports.php">Death Report</a></li>
                           
                            <?php   if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Doctor"){ ?>
                           
                            <li><a href="addOperationReport.php">Add Operation Report</a></li> <?php } ?>
                            <li><a href="OperationReports.php">Operation Report</a></li> 
                           
                             <?php if($_SESSION['Role'] == "Admin"){ ?>
                          
                            <li><a href="addInvestigationReport.php">Add Investigation Report</a></li> <?php } ?>
                            <li><a href="InvestigationReports.php">Investigation Report</a></li>  <?php } ?>


                            <?php if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Pharmacist" ){ ?>
                           
                            <li><a href="addMedicineCategory.php">Add Medicine Category</a></li>
                            <li><a href="MedicineCategoryList.php">Medicine Category List</a></li>
                            <li><a href="addMedicine.php">Add Medicine</a></li>
                            <li><a href="MedicineList.php">Medicine List</a></li> <?php } ?>
                        
                        </ul>
                    </li>
                    

                     <li>
                        <a href="#homeSubmenu10" data-toggle="collapse" aria-expanded="false"><i class="fa fa-bell"></i> <span>Noticeboard </span>
</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu10">
                            <?php if($_SESSION['Role'] == "Admin"){ ?>
                            <li><a href="addNotice.php">Add Notice </a></li> <?php } ?>
                            <li><a href="NoticeList.php">Notice List</a></li>
                        </ul>
                    </li>
                            
                     <?php  if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Nurse"  OR $_SESSION['Role'] == "Doctor" ) { ?>
                     <li>
                        <a href="#homeSubmenu11" data-toggle="collapse" aria-expanded="false"><i class="fa fa-bed"></i> <span>Bed Manager </span>
</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu11">
                           <?php  if($_SESSION['Role'] == "Admin") {?>
                            <li><a href="addBed.php">Add Bed </a></li> <?php } ?>
                            <li><a href="BedList.php">Bed List</a></li>
                             <?php   if($_SESSION['Role'] == "Admin" OR $_SESSION['Role'] == "Doctor"){ /*ASSIGN BED */ ?><?php } ?>
                        </ul>
                    </li>
                   <?php } ?>

 
                
 

                </ul>

 