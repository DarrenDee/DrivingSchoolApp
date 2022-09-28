<?php

include 'header.html';

if (isset($_POST['submitdetails'])) {

try {

$pdo = new PDO('mysql:host=localhost;dbname=drivinglessons; charset=utf8', 'root', '');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT count(*) FROM lessons where lessonNumber = :cid';

$result = $pdo->prepare($sql);

$result->bindValue(':cid', $_POST['cid']);

$result->execute();

if($result->fetchColumn() > 0)

{

$sql = 'SELECT * FROM lessons where lessonNumber = :cid';

$result = $pdo->prepare($sql);

$result->bindValue(':cid', $_POST['cid']);

$result->execute();

while ($row = $result->fetch()) {

$output= '<br>Lesson Number: ' . $row['lessonNumber'] . ' <br>Date ' . $row['date'] . '<br>Time: '. $row['time']. '<br> Are you sure you want to delete this Lesson?  <br><br>' ;

?>   

<html> 
<head>



</head>
<body>


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



echo '<form action="deletelesson.php" method="post">

<input type="hidden" name="id" value="'.$row['lessonNumber'].'">



<input type="submit" value="yes delete" name="delete">

</form> <br>' ;




}

}

else {

print "<br><br><h2>No rows matched the query.</h2><br>";

}}

catch (PDOException $e) {

$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();

}

}


include 'footer.html';
?>