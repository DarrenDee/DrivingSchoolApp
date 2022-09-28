<?php

include 'header.html';

if (isset($_POST['submitdetails'])) {                   
try { 
    $cfirstname = $_POST['cfirstname'];
    $csurname = $_POST['csurname'];
    $cphoneNumber = $_POST['cphoneNumber'];
    $cemail = $_POST['cemail'];
    $clessonsDone = $_POST['clessonsDone'];
    if ($cfirstname == ''  or $csurname == '' or $cphoneNumber == '' or $cemail == '' or $clessonsDone =='')
    {
        echo("<br><br><h2>You did not complete the insert form correctly </h2><br> ");
                  }


else{
    $pdo = new PDO('mysql:host=localhost;dbname=drivinglessons; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $sql = "INSERT INTO students (firstname,surname,phoneNumber,email,lessonsDone) VALUES(:cfirstname, :csurname, :cphoneNumber, :cemail, :clessonsDone)";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':cfirstname', $cfirstname);
    $stmt->bindValue(':csurname', $csurname);
    $stmt->bindValue(':cphoneNumber', $cphoneNumber);
    $stmt->bindValue(':cemail', $cemail);
    $stmt->bindValue(':clessonsDone', $clessonsDone);
    
    $stmt->execute();
echo  "<br><br><h2>Added try doing another</h2><br>";
    }
} 
catch (PDOException $e) { 
    $title = '<br><br><h2>An error has occurred</h2><br>';
    $output = '<br><br><h2>Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine() . '</h2><br>';
} 
} 

include 'footer.html';

?>
