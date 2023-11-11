<?php
session_start();
//error_reporting(0); //sets the error reporting level to 0, no error to be displayed
include "includes/dbconnection.php"; //connect to db

// Check if the user is logged in
if (strlen($_SESSION["sturecmsaid"] == 0)) {
    header("location:logout.php");
} else {
    // Retrieve form data (inputted data)
    if (isset($_POST["submit"])) {
        $student_id   = $_POST["student_id"];
        $apmnttype    = $_POST["apmnttype"];
        $apmntStat    = $_POST["apmntStat"];
        $apmntM       = $_POST["apmntM"];
        $appointmentD = $_POST["appointmentD"];
        $appointmentT = $_POST["appointmentT"];

        // Insert the notice into the database
        $sql   = "INSERT INTO appointments(user_id,apmnttype,appointment_status,apmntMessage,appointment_date,appointment_time)values(:student_id,:apmnttype,:apmntStat,:apmntM,:appointmentD,:appointmentT)";
        $query = $dbh->prepare($sql);
        $query->bindParam(":student_id", $student_id, PDO::PARAM_STR);
        $query->bindParam(":apmnttype", $apmnttype, PDO::PARAM_STR);
        $query->bindParam(":apmntStat", $apmntStat, PDO::PARAM_STR);
        $query->bindParam(":apmntM", $apmntM, PDO::PARAM_STR);
        $query->bindParam(":appointmentD", $appointmentD, PDO::PARAM_STR);
        $query->bindParam(":appointmentT", $appointmentT, PDO::PARAM_STR);
        $query->execute();
        $LastInsertId = $dbh->lastInsertId();

        // Check if the notice was successfully added
        if ($LastInsertId > 0) {
            echo '<script>alert("Notice has been added.")</script>';
            echo "<script>window.location.href ='schedule-appointment.php'</script>";

            //else display
        } else {
            echo '<script>alert("Something Went Wrong. Please try again")</script>';
        }
    } ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>GCMS-MCC | Add Appointment</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/logo-mcc.png">
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php include_once "includes/header.php"; ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include_once "includes/sidebar.php"; ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Add Appointment </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Add Notice</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">

                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title" style="text-align: center;">Add Appointment</h4>

                                    <form class="forms-sample" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label for="apmnttype">Appointment Type:</label>
                                            <!-- <input type="text" name="nottitle" value="" class="form-control" required='true'> -->
                                            <select name="apmnttype" class="form-control" id="apmnttype">
                                                <option value="">Select Appointment Type</option>
                                                <option value="Counseling">Guidance</option>
                                                <option value="Counseling">Counseling</option>
                                                <option value="Testing">Testing</option>
                                                <option value="Refferal">Refferal</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status:</label>
                                            <select name="apmntStat" id="status" class="form-control">
                                                <option value="">Appointment Status</option>
                                                <option value="Pending">Pending</option>
                                                <option value="In Progress">In Progress</option>
                                                <option value="Completed">Completed</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <!-- label for the dropdown list -->
                                            <label for="exampleInputEmail3">Notice For:</label>
                                            <!-- select element for choosing the class ID -->
                                            <select name="student_id" id="mySelect" class="form-control"
                                                required="true">
                                                <option value="">-- Select Student --</option>

                                                <?php
                                                    // SQL query to select students with their corresponding class names
                                                    $studentQuery = "SELECT tblstudent.StuID, tblstudent.FirstName, tblstudent.LastName, tblclass.ClassName FROM tblstudent
                                                                        JOIN tblclass ON tblstudent.StudentClass = tblclass.ID";
                                                    $studentStmt  = $dbh->prepare($studentQuery);
                                                    $studentStmt->execute();

                                                    $currentCourse = null;

                                                    while ($studentRow = $studentStmt->fetch(PDO::FETCH_ASSOC)) {
                                                        // Check if the course has changed, and if so, create a new optgroup
                                                        if ($studentRow['ClassName'] != $currentCourse) {
                                                            if ($currentCourse !== null) {
                                                                echo '</optgroup>';
                                                            }
                                                            $currentCourse = $studentRow['ClassName'];
                                                            echo '<optgroup label="' . htmlentities($studentRow['ClassName']) . '">';
                                                        }
                                                        ?>
                                                <option value="<?php echo htmlentities($studentRow['StuID']); ?>">
                                                    <?php echo htmlentities($studentRow['FirstName'] . ' ' . $studentRow['LastName'] . ' -- ID:' . $studentRow['StuID']); ?>
                                                </option>
                                                <?php
                                                    }
                                                    // Close the last optgroup
                                                    if ($currentCourse !== null) {
                                                        echo '</optgroup>';
                                                    }
                                                    ?>
                                            </select>

                                            <style>
                                            /* Style for date input */
                                            input[type="date"],
                                            input[type="time"] {
                                                padding: 1.5em 1em;
                                                margin: 5px 4px;
                                                border: 1px solid #ccc;
                                                border-radius: 4px;
                                                height: 30px;
                                                width: 100%;
                                                /* Adjust the width as needed */
                                            }
                                            </style>
                                        </div>
                                        <div class="appointmentDate">
                                            <label for="date">Date:</label>
                                            <br>
                                            <input type="date" id="date" name="appointmentD" required="true">

                                        </div>
                                        <div class="appointmentTime">
                                            <label for="time">Time:</label>
                                            <br>
                                            <input type="time" id="time" name="appointmentT" required>
                                            <br>
                                            <br>
                                        </div>
                                        <style>
                                        .text-area-resize {
                                            resize: vertical;
                                            height: 100px;
                                            width: 100%;
                                            padding: 1em;

                                        }
                                        </style>
                                        <div class="form-group">
                                            <label for="exampleInputName3">Appointment Message</label>
                                            <textarea class="text-area-resize" name="apmntM" class="form-control"
                                                required='true'></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary mr-2" name="submit">Add</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <?php include_once "includes/footer.php"; ?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
    $("#mySelect").select2({
        placeholder: "Select Student",
        allowClear: true
    });
    $("#status").select2({
        placeholder: "Appointment Status",
        allowClear: true
    });
    $("#apmnttype").select2({
        placeholder: "Appointment Type",
        allowClear: true
    });
    </script>

</body>

</html>
<?php
} ?>