<?php
session_start();
// error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $eid          = $_GET["editid"]; // Get the appointment ID from the URL
        $apmnttype    = $_POST["apmnttype"];
        $apmntStat    = $_POST["status"]; // Corrected name attribute
        $apmntM       = $_POST["apmntM"];
        $appointmentD = $_POST["appointmentD"];
        $appointmentT = $_POST["appointmentT"];
        $sql          = "UPDATE appointments SET apmnttype=:apmnttype, appointment_status=:apmntStat, apmntMessage=:apmntM, appointment_date=:appointmentD, appointment_time=:appointmentT WHERE id=:eid";
        $query        = $dbh->prepare($sql);
        $query->bindParam(":apmnttype", $apmnttype, PDO::PARAM_STR);
        $query->bindParam(":apmntStat", $apmntStat, PDO::PARAM_STR);
        $query->bindParam(":apmntM", $apmntM, PDO::PARAM_STR);
        $query->bindParam(":appointmentD", $appointmentD, PDO::PARAM_STR);
        $query->bindParam(":appointmentT", $appointmentT, PDO::PARAM_STR);
        $query->bindParam(":eid", $eid, PDO::PARAM_INT); // Bind the appointment ID
        $query->execute();
        echo '<script>alert("Appointment has been updated")</script>';
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Student Management System | Update Appointment</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="vendors/select2/select2.min.css">
        <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="icon" type="image/png" sizes="16x16" href="../images/logo-mcc.png">
        <link rel="stylesheet" href="css/style.css" />
        <!-- date libraries -->
    </head>

    <body>
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            <?php include_once('includes/header.php'); ?>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_sidebar.html -->
                <?php include_once('includes/sidebar.php'); ?>
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="page-header">
                            <h3 class="page-title">Update Appointment </h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Update Appointment</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title" style="text-align: center;">Update Appointment</h4>
                                        <form class="forms-sample" method="post" enctype="multipart/form-data">
                                            <?php
                                            $eid   = $_GET['editid'];
                                            $sql   = "SELECT apmnttype, appointment_status, apmntMessage, appointment_date, appointment_time, id as nid FROM appointments WHERE id=:eid";
                                            $query = $dbh->prepare($sql);
                                            $query->bindParam(":eid", $eid, PDO::PARAM_STR);
                                            $query->execute();
                                            $row = $query->fetch(PDO::FETCH_OBJ);
                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                ?>
                                                <div class="form-group">
                                                    <label for="apmnttype">Appointment Type:</label>
                                                    <select name="apmnttype" class="form-control" id="apmnttype" disabled>
                                                        <option value="">
                                                            <?php echo $row->apmnttype; ?>
                                                        </option>
                                                        <option value="Guidance">Guidance</option>
                                                        <option value="Counseling">Counseling</option>
                                                        <option value="Testing">Testing</option>
                                                        <option value="Referral">Referral</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Status:</label>
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="">
                                                            <?php echo $row->appointment_status; ?>
                                                        </option>
                                                        <option value="Pending"> Pending</option>
                                                        <option value="In Progress">In Progress</option>
                                                        <option value="Completed">Completed</option>
                                                    </select>
                                                </div>
                                                <?php
                                                // SQL query to select all records from the tblstudent table
                                                $sql2   = "SELECT * from tblstudent";
                                                $query2 = $dbh->prepare($sql2);
                                                $query2->execute();
                                                $result2 = $query2->fetchAll(PDO::FETCH_OBJ);
                                                ?>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail3">Notice For:</label>
                                                    <select name="student_id" class="form-control" required='true' disabled>
                                                        <?php
                                                        // Loop over each record and create an option element with the student's name and ID
                                                        foreach ($result2 as $row1) {
                                                            $studentName = htmlentities($row1->FirstName . ' ' . $row1->LastName);
                                                            $studentID   = htmlentities($row1->StuID);
                                                            $selected    = ($studentID === $appointmentStudentID) ? 'selected' : '';
                                                            ?>
                                                            <option value="<?php echo $studentID; ?>">
                                                                <?php echo $studentName . ' --ID: ' . $studentID; ?>
                                                            </option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="appointmentDate">
                                                    <label for="date">Date:</label>
                                                    <br>
                                                    <input type="date" id="date" name="appointmentD" readonly="true"
                                                        value="<?php echo $row->appointment_date; ?>">
                                                </div>
                                                <div class="appointmentTime">
                                                    <label for="time">Time:</label>
                                                    <br>
                                                    <input type="time" id="time" name="appointmentT" readonly="true"
                                                        value="<?php echo $row->appointment_time; ?>">
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputName3">Appointment Message</label>
                                                    <textarea class="text-area-resize form-control" name="apmntM"
                                                        readonly='true'><?php echo htmlentities($row->apmntMessage); ?></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary mr-2" name="submit">Update</button>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <?php include_once('includes/footer.php'); ?>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="vendors/select2/select2.min.js"></script>
        <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="js/off-canvas.js"></script>
        <script src="js/misc.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="js/typeahead.js"></script>
        <script src="js/select2.js"></script>
        <!-- End custom js for this page -->
    </body>

    </html>
<?php } ?>