
<?php


include 'header.html';


try { 
$pdo = new PDO('mysql:host=localhost;dbname=drivinglessons; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT count(*) FROM students where firstname = :cfirstname';
$result = $pdo->prepare($sql);
$result->bindValue(':cfirstname', $_POST['firstname']); 
$result->execute();
if($result->fetchColumn() > 0) 
{

    $sql = 'SELECT * FROM students where firstname = :cfirstname';
    $result = $pdo->prepare($sql);
    $result->bindValue(':cfirstname', $_POST['firstname']); 
    $result->execute();

while ($row = $result->fetch()) { 
      $output = $row['firstname'] . ' ' . $row['surname'] . '<br>' . $row['email'] . '<br><br>';

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
else {
      print "<br><br><h2>No rows matched the query.</h2><br>";
    }} 
catch (PDOException $e) { 
$output = '<br><br><h2>Unable to connect to the database server: <br><br><h2>' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}
include 'footer.html';
?>