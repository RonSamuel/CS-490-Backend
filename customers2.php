<?php
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
$a = $_POST["userID1"];
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
