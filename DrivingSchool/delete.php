<?php

include 'header.html';

if (isset($_POST['submitdetails'])) {

try {

$pdo = new PDO('mysql:host=localhost;dbname=drivinglessons; charset=utf8', 'root', '');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT count(*) FROM students where studentID = :cid';

$result = $pdo->prepare($sql);

$result->bindValue(':cid', $_POST['cid']);

$result->execute();

if($result->fetchColumn() > 0)

{

$sql = 'SELECT * FROM students where studentID = :cid';

$result = $pdo->prepare($sql);

$result->bindValue(':cid', $_POST['cid']);

$result->execute();

while ($row = $result->fetch()) {

$output= '<br>Student: ' . $row['firstname'] . ' ' . $row['surname'] . '<br> Are you sure you want to delete this Student?  <br><br>' ;


?>   

<html> 
<head>



</head>
<body>
<br><h1> Delete Student</h1>

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



echo '<form action="deletestudent.php" method="post">

<input type="hidden" name="id" value="'.$row['studentID'].'">



<input type="submit" value="yes delete" name="delete">

</form> <br>' ;



}

}

else {

print "No rows matched the query.";

}}

catch (PDOException $e) {

$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();

}

}


include 'footer.html';
?>