<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Mandaue City College </title>
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

</head>

<body>
    <!--header-->
    <?php include_once('includes/header1.php'); ?>
    <style>
    .about {
        margin-top: 60px;

    }
    </style>
    <div class="about">
        <div class="container">
            <div class="about-info-grids">
                <center>
                    <div class="col-md-7 abt-info-pic">
                        <?php
						$sql   = "SELECT * from tblpage where PageType='aboutus'";
						$query = $dbh->prepare($sql);
						$query->execute();
						$results = $query->fetchAll(PDO::FETCH_OBJ);

						$cnt = 1;
						if ($query->rowCount() > 0) {
							foreach ($results as $row) { ?>
                        <h3>
                            <?php echo ($row->PageTitle); ?>

                        </h3>
                        <p>
                            <?php echo ($row->PageDescription); ?>
                        </p>
                        <?php $cnt = $cnt + 1;
							}
						} ?>

                    </div>
                </center>
                <div class="clearfix"> </div>
            </div>

        </div>
    </div>
    <!-- /About -->

    <!--/copy-rights-->
</body>

</html>