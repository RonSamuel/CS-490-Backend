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

$sql = "SELECT film.title, actor.first_name, actor.last_name, category.name from film join film_actor on film_actor.film_id=film.film_id join actor on actor.actor_id=film_actor.actor_id join film_category on film_category.film_id=film.film_id join category on category.category_id=film_category.category_id";
$result = mysqli_query($conn, $sql);

echo '<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
</head>
<body>

<h2>Movies</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

<table id="myTable">
<tr class="header">
    <th style="width:30%;">Film Name</th>
    <th style="width:25%;">Actor First Name</th>
    <th style="width:25%;">Actor Last Name</th>
    <th style="width:20%;">Name</th>
</tr>';

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
    echo "<tr><td>" . htmlspecialchars($row['title']) . "</td><td>" . htmlspecialchars($row['first_name']) . "</td><td>" . htmlspecialchars($row['last_name']) . "</td><td>". htmlspecialchars($row['name']) . "</td></tr>";  //$row['index'] the index here is a field name
}

echo '
</table>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, j, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    tr[i].style.display = "none";
    td = tr[i].getElementsByTagName("td");
    for (j = 0; j < td.length; j++) {
      if (td[j]) {
        txtValue = td[j].textContent || td[j].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          break;
        }
      }
    }
  }
}


</script>

</body>
</html>
';
?>
