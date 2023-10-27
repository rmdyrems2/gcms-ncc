<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
require('fpdf/fpdf.php'); // Include the FPDF library

if (strlen($_SESSION['sturecmsaid']) == 0) {
    header('location:logout.php');
} else {
    // Create a PDF object
    $pdf = new FPDF('P', 'mm', 'Letter'); // Letter size paper in landscape mode

    // Add a page
    $pdf->AddPage();

    // Set font and other styles
    $pdf->SetFont('Arial', 'B', 14); // Reduced font size

    // Image header
    // $pdf->Image('../images/data-sheet-mcc.png', 10, 10, 190, 0); // Adjust the x, y, width, and height as needed

    // Set title
    $pdf->Cell(0, 30, 'Student/User Records', 0, 1, 'C'); // Increase the Y offset for the title

    $pdf->SetFont('Arial', 'B', 10); // Reduced font size

    // Initialize an array to store the maximum width for each column
    $columnWidths = array();

    // Fetch student records from the database
    $sql   = "SELECT tblstudent.StuID, tblstudent.FirstName, tblstudent.MiddleName, tblstudent.LastName, tblstudent.NickName, tblstudent.StudentEmail, tblclass.ClassName, tblclass.Section FROM tblstudent JOIN tblclass ON tblclass.ID=tblstudent.StudentClass";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    // Calculate the maximum width needed for each column
    foreach ($results as $row) {
        $fullName = $row['FirstName'] . ' ' . substr($row['MiddleName'], 0, 1) . '. ' . $row['LastName'];

        $columnWidths[] = strlen($row['StuID']);
        $columnWidths[] = strlen($row['ClassName'] . ' ' . $row['Section']);
        $columnWidths[] = strlen($fullName);
        $columnWidths[] = strlen($row['NickName']);
        $columnWidths[] = strlen($row['StudentEmail']);
    }

    // Set cell widths based on the maximum width for each column
    $pdf->Cell(25, 10, 'Student ID', 1, 0, 'C');
    $pdf->Cell(45, 10, 'Class', 1, 0, 'C');
    $pdf->Cell(65, 10, 'Full Name', 1, 0, 'C');
    $pdf->Cell(20, 10, 'Nickname', 1, 0, 'C');
    $pdf->Cell(50, 10, 'Student Email', 1, 1, 'C');

    $pdf->SetFont('Arial', '', 10); // Reduced font size

    $count = 1;
    foreach ($results as $row) {
        $fullName = $row['FirstName'] . ' ' . substr($row['MiddleName'], 0, 1) . '. ' . $row['LastName'];
        $pdf->Cell(25, 10, $row['StuID'], 1, 0, 'C');
        $pdf->Cell(45, 10, $row['ClassName'] . ' ' . $row['Section'], 1, 0, 'C');
        $pdf->Cell(65, 10, $fullName, 1, 0, 'C');
        $pdf->Cell(20, 10, $row['NickName'], 1, 0, 'C');
        $pdf->Cell(50, 10, $row['StudentEmail'], 1, 1, 'C');
        $count++;
    }

    // Output the PDF to the browser
    $pdf->Output();
}


?>