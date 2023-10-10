<?php
require_once 'FPDF/fpdf.php';

$servername = "localhost";
$username = "root";
$password = "1234";
$db = "sakila";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from customer;";
$result = mysqli_query($conn, $sql);

if(isset($_POST['createPDF'])) {
    $pdf = new FPDF('p','mm','a4');
    $pdf->SetFont('arial','b','14');
    $pdf->AddPage();
    $pdf->cell('40','10','First Name','1','0','C');
    $pdf->cell('40','10','Last Name','1','0','C');
    $pdf->cell('40','10','ID','1','1','C');
    $pdf->Ln(0);
    while ($row = mysqli_fetch_array($result)) {
        $pdf->cell('40','10',$row[2],'1','0','C');
        $pdf->cell('40','10',$row[3],'1','0','C');
        $pdf->cell('40','10',$row[0],'1','1','C');
    }
    $pdf->Output();
}

?>
