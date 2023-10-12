<?php
include ('databaseInfo.php');
/**
 * @var databaseInfo $conn
 */

$sql = "SELECT actor.first_name, actor.last_name, actor.actor_id, count(*) AS total from actor join film_actor on actor.actor_id = film_actor.actor_id group by actor.actor_id order by count(*) DESC LIMIT 5;";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
    $json_data[] = $row;
}
echo json_encode($json_data);
?>
