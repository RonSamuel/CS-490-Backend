<?php
include ('databaseInfo.php');
/**
 * @var databaseInfo $conn
 */

$sql = "SELECT film.title,film.film_id,film.release_year, film.length from film join inventory on film.film_id = inventory.film_id join rental on rental.inventory_id = inventory.inventory_id group by film.title order by count(*) DESC LIMIT 5;";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
    $json_data[] = $row;
}
echo json_encode($json_data);
?>
