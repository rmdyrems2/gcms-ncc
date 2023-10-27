<?php
session_start();
error_reporting(0);
ini_set('display_errors', 1);
include('includes/dbconnection.php');
// include('includes/allready-logedin.php');

if (isset($_POST['login'])) {
    $stuid    = $_POST['stuid'];
    $password = md5($_POST['password']);
    $sql      = "SELECT StuID,ID,StudentClass FROM tblstudent WHERE (UserName=:stuid || StuID=:stuid) and Password=:password";

    try {
        $query = $dbh->prepare($sql);
        $query->bindParam(':stuid', $stuid, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {
            foreach ($results as $result) {
                $_SESSION['sturecmsstuid'] = $result->StuID;
                $_SESSION['sturecmsuid']   = $result->ID;
                $_SESSION['stuclass']      = $result->StudentClass;
            }

            if (!empty($_POST["remember"])) {
                setcookie("user_login", $_POST["stuid"], time() + (10 * 365 * 24 * 60 * 60));
                setcookie("userpassword", $_POST["password"], time() + (10 * 365 * 24 * 60 * 60));
            } else {
                if (isset($_COOKIE["user_login"])) {
                    setcookie("user_login", "");
                    if (isset($_COOKIE["userpassword"])) {
                        setcookie("userpassword", "");
                    }
                }
            }
            $_SESSION['login'] = $_POST['stuid'];
            echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
        } else {
            echo "<script>alert('Sorry Invalid Details');</script>";
        }
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>MCC - GCMS | Student Login Page</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/logo-mcc.png">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .auth .auth-form-light {
            border-radius: 5px;
            background-color: transparent;
        }

        input[type=text],
        input[type=password] {
            border: 1px solid black;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <h4>Hello! Welcome back MCCnians</h4>
                                <h6 class="font-weight-light">Sign in to continue.</h6>
                                </center>
                                <form class="pt-3" id="login" method="post" name="login">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg"
                                            placeholder="enter your student id or username" required="true" name="stuid"
                                            value="<?php if (isset($_COOKIE["user_login"])) {
                                                echo $_COOKIE["user_login"];
                                            } ?>">
                                    </div>
                                    <div class="form-group">

                                        <input type="password" class="form-control form-control-lg"
                                            placeholder="enter your password" name="password" required="true" value="<?php if (isset($_COOKIE["userpassword"])) {
                                                echo $_COOKIE["userpassword"];
                                            } ?>">
                                    </div>
                                    <div class="mt-3">
                                        <button class="btn btn-success btn-block loginbtn" name="login"
                                            type="submit">Login</button>
                                    </div>
                                    <div class="my-2 d-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                            <label class="form-check-label text-muted">
                                                <input type="checkbox" id="remember" class="form-check-input"
                                                    name="remember" <?php if (isset($_COOKIE["user_login"])) { ?>
                                                        checked <?php } ?> /> Keep me signed in </label>
                                        </div>
                                        <a href="forgot-password.php" class="auth-link text-black">Forgot password?</a>
                                    </div>
                                    <div class="mb-2">
                                        <a href="../index1.php" class="btn btn-block btn-facebook auth-form-btn">
                                            <i class="icon-social-home mr-2"></i>Back Home </a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="js/off-canvas.js"></script>
        <script src="js/misc.js"></script>
        <!-- endinject -->
</body>

</html>