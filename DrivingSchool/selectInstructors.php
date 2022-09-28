


<?php
include 'header.html';
?>

<h1>Instructors </h1>
<?php
try {

$pdo = new PDO('mysql:host=localhost;dbname=drivinglessons; charset = utf8','root','');

$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * FROM instructors';

$result = $pdo ->query($sql);



while($row = $result ->fetch()) {

$output = 'Instructor ID: '.$row['instructorID'] . '<br>'. $row['firstname'] . ' '.$row['surname']. ' <br> Email: '.$row['email'] .'<br><br>';
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
    
}

}
catch(PDOException $e) {

$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e ->getFile() . ':' . $e ->getLine();
}

include 'footer.html';

?>