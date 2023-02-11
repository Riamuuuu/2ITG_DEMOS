<?php
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $PhoneNum = $_POST['PhoneNum'];
    $Email = $_POST['Email'];
    $message = $_POST['message'];
    $Position = $_POST['Position'];

    //DATABASE
    $conn = new mysqli('localhost', 'root', '', 'backend');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into application(FirstName, LastName, Email, PhoneNum, message, Position)
        values(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssiss", $FirstName, $LastName, $Email, $PhoneNum, $message, $Position);
        $stmt->execute();
        echo "Message sent!";
        $stmt->close();
        $conn->close();
    }

?>