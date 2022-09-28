<?php
include 'header.html';
try { 
$pdo = new PDO('mysql:host=localhost;dbname=drivinglessons; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql="SELECT count(*) FROM students WHERE studentID=:cid";

$result = $pdo->prepare($sql);
$result->bindValue(':cid', $_POST['id']); 
$result->execute();
if($result->fetchColumn() > 0) 
{
    $sql = 'SELECT * FROM students where studentID = :cid';
    $result = $pdo->prepare($sql);
    $result->bindValue(':cid', $_POST['id']); 
    $result->execute();

    $row = $result->fetch() ;
     $studentID = $row['studentID'];
	 $firstname= $row['firstname'];
	  $surname=$row['surname'];
       $phoneNumber=$row['phoneNumber'];
        $email=$row['email'];
         $lessonsDone=$row['lessonsDone'];
	  
  
	  
   
}

else {
      print "No rows matched the query. try again click<a href='selectupdate.php'> here</a> to go back";
    }} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}


include 'updatedetails.html';
include 'footer.html';
?>


