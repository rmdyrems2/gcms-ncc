<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
if (strlen($_SESSION["sturecmsaid"] == 0)) {
  header("location:logout.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>Student Management System | Add Notice</title>
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
    <?php include_once('includes/header.php'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include_once('includes/sidebar.php'); ?>
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
                  <h4 class="card-title" style="text-align: center;">Add Notice</h4>

                  <form class="forms-sample" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                      <label for="exampleInputName1">Notice Title</label>
                      <select name="nottitle" class="form-control">
                        <option value="#">Select Type</option>
                        <option value="Guidance">Guidance</option>
                        <option value="Counseling">Counseling</option>
                        <option value="Testing">Testing</option>
                        <option value="Refferal">Refferal</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Student</label>
                      <select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" name="student">
                        <option>Select Student</option>
                        <?php
                        // Assuming you have already established a database connection
                        // include 'includes/dbconnection.php'; or however you connect to your database
                        
                        // Fetch all rows from the database
                        // Replace 'your_table_name' with the actual name of your table
                        $sql = "SELECT * FROM tblstudent";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $rows = $query->fetchAll(PDO::FETCH_ASSOC);

                        // Check if there are rows in the database
                        if (count($rows) > 0) {
                          // Use a while loop to iterate through each row and generate the options
                          while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $row['FirstName'] . '">' . $row['MiddleName'] . ' - ' . $row['LastName'] . '</option>';
                            // Add more columns or customize the display as needed
                          }
                        } else {
                          echo '<option value="">No rows found</option>';
                        }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Notice Message</label>
                      <textarea name="notmsg" value="" class="form-control" required='true'></textarea>
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