<?php
include 'header.html';
try { 
$pdo = new PDO('mysql:host=localhost;dbname=drivinglessons; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql="SELECT count(*) FROM instructors WHERE instructorID=:cid";

$result = $pdo->prepare($sql);
$result->bindValue(':cid', $_POST['id']); 
$result->execute();
if($result->fetchColumn() > 0) 
{
    $sql = 'SELECT * FROM instructors where instructorID = :cid';
    $result = $pdo->prepare($sql);
    $result->bindValue(':cid', $_POST['id']); 
    $result->execute();

    $row = $result->fetch() ;
     $instructorID = $row['instructorID'];
	 $firstname= $row['firstname'];
	  $surname=$row['surname'];
       $phoneNumber=$row['phoneNumber'];
        $email=$row['email'];
    
	  
  
	  
   
}

else {
      print "<br><br><h2>No rows matched the query. try again click<a href='selectupdate.php'> here</a> to go back</h2><br>";
    }} 
catch (PDOException $e) { 
$output = '<br><br><h2>Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine() . '</h2><br>'; 
}


include 'instructorupdatedetails.html';
include 'footer.html';
?>


