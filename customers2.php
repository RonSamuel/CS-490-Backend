<?php
include ('databaseInfo.php');
/**
 * @var databaseInfo $conn
 */

$a = $_POST["userID1"];
if($a > 599){
    echo "<script>
            alert('No address or rental info; please use the search feature instead.');
            setTimeout(function(){
                window.location.href='customers.html';
            }, 100);
          </script>";
    exit;
}
$sql = "SELECT customer.first_name, customer.last_name, customer.customer_id, customer.email, address.address, film.title from customer join address on customer.address_id=address.address_id join rental on rental.customer_id=customer.customer_id join inventory on inventory.inventory_id=rental.inventory_id join film on film.film_id=inventory.inventory_id where customer.customer_id='$a'";
$result = mysqli_query($conn, $sql);

echo "<table>";
echo "<th>" . "First Name" . "</th>";
echo "<th>" . "Last Name" . "</th>";
echo "<th>" . "ID" . "</th>";
echo "<th>" . "Email" . "</th>";
echo "<th>" . "Address" . "</th>";
echo "<th>" . "Rented Film" . "</th>";
while($row1 = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row1[0] . "</td>";
    echo "<td>" . $row1[1] . "</td>";
    echo "<td>" . $row1[2] . "</td>";
    echo "<td>" . $row1[3] . "</td>";
    echo "<td>" . $row1[4] . "</td>";
    echo "<td>" . $row1[5] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
