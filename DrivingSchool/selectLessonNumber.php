
<?php


include 'header.html';


try { 
$pdo = new PDO('mysql:host=localhost;dbname=drivinglessons; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT count(*) FROM lessons where lessonNumber = :clessonNumber';
$result = $pdo->prepare($sql);
$result->bindValue(':clessonNumber', $_POST['lessonNumber']); 
$result->execute();
if($result->fetchColumn() > 0) 
{

    $sql = 'SELECT * FROM lessons where lessonNumber = :clessonNumber';
    $result = $pdo->prepare($sql);
    $result->bindValue(':clessonNumber', $_POST['lessonNumber']); 
    $result->execute();

while ($row = $result->fetch()) { 
      $output = 'LessonNumber: ' . $row['lessonNumber'] . ' <br>Student ID: ' . $row['studentID'] . '<br>Instructor ID: ' . $row['instructorID'] . '<br>Date: ' . $row['date'] . '<br>Time: ' . $row['time'] . '<br><br>';
    
      ?>   

      <html> 
      <head>
      
      
      
      </head>
      <body>
      <br><br>
      
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
else {
      print " <br><br><h2>No rows matched the query.</h2><br>";
    }} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}
include 'footer.html';
?>