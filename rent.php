<?php
include ('databaseInfo.php');
/**
 * @var databaseInfo $conn
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $custID = $_POST["custID"];
    $invID = $_POST["invID"];
    $staffID = $_POST["staffID"];
    $check = "SELECT * FROM rental WHERE inventory_id = $invID";
    $result1 = mysqli_query($conn, $check);
    if($row1 = mysqli_fetch_assoc($result1)){
        echo "<script>
            alert('Already rented.');
            setTimeout(function(){
                window.location.href='movies.html';
            }, 100);
          </script>";
        exit;
    }
    $max = "SELECT MAX(rental_id) AS maxid FROM rental";
    $result = mysqli_query($conn, $max);
    if($row = mysqli_fetch_assoc($result)){
        $newid = $row["maxid"] + 1;
    }
    $date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO rental (rental_id,rental_date,inventory_id,customer_id,return_date,staff_id,last_update) VALUES ('$newid','$date','$invID','$custID',null,'$staffID','$date')";
    if ($conn->query($sql) === TRUE) {
        echo "New rental added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
