<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">

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
    <link href="css-page/css-loader.css" rel="stylesheet">
    <!--hover-girds-->

    <!--/hover-grids-->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>

</head>

<body>

    <!-- Preloader container -->
    <div class="preloader-container">
        <div class="pulse"></div>
    </div>
    <!-- Your page content goes here -->
    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5 mb-5">
        <?php include_once('includes/header1.php'); ?>
        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#header-carousel" data-slide-to="1"></li>
                <li data-target="#header-carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" style="min-height: 300px;">
                    <img class="position-relative w-100" src="images/banner1.jpg"
                        style="min-height: 300px; object-fit: cover;">
                    <div id="notice-container"
                        class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <?php
                            $sql   = "SELECT * from tblpublicnotice";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);

                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $row) { ?>
                            <h5 class="text-white text-uppercase mb-md-3">Public notice |<a style="color:white"
                                    href="view-public-notice1.php?viewid=<?php echo htmlentities($row->ID); ?>"
                                    target="_blank"">
                                <?php echo htmlentities($row->CreationDate); ?></a></h5>
                            <h1 class=" display-3 text-white mb-md-4">
                                    <?php echo htmlentities($row->NoticeTitle); ?>
                                    <?php $cnt = $cnt + 1;
                                }
                            } ?>
                                    </h1>
                                    <a href="user/login.php"
                                        class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Student
                                        Login ></a>

                                    <hr /><br />


                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="min-height: 300px;">
                    <img class="position-relative w-100" src="images/banner2.jpg"
                        style="min-height: 300px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-md-3">Best Online Courses</h5>
                            <h1 class="display-3 text-white mb-md-4">Best Online Learning Platform</h1>
                            <a href="user/login.php"
                                class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Student
                                Login</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="min-height: 300px;">
                    <img class="position-relative w-100" src="images/banner3.jpg"
                        style="min-height: 300px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-md-3">Best Online Courses</h5>
                            <h1 class="display-3 text-white mb-md-4">New Way To Learn From Home</h1>
                            <a href="user/login.php"
                                class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Student
                                Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid rounded mb-4 mb-lg-0" src="images/about.jpg" alt="">
                </div>
                <div class="col-lg-7">
                    <div class="text-left mb-4">

                        <?php
                        $sql   = "SELECT * from tblpage where PageType='aboutus'";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                        $cnt = 1;
                        if ($query->rowCount() > 0) {
                            foreach ($results as $row) {

                                ?>
                        <h2 class="text-primary text-uppercase mb-3" style="letter-spacing: 2px;">
                            <?php echo htmlentities($row->PageTitle); ?>
                        </h2>
                        <p>
                            <?php echo substr($row->PageDescription, 0, 846) . '...'; ?>
                        </p>
                        <?php $cnt = $cnt + 1;
                            }
                        } ?>
                        <a href="about.php" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn
                            More...</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Category Start -->
        <div class="container-fluid py-5">
            <div class="container pt-5 pb-3">
                <div class="text-center mb-5">
                    <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Subjects</h5>
                    <h1>Explore Top Subjects</h1>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="cat-item position-relative overflow-hidden rounded mb-2">
                            <img class="img-fluid" src="images/cat-1.jpg" alt="">
                            <a class="cat-overlay text-white text-decoration-none" href="">
                                <h4 class="text-white font-weight-medium">Web Design</h4>
                                <span>100 Courses</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="cat-item position-relative overflow-hidden rounded mb-2">
                            <img class="img-fluid" src="images/cat-2.jpg" alt="">
                            <a class="cat-overlay text-white text-decoration-none" href="">
                                <h4 class="text-white font-weight-medium">Development</h4>
                                <span>100 Courses</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="cat-item position-relative overflow-hidden rounded mb-2">
                            <img class="img-fluid" src="images/cat-3.jpg" alt="">
                            <a class="cat-overlay text-white text-decoration-none" href="">
                                <h4 class="text-white font-weight-medium">Game Design</h4>
                                <span>100 Courses</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="cat-item position-relative overflow-hidden rounded mb-2">
                            <img class="img-fluid" src="images/cat-4.jpg" alt="">
                            <a class="cat-overlay text-white text-decoration-none" href="">
                                <h4 class="text-white font-weight-medium">Apps Design</h4>
                                <span>100 Courses</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="cat-item position-relative overflow-hidden rounded mb-2">
                            <img class="img-fluid" src="images/cat-5.jpg" alt="">
                            <a class="cat-overlay text-white text-decoration-none" href="">
                                <h4 class="text-white font-weight-medium">Marketing</h4>
                                <span>100 Courses</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="cat-item position-relative overflow-hidden rounded mb-2">
                            <img class="img-fluid" src="images/cat-6.jpg" alt="">
                            <a class="cat-overlay text-white text-decoration-none" href="">
                                <h4 class="text-white font-weight-medium">Research</h4>
                                <span>100 Courses</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="cat-item position-relative overflow-hidden rounded mb-2">
                            <img class="img-fluid" src="images/cat-7.jpg" alt="">
                            <a class="cat-overlay text-white text-decoration-none" href="">
                                <h4 class="text-white font-weight-medium">Content Writing</h4>
                                <span>100 Courses</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="cat-item position-relative overflow-hidden rounded mb-2">
                            <img class="img-fluid" src="images/cat-8.jpg" alt="">
                            <a class="cat-overlay text-white text-decoration-none" href="">
                                <h4 class="text-white font-weight-medium">SEO</h4>
                                <span>100 Courses</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category Start -->


        <!-- Courses Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="text-center mb-5">
                    <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Courses</h5>
                    <h1>Our Popular Courses</h1>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="rounded overflow-hidden mb-2">
                            <img class="img-fluid" src="images/course-1.jpg" alt="">
                            <div class="bg-secondary p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-users text-primary mr-2"></i>25
                                        Students</small>
                                    <small class="m-0"><i class="far fa-clock text-primary mr-2"></i>01h 30m</small>
                                </div>
                                <a class="h5" href="">Web design & development courses for beginner</a>
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5
                                            <small>(250)</small>
                                        </h6>
                                        <h5 class="m-0">$99</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="rounded overflow-hidden mb-2">
                            <img class="img-fluid" src="images/course-2.jpg" alt="">
                            <div class="bg-secondary p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-users text-primary mr-2"></i>25
                                        Students</small>
                                    <small class="m-0"><i class="far fa-clock text-primary mr-2"></i>01h 30m</small>
                                </div>
                                <a class="h5" href="">Web design & development courses for beginner</a>
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5
                                            <small>(250)</small>
                                        </h6>
                                        <h5 class="m-0">$99</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="rounded overflow-hidden mb-2">
                            <img class="img-fluid" src="images/course-3.jpg" alt="">
                            <div class="bg-secondary p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-users text-primary mr-2"></i>25
                                        Students</small>
                                    <small class="m-0"><i class="far fa-clock text-primary mr-2"></i>01h 30m</small>
                                </div>
                                <a class="h5" href="">Web design & development courses for beginner</a>
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5
                                            <small>(250)</small>
                                        </h6>
                                        <h5 class="m-0">$99</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="rounded overflow-hidden mb-2">
                            <img class="img-fluid" src="images/course-4.jpg" alt="">
                            <div class="bg-secondary p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-users text-primary mr-2"></i>25
                                        Students</small>
                                    <small class="m-0"><i class="far fa-clock text-primary mr-2"></i>01h 30m</small>
                                </div>
                                <a class="h5" href="">Web design & development courses for beginner</a>
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5
                                            <small>(250)</small>
                                        </h6>
                                        <h5 class="m-0">$99</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="rounded overflow-hidden mb-2">
                            <img class="img-fluid" src="images/course-5.jpg" alt="">
                            <div class="bg-secondary p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-users text-primary mr-2"></i>25
                                        Students</small>
                                    <small class="m-0"><i class="far fa-clock text-primary mr-2"></i>01h 30m</small>
                                </div>
                                <a class="h5" href="">Web design & development courses for beginner</a>
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5
                                            <small>(250)</small>
                                        </h6>
                                        <h5 class="m-0">$99</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="rounded overflow-hidden mb-2">
                            <img class="img-fluid" src="images/course-6.jpg" alt="">
                            <div class="bg-secondary p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-users text-primary mr-2"></i>25
                                        Students</small>
                                    <small class="m-0"><i class="far fa-clock text-primary mr-2"></i>01h 30m</small>
                                </div>
                                <a class="h5" href="">Web design & development courses for beginner</a>
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5
                                            <small>(250)</small>
                                        </h6>
                                        <h5 class="m-0">$99</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Courses End -->
        <!-- Registration Start -->
        <div class="container-fluid bg-registration py-5" style="margin: 90px 0;">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-lg-7 mb-5 mb-lg-0">
                        <div class="mb-4">
                            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Need Any
                                Courses
                            </h5>
                            <h1 class="text-white">Be one of us</h1>
                        </div>
                        <p class="text-white">Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo dolor
                            lorem
                            ipsum ut sed eos,
                            ipsum et dolor kasd sit ea justo. Erat justo sed sed diam. Ea et erat ut sed diam sea
                            ipsum
                            est
                            dolor</p>
                        <ul class="list-inline text-white m-0">
                            <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Labore eos amet dolor amet
                                diam
                            </li>
                            <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Etsea et sit dolor amet
                                ipsum
                            </li>
                            <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Diam dolor diam elitripsum
                                vero.
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-5">
                        <div class="card border-0">
                            <div class="card-header bg-light text-center p-4">
                                <h1 class="m-0">Sign Up Now</h1>
                            </div>
                            <div class="card-body rounded-bottom bg-primary p-5">
                                <form>
                                    <div class="form-group">
                                        <input type="text" class="form-control border-0 p-4" placeholder="Your name"
                                            required="required" />
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control border-0 p-4" placeholder="Your email"
                                            required="required" />
                                    </div>
                                    <div class="form-group">
                                        <select class="custom-select border-0 px-4" style="height: 47px;">
                                            <option value="">Select Class</option>
                                            <?php

                                            // SQL query to select all records from the tblclass table
                                            $sql2   = "SELECT * from    tblclass ";
                                            $query2 = $dbh->prepare($sql2);
                                            $query2->execute();
                                            $result2 = $query2->fetchAll(PDO::FETCH_OBJ);

                                            // loop over each record and create an option element with the class name and section
                                            foreach ($result2 as $row1) { ?>
                                            <option value="<?php echo htmlentities($row1->ID); ?>">
                                                <?php echo htmlentities(
                                                        $row1->ClassName,
                                                    ); ?>
                                                <?php echo htmlentities($row1->Section); ?>
                                            </option>
                                            <?php }
                                            ?>
                                        </select>

                                    </div>
                                    <div>
                                        <button class="btn btn-dark btn-block border-0 py-3" type="submit">Sign Up
                                            Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Registration End -->


        <?php include_once('team.php'); ?>

        <!-- Testimonial Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="text-center mb-5">
                    <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Testimonial</h5>
                    <h1>What Say Our Students</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="owl-carousel testimonial-carousel">
                            <div class="text-center">
                                <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                                <h4 class="font-weight-normal mb-4">Dolor eirmod diam stet kasd sed. Aliqu rebum est
                                    eos.
                                    Rebum elitr dolore et eos labore, stet justo sed est sed. Diam sed sed dolor
                                    stet
                                    amet
                                    eirmod eos labore diam</h4>
                                <img class="img-fluid mx-auto mb-3" src="images/testimonial-1.jpg" alt="">
                                <h5 class="m-0">Client Name</h5>
                                <span>Profession</span>
                            </div>
                            <div class="text-center">
                                <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                                <h4 class="font-weight-normal mb-4">Dolor eirmod diam stet kasd sed. Aliqu rebum est
                                    eos.
                                    Rebum elitr dolore et eos labore, stet justo sed est sed. Diam sed sed dolor
                                    stet
                                    amet
                                    eirmod eos labore diam</h4>
                                <img class="img-fluid mx-auto mb-3" src="images/testimonial-2.jpg" alt="">
                                <h5 class="m-0">Client Name</h5>
                                <span>Profession</span>
                            </div>
                            <div class="text-center">
                                <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                                <h4 class="font-weight-normal mb-4">Dolor eirmod diam stet kasd sed. Aliqu rebum est
                                    eos.
                                    Rebum elitr dolore et eos labore, stet justo sed est sed. Diam sed sed dolor
                                    stet
                                    amet
                                    eirmod eos labore diam</h4>
                                <img class="img-fluid mx-auto mb-3" src="images/testimonial-3.jpg" alt="">
                                <h5 class="m-0">Client Name</h5>
                                <span>Profession</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
        <!-- Testimonial Script -->



        <!-- Blog Start -->
        <div class="container-fluid py-5">
            <div class="container pt-5 pb-3">
                <div class="text-center mb-5">
                    <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Our Blog</h5>
                    <h1>Latest From Our Blog</h1>
                </div>
                <div class="row pb-3">
                    <div class="col-lg-4 mb-4">
                        <div class="blog-item position-relative overflow-hidden rounded mb-2">
                            <img class="img-fluid" src="images/blog-1.jpg" alt="">
                            <a class="blog-overlay text-decoration-none" href="">
                                <h5 class="text-white mb-3">Lorem elitr magna stet eirmod labore amet labore clita
                                    at ut
                                    clita</h5>
                                <p class="text-primary m-0">Jan 01, 2050</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="blog-item position-relative overflow-hidden rounded mb-2">
                            <img class="img-fluid" src="images/blog-2.jpg" alt="">
                            <a class="blog-overlay text-decoration-none" href="">
                                <h5 class="text-white mb-3">Lorem elitr magna stet eirmod labore amet labore clita
                                    at ut
                                    clita</h5>
                                <p class="text-primary m-0">Jan 01, 2050</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="blog-item position-relative overflow-hidden rounded mb-2">
                            <img class="img-fluid" src="images/blog-3.jpg" alt="">
                            <a class="blog-overlay text-decoration-none" href="">
                                <h5 class="text-white mb-3">Lorem elitr magna stet eirmod labore amet labore clita
                                    at ut
                                    clita</h5>
                                <p class="text-primary m-0">Jan 01, 2050</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog End -->

        <div class="to-top">
            <style>
            .back-to-top {
                display: none;
                position: fixed;
                bottom: 20px;
                right: 20px;
                z-index: 99;
                cursor: pointer;
            }
            </style>
            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i
                    class="fa fa-angle-double-up"></i></a>
        </div>

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
            <?php include_once('includes/footer1.php'); ?>
        </div>


        <!-- Footer End -->
        <script>
        window.addEventListener('scroll', function() {
            var button = document.querySelector('.back-to-top');
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                button.style.display = 'block';
            } else {
                button.style.display = 'none';
            }
        });

        document.querySelector('.back-to-top').addEventListener('click', function() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
        });
        </script>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="loader.js"></script>
        <script src="js/main.js"></script>
        <!-- preloader -->
        <script>
        // Hide the preloader when the page is fully loaded
        window.addEventListener('load', function() {
            const preloader = document.querySelector('.preloader-container');
            preloader.style.display = 'none';
        });
        </script>
        <!-- preloader -->
        <!-- Public Notice Slide script -->
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            const noticeContainer = document.getElementById("notice-container");
            const noticeDates = noticeContainer.querySelectorAll(
                "h5"); // Select the h5 elements with creation dates
            const notices = noticeContainer.querySelectorAll("h1");
            let currentIndex = 0;

            // Function to show the next notice
            function showNextNotice() {
                notices[currentIndex].style.display = "none";
                noticeDates[currentIndex].style.display = "none"; // Hide the corresponding date
                currentIndex = (currentIndex + 1) % notices.length;
                notices[currentIndex].style.display = "block";
                noticeDates[currentIndex].style.display =
                    "block"; // Show the date for the new notice
            }

            // Initially hide all notices and dates except the first one
            for (let i = 1; i < notices.length; i++) {
                notices[i].style.display = "none";
                noticeDates[i].style.display = "none";
            }

            // Set an interval to change notices every 5 seconds
            setInterval(showNextNotice, 2000); // 2000 milliseconds (2 seconds)
        });
        </script>
        <!-- Public Notice Slide script -->
</body>

</html>