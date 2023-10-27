<?php
// Include your database connection code here
include('includes/dbconnection.php');

// Get the search term from the AJAX request
$searchTerm = $_GET['q'];

// Prepare and execute a database query based on the search term
$sql = "SELECT StuID, FirstName, LastName FROM tblstudent WHERE FirstName LIKE :searchTerm OR LastName LIKE :searchTerm";

$query = $dbh->prepare($sql);
$query->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);

// Prepare the results in JSON format
// Example of fetching data from a PDO result set
$data = [];
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $data[] = [
        'id'   => $row['StuID'],
        'text' => $row['FirstName'],
    ];
}



// Return the results as JSON
header('Content-Type: application/json');
echo json_encode(['results' => $data]);

?>