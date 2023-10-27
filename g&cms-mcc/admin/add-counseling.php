<?php
//start sesscion
session_start();
//error_reporting(0); //sets the error reporting level to 0, no error to be displayed
include "includes/dbconnection.php"; //connect to db
if (strlen($_SESSION["sturecmsaid"] == 0)) {
  header("location:logout.php");
} else {
  if (isset($_POST["submit"])) {
    $studentname        = $_POST["studentname"];
    $reason             = $_POST["reason"];
    $counselingdate     = $_POST["counselingdate"];
    $notes              = $_POST["notes"];
    $commitment_insight = $_POST["commitment_insight"];
    $sql                =
      "insert into tblcounseling(StudentName,CounselingReason,CounselingDate, CounselingNotes, PupilCommitment)values(:studentname,:reason,:counselingdate,:notes,:commitment_insight)";
    $query              = $dbh->prepare($sql);
    $query->bindParam(":studentname", $studentname, PDO::PARAM_STR);
    $query->bindParam(":reason", $reason, PDO::PARAM_STR);
    $query->bindParam(":counselingdate", $counselingdate, PDO::PARAM_STR);
    $query->bindParam(":notes", $notes, PDO::PARAM_STR);
    $query->bindParam(":commitment_insight", $notes, PDO::PARAM_STR);
    $query->execute();
    $LastInsertId = $dbh->lastInsertId();
    if ($LastInsertId > 0) {
      echo '<script>alert("Notice has been added.")</script>';
      echo "<script>window.location.href ='add-notice.php'</script>";
    } else {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
  } ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <title>GCMS-MCC | Counseling</title>
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
    <link rel="stylesheet" href="css/style.css" />

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
              <h3 class="page-title">Add Notice </h3>
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
                    <h4 class="card-title" style="text-align: center;">Counseling Sheet</h4>
                    <!-- form -->
                    <form method="post">
                      <div class="form-group">
                        <label for="exampleInputEmail3">Student Name</label>
                        <select name="stuclass" class="form-control" required='true'>
                          <option value="">Select Student</option>
                          <?php
                          $sql2   = "SELECT * from    tblstudent";
                          $query2 = $dbh->prepare($sql2);
                          $query2->execute();
                          $result2 = $query2->fetchAll(PDO::FETCH_OBJ);

                          foreach ($result2 as $row1) { ?>
                            <option value="<?php echo htmlentities($row1->ID); ?>">
                              <?php echo htmlentities(
                                $row1->StudentName,
                              ); ?>
                              <?php echo htmlentities($row1->StudentClass); ?>
                            </option>
                          <?php }
                          ?>
                        </select>
                      </div>
                      <input type="text" class="form-control" placeholder="Reason for Counseling"
                        name="counseling-reason">
                      <br>
                      <input type="text" class="form-control" placeholder="Counseling Date" name="counseling-date">
                      <hr>
                      <textarea class="form-control rounded-0" rows="3" placeholder="Counseling Notes"
                        name="counseling-notes"></textarea>
                      <br>
                      <textarea class="form-control rounded-0" rows="3" placeholder="Pupil's Commitment/Insights"
                        name="commitment_insight"></textarea>
                      <br> <button class="btn btn-info btn-block" type="submit" name="submit">Submit</button>
                    </form>
                    <!-- end form -->
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
  </body>

  </html>
  <?php
} ?>