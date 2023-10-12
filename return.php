<?php
include ('databaseInfo.php');
/**
 * @var databaseInfo $conn
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rentalID = $_POST["rentID"];
    $date = date('Y-m-d H:i:s');
    $sql = "UPDATE rental SET return_date = '$date' WHERE rental_id = '$rentalID'";
    if ($conn->query($sql) === TRUE) {
        echo "Update complete";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
