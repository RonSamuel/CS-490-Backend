<?php
include ('databaseInfo.php');
/**
 * @var databaseInfo $conn
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName1"];
    $lastName = $_POST["lastName1"];
    $customerEmail = $_POST["customerEmail1"];
    $customerID = $_POST["custid1"];
    $sql = "UPDATE customer SET first_name = '$firstName', last_name = '$lastName', email = '$customerEmail' WHERE customer_id = '$customerID'";
    if ($conn->query($sql) === TRUE) {
        echo "Update complete";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
