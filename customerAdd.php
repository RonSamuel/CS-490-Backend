<?php
include ('databaseInfo.php');
/**
 * @var databaseInfo $conn
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $customerEmail = $_POST["customerEmail"];
    $max = "SELECT MAX(customer_id) AS maxid FROM customer";
    $result = mysqli_query($conn, $max);
    if($row = mysqli_fetch_assoc($result)){
        $newid = $row["maxid"] + 1;
    }
    $date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO customer (customer_id,store_id,first_name,last_name,email,address_id,active,create_date,last_update) VALUES ('$newid',1,'$firstName','$lastName','$customerEmail',1,1,'$date','$date')";
    if ($conn->query($sql) === TRUE) {
        echo "New customer added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
