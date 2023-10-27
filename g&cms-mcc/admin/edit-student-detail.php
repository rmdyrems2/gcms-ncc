<?php
session_start();
error_reporting(0);
include "includes/dbconnection.php";
if (strlen($_SESSION["sturecmsaid"] == 0)) {
  header("location:logout.php");
} else {
  if (isset($_POST["submit"])) {
    $firstname  = $_POST["firstname"];
    $middlename = $_POST["middlename"];
    $lastname   = $_POST["lastname"];
    $stuemail   = $_POST["stuemail"];
    $stuclass   = $_POST["stuclass"];
    $gender     = $_POST["gender"];
    $dob        = $_POST["dob"];
    $stuid      = $_POST["stuid"];
    $fname      = $_POST["fname"];
    $mname      = $_POST["mname"];
    $connum     = $_POST["connum"];
    $altconnum  = $_POST["altconnum"];
    $address    = $_POST["address"];
    $eid        = $_GET["editid"];
    $sql        =
      "update tblstudent set FirstName=:firstname,MiddleName=:middlename,LastName=:lastname,StudentEmail=:stuemail,StudentClass=:stuclass,Gender=:gender,DOB=:dob,StuID=:stuid,FatherName=:fname,MotherName=:mname,ContactNumber=:connum,AltenateNumber=:altconnum,Address=:address where ID=:eid";
    $query      = $dbh->prepare($sql);
    $query->bindParam(":firstname", $firstname, PDO::PARAM_STR);
    $query->bindParam(":middlename", $middlename, PDO::PARAM_STR);
    $query->bindParam(":lastname", $lastname, PDO::PARAM_STR);
    $query->bindParam(":stuemail", $stuemail, PDO::PARAM_STR);
    $query->bindParam(":stuclass", $stuclass, PDO::PARAM_STR);
    $query->bindParam(":gender", $gender, PDO::PARAM_STR);
    $query->bindParam(":dob", $dob, PDO::PARAM_STR);
    $query->bindParam(":stuid", $stuid, PDO::PARAM_STR);
    $query->bindParam(":fname", $fname, PDO::PARAM_STR);
    $query->bindParam(":mname", $mname, PDO::PARAM_STR);
    $query->bindParam(":connum", $connum, PDO::PARAM_STR);
    $query->bindParam(":altconnum", $altconnum, PDO::PARAM_STR);
    $query->bindParam(":address", $address, PDO::PARAM_STR);
    $query->bindParam(":eid", $eid, PDO::PARAM_STR);
    $query->execute();
    echo '<script>alert("Student has been updated")</script>';
  } ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <title>MCC - GCMS| Update Students</title>
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
              <h3 class="page-title"> Update Students </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Update Students</li>
                </ol>
              </nav>
            </div>
            <div class="row">

              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <center> <img src="../images/data-sheet-mcc.png" alt="data-sheet-mcc" width="700px"></center>

                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                      <?php
                      $eid   = $_GET["editid"];
                      $sql   =
                        "SELECT tblstudent.FirstName,tblstudent.MiddleName,tblstudent.LastName,tblstudent.StudentEmail,tblstudent.StudentClass,tblstudent.Gender,tblstudent.DOB,tblstudent.StuID,tblstudent.FatherName,tblstudent.MotherName,tblstudent.ContactNumber,tblstudent.AltenateNumber,tblstudent.Address,tblstudent.UserName,tblstudent.Password,tblstudent.Image,tblstudent.DateofAdmission,tblclass.ClassName,tblclass.Section from tblstudent join tblclass on tblclass.ID=tblstudent.StudentClass where tblstudent.ID=:eid";
                      $query = $dbh->prepare($sql);
                      $query->bindParam(":eid", $eid, PDO::PARAM_STR);
                      $query->execute();
                      $results = $query->fetchAll(PDO::FETCH_OBJ);
                      $cnt     = 1;
                      if ($query->rowCount() > 0) {
                        foreach ($results as $row) { ?>
                          <div class="form-group">
                            <label for="exampleInputName1">Student Photo</label> <br>
                            <img src="images/<?php echo $row->Image; ?>" width="100" height="100"
                              value="<?php echo $row->Image; ?>"><br><a href="changeimage.php?editid=<?php echo $row->ID; ?>">
                              &nbsp; Edit Image</a>
                          </div>
                          <br>
                          <div class="form-group">
                            <label for="exampleInputName1">Student's Full Name</label>
                            <input type="text" name="stuname" value="<?php echo htmlentities(
                              $row->FirstName .
                              " " .
                              $row->MiddleName[0] . "." .
                              " " .
                              $row->LastName
                            ); ?>" class="form-control" readonly='true'>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputName1">First Name</label>
                            <input type="text" name="firstname" value="<?php echo htmlentities(
                              $row->FirstName,
                            ); ?>" class="form-control" required='true'>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Middle Name</label>
                            <input type="text" name="middlename" value="<?php echo htmlentities(
                              $row->MiddleName,
                            ); ?>" class="form-control" required='true'>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Last Name</label>
                            <input type="text" name="lastname" value="<?php echo htmlentities(
                              $row->LastName,
                            ); ?>" class="form-control" required='true'>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Student Email</label>
                            <input type="text" name="stuemail" value="<?php echo htmlentities(
                              $row->StudentEmail,
                            ); ?>" class="form-control" required='true'>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail3">Student Class</label>
                            <select name="stuclass" class="form-control" required='true'>
                              <option value="<?php echo htmlentities(
                                $row->StudentClass,
                              ); ?>">
                                <?php echo htmlentities($row->ClassName); ?>
                                <?php echo htmlentities($row->Section); ?>
                              </option>
                              <?php
                              $sql2   = "SELECT * from    tblclass ";
                              $query2 = $dbh->prepare($sql2);
                              $query2->execute();
                              $result2 = $query2->fetchAll(PDO::FETCH_OBJ);

                              foreach ($result2 as $row1) { ?>
                                <option value="<?php
                                echo htmlentities($row1->ClassName);
                                echo htmlentities($row1->Section);
                                ?>">
                                  <?php echo htmlentities($row1->ClassName); ?>
                                  <?php echo htmlentities($row1->Section); ?>
                                </option>
                              <?php }
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Gender</label>
                            <select name="gender" value="" class="form-control" required='true'>
                              <option value="<?php echo htmlentities(
                                $row->Gender,
                              ); ?>">
                                <?php echo htmlentities($row->Gender); ?>
                              </option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Date of Birth</label>
                            <input type="date" name="dob" value="<?php echo htmlentities(
                              $row->DOB,
                            ); ?>" class="form-control" required='true'>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputName1">Student ID</label>
                            <input type="text" name="stuid" value="<?php echo htmlentities(
                              $row->StuID,
                            ); ?>" class="form-control" readonly='true'>
                          </div>

                          <h3>Parents/Guardian's details</h3>
                          <div class="form-group">
                            <label for="exampleInputName1">Father's Name</label>
                            <input type="text" name="fname" value="<?php echo htmlentities(
                              $row->FatherName,
                            ); ?>" class="form-control" required='true'>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Mother's Name</label>
                            <input type="text" name="mname" value="<?php echo htmlentities(
                              $row->MotherName,
                            ); ?>" class="form-control" required='true'>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Contact Number</label>
                            <input type="text" name="connum" value="<?php echo htmlentities(
                              $row->ContactNumber,
                            ); ?>" class="form-control" required='true' maxlength="12" pattern="[0-9]+">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Alternate Contact Number</label>
                            <input type="text" name="altconnum" value="<?php echo htmlentities(
                              $row->AltenateNumber,
                            ); ?>" class="form-control" required='true' maxlength="12" pattern="[0-9]+">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Address</label>
                            <textarea name="address" class="form-control" required='true'><?php echo htmlentities(
                              $row->Address,
                            ); ?></textarea>
                          </div>
                          <h3>Login details</h3>
                          <div class="form-group">
                            <label for="exampleInputName1">User Name</label>
                            <input type="text" name="uname" value="<?php echo htmlentities(
                              $row->UserName,
                            ); ?>" class="form-control" readonly='true'>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Password</label>
                            <input type="Password" name="password" value="<?php echo htmlentities(
                              $row->Password,
                            ); ?>" class="form-control" readonly='true'>
                          </div>
                          <?php $cnt = $cnt + 1;
                        }
                      }
                      ?>
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Update</button>

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
  </body>

  </html>
  <?php
} ?>