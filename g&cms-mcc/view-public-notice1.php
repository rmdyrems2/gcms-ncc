<?php
session_start();
// error_reporting(0);
include('includes/dbconnection.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MCC - GCMS | Contact Us Page </title>
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <link rel="icon" type="image/png" sizes="16x16" href="images/logo-mcc.png">
    <!-- Favicon -->
    <link href="images/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="cdnjs-allmain.css"> -->

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css-page/style.css" rel="stylesheet">
    <!--hover-girds-->

    <!--/hover-grids-->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });
    </script>

</head>

<body>
    <?php include_once('includes/header1.php'); ?>

    <!-- Header Start -->
    <div class="container-fluid page-header" style="margin-bottom: 90px;">
        <div class="container">
            <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
                <h3 class="display-4 text-white text-uppercase">Notice</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Notice</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Notice</h5>
                <h1>Public Notice</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-secondary rounded p-5">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate" method="post"
                            action="mail/contact-process.php">
                            <?php
                            $vid   = $_GET['viewid'];
                            $sql   = "SELECT * from tblpublicnotice where ID=:vid";
                            $query = $dbh->prepare($sql);
                            $query->bindParam(':vid', $vid, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt     = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $row) { ?>
                                    <div class="control-group">
                                        <p>Creation Date</p>
                                        <input type="text" class="form-control border-0 p-4" id="name" name="name"
                                            placeholder="<?php echo $row->CreationDate; ?>" required="required"
                                            data-validation-required-message="Please enter your name" readonly="true" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group">
                                        <p>Title</p>
                                        <input type="text" class="form-control border-0 p-4" id="name" name="name"
                                            placeholder="<?php echo $row->NoticeTitle; ?>" required="required"
                                            data-validation-required-message="Please enter your name" readonly="true" />
                                        <p class="help-block text-danger"></p>
                                    </div>

                                    <div class="control-group">
                                        <p>Message</p>
                                        <textarea class="form-control border-0 py-3 px-4" rows="5" id="message" name="message"
                                            placeholder="<?php echo $row->NoticeMessage; ?>" required="required"
                                            readonly="true"></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>


                                    <?php $cnt = $cnt + 1;
                                }
                            } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <?php include_once('includes/footer1.php'); ?>



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="mail/contact.js"></script>
</body>

</html>