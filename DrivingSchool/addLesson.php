<?php

include 'header.html';

if (isset($_POST['submitdetails'])) {                   
try { 
    $cstudentID = $_POST['cstudentID'];
    $cinstructorID = $_POST['cinstructorID'];
    $cDate = $_POST['cDate'];
    $cTime = $_POST['cTime'];


   $pdo = new PDO('mysql:host=localhost;dbname=drivinglessons; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $sql2 = "SELECT * from lessons WHERE instructorID = :cinstructorID AND studentID = :cstudentID AND date = :cDate AND time = :cTime";

   $result = $pdo->prepare($sql2);

   $result ->bindValue(':cinstructorID' , $cinstructorID);
   $result->bindValue(':cstudentID', $cstudentID);
   $result->bindValue(':cDate', $cDate);
   $result->bindValue(':cTime', $cTime);
    $result-> execute();

    $row = $result->fetch();

  
    if($row) {

        echo "<br><h2>This Lesson has already been booked</h2><br><br>";
    }
    else {
    
    if ($cstudentID == ''  AND $cinstructorID == '' AND $cDate == '' AND $cTime == '')
    {
        echo("<br><h2>No Data was entered </h2><br><br> ");
                  }
    




    $sql1 = 'SELECT studentID FROM students WHERE studentID = :cstudentID';
    $result1 = $pdo->prepare($sql1);
    $result1->bindValue(':cstudentID', $_POST['cstudentID']); 
    $result1->execute();

     if($cstudentID == '') {
        echo("<br><h2>No Student Id was Entered </h2><br><br> ");
     }  
     else if (!$row1 = $result1->fetch()) { 
        echo("<br><h2>No Student Id was Found </h2><br><br> ");
     }


     $sql2 = 'SELECT instructorID FROM instructors WHERE instructorID = :cinstructorID';
    $result2 = $pdo->prepare($sql2);
    $result2->bindValue(':cinstructorID', $_POST['cinstructorID']); 
    $result2->execute(); 
     if($cinstructorID == '') {
        echo("<br><h2>No Instructor Id was Entered </h2><br><br> ");
     } 

     else if (!$row2 = $result2->fetch()) { 
        echo("<br><h2>No Instructor Id was Found </h2><br><br> ");
    }
        




     if($cDate == '') {
        echo("<br><h2>No Date was Entered </h2><br><br> ");
     }    
      /*the following line of code (!strtotime($cDate)) has been learned from   
     https://stackoverflow.com/questions/11029769/function-to-check-if-a-string-is-a-date*/
     else if(!strtotime($cDate)) { 
        echo("<br><h2>Incorrect Date Format Entered </h2><br><br> ");
     }   
     

     if($cTime == '') {
        echo("<br><h2>No Time was Entered </h2><br><br> ");
     } 
    /*the following line of code (!strtotime($cDate)) has been learned from   
     https://stackoverflow.com/questions/11029769/function-to-check-if-a-string-is-a-date*/
     else if(!strtotime($cTime)) { 
        echo("<br><h2>Incorrect Time Format Entered </h2><br><br> ");
     }    



   




    else{
    $pdo = new PDO('mysql:host=localhost;dbname=drivinglessons; charset=utf8', 'root', ''); 
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $sql = "INSERT INTO lessons (instructorID,studentID,date,time) VALUES(:cinstructorID, :cstudentID, :cDate, :cTime)";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':cinstructorID', $cinstructorID);
    $stmt->bindValue(':cstudentID', $cstudentID);
    $stmt->bindValue(':cDate', $cDate);
    $stmt->bindValue(':cTime', $cTime);
    
    $stmt->execute();
    $sql3 = 'SELECT lessonNumber FROM lessons WHERE studentID = :cstudentID AND instructorID = :cinstructorID AND date = :cDate AND time = :cTime';
    $result3 = $pdo->prepare($sql3);
    $result3->bindValue(':cinstructorID', $cinstructorID);
    $result3->bindValue(':cstudentID', $cstudentID);
    $result3->bindValue(':cDate', $cDate);
    $result3->bindValue(':cTime', $cTime);
    $result3->execute();

    $row = $result3->fetch();


  

echo  "<br><h2> This Lesson has been added to the sytem. The lesson number for this lesson is ". $row['lessonNumber'] ."</h2><br><br>";

    }

}


}

catch (PDOException $e) { 
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
} 
} 

include 'footer.html';

?>
