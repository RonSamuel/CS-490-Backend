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


$sql = "SELECT actor.first_name, actor.last_name, actor.actor_id, count(*) AS total from actor join film_actor on actor.actor_id = film_actor.actor_id group by actor.actor_id order by count(*) DESC LIMIT 5;";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
    $json_data[] = $row;
}
echo json_encode($json_data);
?>
