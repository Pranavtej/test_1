<?php

include 'connect.php';

session_start();
$subject_id = $_GET['suid'];
$student_id = $_SESSION['STUDENT_ID'];
$school_id  = $_SESSION['SCHOOL_ID'];
$class_id = $_SESSION['CLASS_ID'];

$sql = mysqli_query($con ,"SELECT lo.loc as locs, loc.credits as credits FROM `learning_outcomes_credits` loc , `learning_outcomes` lo where loc.class_id='$class_id' AND loc.school_id='$school_id' and loc.student_id='$student_id' and loc.subject_id='$subject_id' and loc.loc_id = lo.loc_id")

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Preskool - Subjects</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" href="assets/img/favicon.png">
	
		<!-- Fontfamily -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&display=swap">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

		<!-- Datatables CSS -->
		<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
		
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<?php include 'student-menu.php'; ?>
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Deatailed Learning outcomes view</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="teacher-classteacher-dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active"></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
				
					<div class="row">
						<div class="col-sm-12">
						
							<div class="card card-table">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>S. No.</th>
													<th>Learning Outcome</th>
													<th>percentage</th>
												</tr>
											</thead>
											<tbody>
                                                <?php
													$i = 0;
													while($run1 = mysqli_fetch_assoc($sql))
													{
														echo '<tr>
															<td>'.++$i.'</td>
															<td>'.$run1['locs'].'</td>
															<td>'.$run1['credits'].'</td>
														</tr>';
													}
                                                ?>
                                            </tbody>
										</table>
									</div>
								</div>
							</div>							
						</div>					
					</div>					
				</div>

				<!-- Footer -->
				<!-- <footer>
					<p>Copyright © 2020 Dreamguys.</p>					
				</footer> -->
				<!-- /Footer -->
				
			</div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.6.0.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

		<!-- Datatables JS -->
		<script src="assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
    </body>
</html>