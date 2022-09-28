


<?php
include 'header.html';
?>

<h1>All Students </h1>
<?php
try {

$pdo = new PDO('mysql:host=localhost;dbname=drivinglessons; charset = utf8','root','');

$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * FROM students';

$result = $pdo ->query($sql);



while($row = $result ->fetch()) {

$output = 'Name: '.$row['firstname'] . ' ' . $row['surname'] .'<br>Student ID: '. $row['studentID'] . '<br>Email : '.$row['email']. ' <br>Phone Number: '.$row['phoneNumber'] . '<br>Lessons Done: '. $row['lessonsDone'].'<br><br>';
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