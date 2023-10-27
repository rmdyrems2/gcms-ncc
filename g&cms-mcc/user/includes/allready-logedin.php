<?php
if(isset($_SESSION['sturecmsstuid'])){
  header("Location: ../user/dashboard.php"); // redirect to index.php
  exit();
}
?>