<?php
include ('databaseInfo.php');
/**
 * @var databaseInfo $conn
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerID = $_POST["custID"];
    $sql = "DELETE FROM customer WHERE customer_id = '$customerID'";
    if ($conn->query($sql) === TRUE) {
        echo "Delete complete";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
