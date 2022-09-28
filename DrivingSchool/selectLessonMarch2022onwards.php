


<?php
include 'header.html';
?>

<h1>March 2022 And Onwards Lessons </h1>
<?php
try {

$pdo = new PDO('mysql:host=localhost;dbname=drivinglessons; charset = utf8','root','');

$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT lessonNumber, studentID, instructorID, date,time FROM lessons WHERE date BETWEEN "2022-03-01" AND  "2024-01-01"';

$result = $pdo ->query($sql);



while($row = $result ->fetch()) {

$output = 'Lesson Number: ' . $row['lessonNumber'] .'<br>Student ID: '.$row['studentID'] . '<br>Instructor ID: '. $row['instructorID'] . '<br>Date: '.$row['date']. ' <br>Time: '.$row['time'] .'<br><br>';
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