<?php

include 'header.html';

try {

$pdo = new PDO('mysql:host=localhost;dbname=drivinglessons; charset=utf8', 'root', '');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'DELETE FROM instructors WHERE instructorID = :cid';

$result = $pdo->prepare($sql);

$result->bindValue(':cid', $_POST['id']);

$result->execute();

echo "<br><br><h2>You just deleted Instructor no: " . $_POST['id'] ." \n click<a href='instructordeleteform.html'> here</a> to go back</h2><br> ";

}

catch (PDOException $e) {

if ($e->getCode() == 23000) {

echo "<br><br><h2>ooops couldnt delete as that record is linked to other tables click<a href='instructordeleteform.html'> here</a> to go back</h2><br> ";

}

} 

include 'footer.html';
?>