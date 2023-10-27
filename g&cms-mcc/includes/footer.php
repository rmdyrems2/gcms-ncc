<!--footer-->
<div class="footer">
  <!-- container -->
  <div class="container">
    <div class="col-md-6 footer-left">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="team.php">Team</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="admin/login.php">Admin</a></li>
        <li><a href="user/login.php">Student</a></li>
      </ul>

    </div>
    <div class="col-md-3 footer-middle">
      <?php
      $sql   = "SELECT * from tblpage where PageType='contactus'";
      $query = $dbh->prepare($sql);
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_OBJ);

      $cnt = 1;
      if ($query->rowCount() > 0) {
        foreach ($results as $row) {
          ?>
          <h3>Address</h3>
          <div class="address">
            <p>
              <?php echo htmlentities($row->PageDescription); ?>
            </p>
          </div>
          <div class="phone">
            <p>
              <?php echo htmlentities($row->MobileNumber); ?>
            </p>
          </div>
          <?php $cnt = $cnt + 1;
        }
      } ?>
    </div>
    <div class="col-md-3 footer-right">
      <h3>GCMS</h3>
      <p>Our system is a web-based guidance and counseling management platform designed to provide students with
        efficient and effective support to achieve their academic and personal goals, while also streamlining
        the processes of the guidance office staff at Mandaue City College.</p>
    </div>
    <div class="clearfix"> </div>
  </div>
  <!-- //container -->
</div>
<!--/footer-->
<!--copy-rights-->
<div class="copyright">
  <!-- container -->
  <div class="container">
    <div class="copyright-left">
      <p>©
        <?php echo date('Y'); ?> MCC | Guidance & Counselling Management System
      </p>
    </div>
    <div class="copyright-right">
      <ul>
        <li><a href="#" class="twitter"> </a></li>
        <li><a href="#" class="twitter facebook"> </a></li>
        <li><a href="#" class="twitter chrome"> </a></li>
        <li><a href="#" class="twitter linkedin"> </a></li>
      </ul>
    </div>
    <div class="clearfix"> </div>

  </div>
  <!-- //container -->
  <!---->
  <script type="text/javascript">
    $(document).ready(function () {
      /*
      var defaults = {
      containerID: 'toTop', // fading element id
      containerHoverID: 'toTopHover', // fading element hover id
      scrollSpeed: 1200,
      easingType: 'linear' 
      };
      */
      $().UItoTop({
        easingType: 'easeOutQuart'
      });
    });
  </script>
  <a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
  <!---->
</div>