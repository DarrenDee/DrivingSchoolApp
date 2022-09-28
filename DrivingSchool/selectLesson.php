


<?php
include 'header.html';
?>

<h1>Lessons </h1>
<?php
try {

$pdo = new PDO('mysql:host=localhost;dbname=drivinglessons; charset = utf8','root','');

$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT studentID, instructorID, date,time FROM lessons';

$result = $pdo ->query($sql);



while($row = $result ->fetch()) {

$output = 'Student ID: '.$row['studentID'] . '<br>Instructor ID: '. $row['instructorID'] . '<br>Date: '.$row['date']. ' <br>Time: '.$row['time'] .'<br><br>';
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