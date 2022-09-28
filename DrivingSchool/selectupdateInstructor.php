<?php
include 'header.html';
   try { 
$pdo = new PDO('mysql:host=localhost;dbname=drivinglessons; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * FROM instructors';
$result = $pdo->query($sql); 

echo "<br /><b>Current Students</b><br><br>";
echo "<table border=1>";
echo "<tr><th>Instructor Id</th>
<th>FirstName:</th>
<th>Surname:</th></tr>";


while ($row = $result->fetch()) {
echo '<tr><td>' . $row['instructorID'] . '</td><td>'. $row['firstname'] . '</td>'. '<td>'. $row['surname'] . '</td></tr>';
}
echo '</table>';
} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}


include 'instructortoupdate.html';

include 'footer.html'

?>