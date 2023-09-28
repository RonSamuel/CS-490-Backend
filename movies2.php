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
$sql = "SELECT film.title,film.film_id,film.release_year, film.rental_duration, film.rental_rate, film.length from film where film.film_id='$a'";
$result = mysqli_query($conn, $sql);

echo "<table>";
echo "<th>" . "Title" . "</th>";
echo "<th>" . "ID" . "</th>";
echo "<th>" . "Release" . "</th>";
echo "<th>" . "Rental Duration" . "</th>";
echo "<th>" . "Rental Rate" . "</th>";
echo "<th>" . "Length" . "</th>";
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
