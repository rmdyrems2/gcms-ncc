<?php
// Assuming you have a database connection established
// $dbh = new PDO('mysql:host=localhost;dbname=g&cms-mcc', 'username', 'password');

if (isset($_GET['keyword'])) {
  $keyword = $_GET['keyword'];

  // Prepare and execute the SQL query to retrieve the search results
  $sql = "SELECT id, name FROM tblstudent WHERE name LIKE :keyword";
  $query = $dbh->prepare($sql);
  $query->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
  $query->execute();
  $users = $query->fetchAll(PDO::FETCH_ASSOC);

  // Return the search results as JSON data
  echo json_encode($users);
}
?>