<?php

include 'header.html';

if (isset($_POST['submitdetails'])) {

try {

$pdo = new PDO('mysql:host=localhost;dbname=drivinglessons; charset=utf8', 'root', '');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT count(*) FROM instructors where instructorID = :cid';

$result = $pdo->prepare($sql);

$result->bindValue(':cid', $_POST['cid']);

$result->execute();

if($result->fetchColumn() > 0)

{

$sql = 'SELECT * FROM instructors where instructorID = :cid';

$result = $pdo->prepare($sql);

$result->bindValue(':cid', $_POST['cid']);

$result->execute();

while ($row = $result->fetch()) {

$output ='<br>Instructor: ' . $row['firstname'] . ' ' . $row['surname'] . '<br> Are you sure you want to delete this Instructor?  <br><br>' ;
?>   

<html> 
<head>



</head>
<body>
  <br><h1> Delete Instructor</h1>

<table>

<tr>
<td>
  <?php echo $output ?>
</td>
</tr>
</table>
</body>
</html>
<?php 


echo '<form action="instructordelete.php" method="post">

<input type="hidden" name="id" value="'.$row['instructorID'].'">



<input type="submit" value="yes delete" name="delete">

</form> <br>' ;



}

}

else {

print "<br><br><h2>No rows matched the query.</h2><br>";

}}

catch (PDOException $e) {

$output = '<br><br><h2>Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(). '</h2><br>';

}

}


include 'footer.html';
?>