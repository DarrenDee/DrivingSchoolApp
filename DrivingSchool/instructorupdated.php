<?php
 include 'header.html';
try { 
$pdo = new PDO('mysql:host=localhost;dbname=drivinglessons; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql ='UPDATE instructors SET firstname=:cfirstname,surname =:csurname,phoneNumber =:cphoneNumber, email =:cemail WHERE instructorID =:cid';
$result = $pdo->prepare($sql);
$result->bindValue(':cid', $_POST['ud_id']); 
$result->bindValue(':cfirstname', $_POST['ud_firstname']); 
$result->bindValue(':csurname', $_POST['ud_surname']); 
$result->bindValue(':cphoneNumber', $_POST['ud_phoneNumber']);
$result->bindValue(':cemail', $_POST['ud_email']);
$result->execute();
     
//For most databases, PDOStatement::rowCount() does not return the number of rows affected by a SELECT statement.

$count = $result->rowCount();
if ($count > 0)
{
echo "<br><br><h2>You just updated Instructor no: " . $_POST['ud_id'] ."  click<a href='selectupdateInstructor.php'> here</a> to go back </h2><br>";
}
else
{
echo "<br><br><h2>nothing updated </h2><br>";
}
}
 
catch (PDOException $e) { 

$output = '<br><br><h2>Unable to process query sorry : ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine() . '</h2><br>'; 
echo $output;
}
include 'footer.html';
?>